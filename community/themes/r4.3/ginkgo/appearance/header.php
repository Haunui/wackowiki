<?php
/*
Ginko theme.
Common header file.
*/

// HTTP header with right Charset settings
  header("Content-Type: text/html; charset=".$this->GetCharset());
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->page["lang"] ?>" lang="<?php echo $this->page["lang"] ?>">
<head>
<title>
<?php
// Echoes Title of the page.
  echo $this->GetWackoName()." : ".$this->AddSpaces($this->GetPageTag()).($this->method!="show"?" (".$this->method.")":"");
?>
</title>
<?php
// We don't need search robots to index subordinate pages
  if ($this->GetMethod() != 'show' || $this->page["latest"] == "0")
     echo "<meta name=\"robots\" content=\"noindex, nofollow\" />\n";
?>
<meta name="keywords" content="<?php echo $this->GetKeywords(); ?>" />
<meta name="description" content="<?php echo $this->GetDescription(); ?>" />
<meta name="language" content="<?php echo $this->page["lang"] ?>" />
<meta http-equiv="content-type" content="text/html; charset=<?php echo $this->GetCharset(); ?>" />
<link rel="stylesheet" type="text/css" href="<?php echo $this->GetConfigValue("theme_url") ?>css/default.css" />
<link rel="shortcut icon" href="<?php echo $this->GetConfigValue("theme_url") ?>icons/favicon.ico" type="image/x-icon" />
<link rel="alternate" type="application/rss+xml" title="<?php echo $this->GetTranslation("RecentChangesRSS");?>" href="<?php echo $this->GetConfigValue("root_url");?>xml/changes_<?php echo preg_replace("/[^a-zA-Z0-9]/", "", strtolower($this->GetConfigValue("wacko_name")));?>.xml" />
<link rel="alternate" type="application/rss+xml" title="<?php echo $this->GetTranslation("RecentCommentsRSS");?>" href="<?php echo $this->GetConfigValue("root_url");?>xml/comments_<?php echo preg_replace("/[^a-zA-Z0-9]/", "", strtolower($this->GetConfigValue("wacko_name")));?>.xml" />
<link rel="alternate" type="application/rss+xml" title="<?php echo $this->GetTranslation("HistoryRevisionsRSS");?><?php echo $this->tag; ?>" href="<?php echo $this->href("revisions.xml");?>" />
<?php
// JS files.
// default.js contains common procedures and should be included everywhere
?>
  <script type="text/javascript" src="<?php echo $this->GetConfigValue("root_url");?>js/default.js"></script>
<?php
// protoedit & wikiedit2.js contain classes for WikiEdit editor. We may include them only on method==edit pages
if ($this->method == 'edit')
{
	echo "  <script type=\"text/javascript\" src=\"".$this->GetConfigValue("root_url")."js/protoedit.js\"></script>\n";
	echo "  <script type=\"text/javascript\" src=\"".$this->GetConfigValue("root_url")."js/wikiedit2.js\"></script>\n";
	echo "  <script type=\"text/javascript\" src=\"".$this->GetConfigValue("root_url")."js/autocomplete.js\"></script>\n";
}
?>
<script type="text/javascript" src="<?php echo $this->GetConfigValue("root_url");?>js/swfobject.js"></script>
<script type="text/javascript" src="<?php echo $this->GetConfigValue("root_url");?>js/captcha.js"></script>
<?php
// Doubleclick edit feature.
// Enabled only for registered users who don't swith it off (requires class=page in show handler).
if ($user = $this->GetUser())
   {
      if ($user["doubleclickedit"] == "1")
         {
?>
  <script type="text/javascript">
   var edit = "<?php echo $this->href("edit");?>";
  </script>
<?php
         }
   }
else if($this->HasAccess("write"))
   {
?>

      <script type="text/javascript">
      var edit = "<?php echo $this->href("edit");?>";
     </script>
<?php
   }
?>
</head>
<?php
// all_init() initializes all js features:
//   * WikiEdit
//   * Doubleclick editing
//   * Smooth scrolling
?>
<body onload="all_init();">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="378" valign="bottom" style="white-space: nowrap;"><span class="main"><a href="<?php echo $this->GetConfigValue("root_url")?>"class="main"><?php echo $this->config["wacko_name"] ?></a></span></td>
    <td width="100%"><div align="right"><?php
// Opens Search form
echo $this->FormOpen("", $this->GetTranslation("TextSearchPage"), "get");

// Searchbar
?>
<span class="searchbar nobr"><label for="phrase"><?php echo $this->GetTranslation("SearchText"); ?></label><input
	type="text" name="phrase" id="phrase" size="15" /><input class="submitinput" type="submit" title="<?php echo $this->GetTranslation("SearchButtonText") ?>" alt="<?php echo $this->GetTranslation("SearchButtonText") ?>" value="�"/></span>
<?php

// Search form close
echo $this->FormClose();
?></div></td>
  </tr>
  <tr>
    <td valign="top"><div class="tagline">Placeholder</div></td>
    <td width="100%">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2" bgcolor="#5C743D"></td>
  </tr>
  <tr>
    <td colspan="2" bgcolor="#85a43c"></td>
  </tr>
  <tr bgcolor="#85a43c">
    <td height="20" colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td><div class="navText"><strong><?php echo $this->ComposeLinkToPage($this->config["root_page"]);?>:</strong> <?php echo $this->GetPagePath(); ?> <a title="<?php echo $this->GetTranslation("SearchTitleTip")?>"
     href="<?php echo $this->config["base_url"].$this->GetTranslation("TextSearchPage").($this->config["rewrite_mode"] ? "?" : "&amp;");?>phrase=<?php echo urlencode($this->GetPageTag()); ?>">...</a></div></td>
          <td align="right"><?php
// If user are logged, Wacko shows "You are UserName"
if ($this->GetUser()) {
?>
            <span class="nobr"><?php echo $this->GetTranslation("YouAre")." ".$this->Link($this->GetUserName()) ?></span> <small>( <span class="nobr Tune">
            <?php
      echo $this->ComposeLinkToPage($this->GetTranslation("YouArePanelLink"), "", $this->GetTranslation("YouArePanelAccount"), 0); ?>
            | <a onclick="return confirm('<?php echo $this->GetTranslation("LogoutAreYouSure");?>');" href="<?php echo $this->Href("",$this->GetTranslation("LoginPage")).($this->config["rewrite_mode"] ? "?" : "&amp;");?>action=logout&amp;goback=<?php echo $this->SlimUrl($this->tag);?>"><?php echo $this->GetTranslation("LogoutLink"); ?></a></span> )</small>
            <?php
// Else Wacko shows login's controls
}
// End if
?></td>
        </tr>
        <?php
// Closing Login form, If user are logged
# if ($this->GetUser()) {
# echo $this->FormClose();
# }
// End if
?>
      </table></td>
  </tr>
  <tr>
    <td colspan="2" bgcolor="#99CC66"></td>
  </tr>
  <tr>
    <td colspan="2" bgcolor="#5C743D"></td>
  </tr>
</table>
<table align="center" border="0" cellpadding="0" cellspacing="0" width="100%">
<tr>
  <td valign="top" class="left" width="185" style="white-space: nowrap;"><table width="185" border="0" align="left" cellpadding="0" cellspacing="0">
      <tr align="left">
        <td><div>
            <?php
		# echo '<br />';
        # echo "<hr color=#CCCCCC noshade size=1 />";
		echo '<div class="leftNav"><ul class="leftNav"><li>';

// Bookmarks
$BMs = $this->GetBookmarks();
$formatedBMs =  $this->Format($this->Format(implode("| ", $BMs), "wacko"), "post_wacko");
$formatedBMs = str_replace ( "| ", "</li><li>\n", $formatedBMs );
echo $formatedBMs;
echo "</li></ul></div>";
        # echo "<hr color=#CCCCCC noshade size=1 />";
		echo '<br />';
       if ($this->GetUser()) {
			if (!in_array($this->GetPageSuperTag(),$this->GetBookmarkLinks())) {?>
            <a href="<?php echo $this->Href('', '', "addbookmark=yes")?>"> <img src="<?php echo $this->GetConfigValue("theme_url") ?>icons/bookmark1.gif" border="0" align="bottom" style="vertical-align: middle; "/> <?php echo $this->GetTranslation("Bookmarks"); ?> </a>
            <?php } else { ?>
            <a href="<?php echo $this->Href('', '', "removebookmark=yes")?>"> <img src="<?php echo $this->GetConfigValue("theme_url") ?>icons/bookmark2.gif" border="0" align="bottom" style="vertical-align: middle; "/> <?php echo $this->GetTranslation("Bookmarks");
?> </a>
            <?php
}
echo "<hr noshade=\"noshade\" size=\"1\" />";
echo "<div class=\"credits\">";
print $this->Format( '{{hits}} Aufrufe' );
echo "</div>";
}
?>
            <div>
              <?php
        					#    if ($this->UserIsOwner()) {
		                    #   		echo "<hr color=\"#CCCCCC\" noshade=\"noshade\" size=\"1\" />";
							#		print($this->GetTranslation("YouAreOwner"));
							#    } else {
		                    #  		echo "<hr noshade=\"noshade\" size=\"1\" />";
							#    	if ($owner = $this->GetPageOwner()) {
							#        print($this->GetTranslation("Owner").": ".$this->Link($owner));
							#      } else if (!$this->page["comment_on_id"]) {
							#        print($this->GetTranslation("Nobody").($this->GetUser() ? " (<a href=\"".$this->href("claim")."\">".$this->GetTranslation("TakeOwnership")."</a>)" : ""));
							#      }

							# }
							# echo '<br />';
							?>
            </div>
          </div></td>
      </tr>
      <tr>
        <td></td>
      </tr>
    </table></td>
  <td>
<?php
// here we show messages
if ($message = $this->GetMessage()) echo "<div class=\"info\">$message</div>";
?>