<?php

function array_to_str ($arr, $name="")
{
	if (!isset($entries)) $entries = "";
	if (!isset($arrays)) $arrays = "";

	$str = "\$wackoConfig".($name ? "[\"".$name."\"]" : "")." = array(\n";

	foreach ($arr as $k => $v)
	{
		if(is_array($v))
		$arrays .= array_to_str($v, $k);
		else
		$entries .= "\t\"".$k."\" => \"".str_replace("\n","\\n",$v)."\",\n";
	}

	$str .= $entries.");\n";
	$str .= $arrays;
	return $str;
}

function RandomSeed($length, $pwd_complexity)
{
	$chars_uc = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
	$chars_lc = 'abcdefghijklmnopqrstuvwxyz';
	$digits = '0123456789';
	$symbols = '-_!@#%^&*(){}[]|~'; // removed '$'
	$uc = 0;
	$lc = 0;
	$di = 0;
	$sy = 0;

	if ($pwd_complexity == 2) $sy = 100;

	while ($uc == 0 || $lc == 0 || $di == 0 || $sy == 0) {
		$seed = '';
		for ($i = 0; $i < $length; $i++) {
			$k = rand(0, $pwd_complexity);  //randomly choose what's next
			if ($k == 0) {   //uppercase
				$seed .= substr(str_shuffle($chars_uc), rand(0, sizeof($chars_uc) - 2), 1);
				$uc++;
			}
			if ($k == 1) {   //lowercase
				$seed .= substr(str_shuffle($chars_lc), rand(0, sizeof($chars_lc) - 2), 1);
				$lc++;
			}
			if ($k == 2) {   //digits
				$seed .= substr(str_shuffle($digits), rand(0, sizeof($digits) - 2), 1);
				$di++;
			}
			if ($k == 3) {   //symbols
				$seed .= substr(str_shuffle($symbols), rand(0, sizeof($symbols) - 2), 1);
				$sy++;
			}
		}
	}

	return $seed;
}

if ( ( $config["system_seed"] == "") )
	$config["system_seed"] = RandomSeed(20, 3);


if ( ( $config["database_driver"] == "mysqli_legacy" ) && empty( $config["database_port"] ) )
$config["database_port"] = $config["database_port"] = "3306";

if(!array_key_exists("wacko_version", $config))
{
	$config["cookie_prefix"] = $config["table_prefix"];
}

if(!array_key_exists("aliases", $config))
{
	$config["aliases"] = array("Admins" => $config["admin_name"]);
}

// set version to current version, yay!
$config["wacko_version"] = WACKO_VERSION;

// convert config array into PHP code
$configCode = "<?php\n// config.inc.php ".$lang["WrittenAt"].strftime("%c")."\n// ".$lang["ConfigDescription"]."\n// ".$lang["DontChange"]."\n\n";
$configCode .= array_to_str($config)."\n?>";

// try to write configuration file
print("         <h2>".$lang["FinalStep"]."</h2>\n");
print("         <ul>\n");
print("            <li>".$lang["Writing"]." - ");

$perm_changed = true;
$fp = @fopen('config.inc.php', "w");

if ($fp)
{
	// Saving file was successful
	fwrite($fp, $configCode);
	fclose($fp);

	// Try and make it non-writable
	@chmod("config.inc.php", 0644);
	$perm_changed = !is__writable('config.inc.php');

	print(output_image(true)."</li>\n");

	print("            <li>".$lang["RemovingWritePrivilege"]."   ".output_image($perm_changed))."</li>\n";
}
else
{
	// Problem saving file
	print(output_image(false)."</li>\n");
}

// try to delete wakka config file
$deleted_old_wakka_config_file = true;
if($was_wakka_upgrade && is_file('wakka.config.php'))
{
	@chown('wakka.config.php', 666);
	$deleted_old_wakka_config_file = unlink('wakka.config.php');
	print("            <li>".$lang["DeletingWakkaConfigFile"]."   ".output_image($deleted_old_wakka_config_file))."</li>\n";
}

print("         </ul>\n");

print("         <h2>".$lang["SecurityConsiderations"]."</h2>\n");
print("         <ul class=\"security\">\n");

if(!$perm_changed)
{
	print("            <li>".$lang["SecurityRisk"]."</li>\n");
}

print("            <li>".$lang["RemoveSetupDirectory"]."</li>\n");

if(!$deleted_old_wakka_config_file)
{
	print("            <li>".$lang["RemoveWakkaConfigFile"]."</li>\n");
}

if(!$fp)
{
	print("            <li>".$lang["ErrorGivePrivileges"]."</li>\n");
}

print("         </ul>\n");

?>
<form action="<?php echo myLocation() ?>?installAction=write-config"
	method="post"><?php
	writeConfigHiddenNodes(array('none' => ''));

	// If there was a problem then show the "Try Again" button.
	if($fp)
	{
		print("         <h2>".$lang["InstallationComplete"]."</h2>\n");
		print("         <p>".str_replace("%1", $config["base_url"], $lang["ThatsAll"])."</p>\n");
	}
	else
	{
		?> <input type="submit" value="<?php echo $lang["TryAgain"];?>"
	class="next" /> <?php
	}
	?></form>
	<?php
	if(!$fp)
	{
		print("         <div id=\"config_code\" class=\"config_code\"><pre>".htmlentities($configCode)."</pre></div>\n");
	}
	?>
<br />
