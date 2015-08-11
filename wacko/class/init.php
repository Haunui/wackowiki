<?php

if (!defined('IN_WACKO'))
{
	exit('No direct script access allowed');
}

/*

########################################################
##     Wacko engine initialization API                ##
########################################################

	Calling order (* - mandatory for engine startup):

	1.  init()*			- constructor, unescape magic quotes, version checks
	2.  settings()*		- load primary engine config from file: variables and constants
	3.  settings()*		- load secondary engine config from database (calls dbal())
	4.  settings($p,$v)	- set additional config parameters if needed
	5.  request()		- parse request string if needed for wacko pages processing
	6.  dbal()*			- establish DBAL for database operations and connect to DB (required by engine())
	7.  session()		- start user session
	8.  is_locked()		- check website for locking
	9.  installer()		- start installer if necessary
	10. get_micro_time()	- return precise timer
	11. cache()			- initialize caching engine
	12. cache('check')	- process request for caching purposes (required by cache('store'))
	13. engine()*		- initialize Wacko engine
	14. engine('run')	- execute script and open start page (requires engine())
	15. cache('store')	- cache page (requires engine())
	16. debug()			- print debugging information

	Additional information can be found in class methods' comments.

*/

// constants
if ( @file_exists('config/constants.php') )
{
	require_once('config/constants.php');
}
else
{
	die("Error loading WackoWiki constants data: file `config/constants.php` is missing.");
}

class Init
{
	// WRAPPER VARIABLES
	var $config		= array();
	var $dblink		= null;
	var $cacheval	= null;
	var $cache;
	var $engine;
	var $page;
	var $request;
	var $method;
	var $timer;

	// CONSTRUCTOR
	// Mandatory runs and checks.
	function __construct()
	{
		// setting PHP error reporting
		switch(PHP_ERROR_REPORTING)
		{
			case 0:		error_reporting(0); break;
			case 1:		error_reporting(E_ERROR | E_WARNING | E_PARSE); break;
			case 2:		error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE); break;
			case 3:		error_reporting(E_ALL ^ (E_NOTICE | E_WARNING)); break;
			case 4:		error_reporting(E_ALL ^ E_NOTICE); break;
			case 5:		error_reporting(E_ALL); break;
			default:	error_reporting(E_ALL);
		}

		//  setting default timezone
		if (function_exists('date_default_timezone_set') && function_exists('date_default_timezone_get'))
		{
			// Set the timezone to whatever date_default_timezone_get() returns.
			date_default_timezone_set(@date_default_timezone_get());
		}

		// start execution timer
		$this->timer = $this->get_micro_time();

		if (ini_get('zlib.output_compression'))
		{
			ob_start();
		}
		else
		{
			if (function_exists('ob_gzhandler'))
			{
				ob_start('ob_gzhandler');
			}
		}

		// don't let cookies ever interfere with request vars
		$_REQUEST = array_merge($_GET, $_POST);

		if (!isset($_REQUEST))
		{
			die('$_REQUEST[] not found. WackoWiki requires PHP_MIN_VERSION or higher!');
		}

		if (strstr($_SERVER['SERVER_SOFTWARE'], 'IIS'))
		{
			$_SERVER['REQUEST_URI'] = $_SERVER['PATH_INFO'];
		}
	}

	// INT TIMER
	function get_micro_time()
	{
		list($usec, $sec) = explode(' ', microtime());
		return ((float)$usec + (float)$sec);
	}

	// DEFINE WACKO SETTINGS
	// First must be called without parameters to initialize default
	// settings. Additional settings can be added afterwards.
	function settings($config_name = '', $config_value = '', $override = 0)
	{
		// specific definition
		if ($config_name == true)
		{
			if (!isset($this->config[$config_name]) || $override == 1)
			{
				return $this->config[$config_name] = $config_value;
			}
			else
			{
				return false;
			}
		}
		else
		{
			// primary settings
			if ($this->config == false && !isset($this->dblink))
			{
				$found_rewrite_extension = function_exists('apache_get_modules') ? in_array('mod_rewrite', apache_get_modules()) : false;

				// load default configuration values
				if ( @file_exists('config/config_defaults.php') )
				{
					require_once('config/config_defaults.php');
				}
				else
				{
					die("Error loading WackoWiki default config data: file `config/config_defaults.php` is missing.");
				}

				// load primary config
				if ( @file_exists('config/config.php') )
				{
					// If the file exists and has some content then we assume it's a proper WackoWiki config file, as of R5.0 or higher
					if (@filesize('config/config.php') > 0)
					{
						require('config/config.php');

						// merge with config defaults
						$_wacko_config	= array_merge($wacko_config_defaults, (array)$wacko_config);
						$this->config	= $_wacko_config;

						if ($wacko_config['wacko_version'] != WACKO_VERSION && (!$wacko_config['system_seed'] || strlen($wacko_config['system_seed']) < 20))
						{
							die("WackoWiki fatal error: system_seed in config.php is empty or too short. Please, use 20+ *random* characters to define this variable.");
						}

						$wacko_config['system_seed']	= hash('sha1', $wacko_config['system_seed']);
					}
					else
					{
						// Else it's an empty file so use the default settings.  This is typical on a fresh install.
						$this->config = $wacko_config_defaults;
					}
				}
				else
				{
					$this->config = $wacko_config_defaults;
				}
			}
			// secondary settings
			else if ($this->config == true && !isset($this->dblink))
			{
				// connecting to db
				$this->dbal();

				// retrieving configuration data from db
				$wacko_db_query = "SELECT config_name, config_value FROM {$this->config['table_prefix']}config";

				if ($result = sql_query($this->dblink, $wacko_db_query, 0))
				{
					while ($row = fetch_assoc($result))
					{
						$this->config[$row['config_name']] = $row['config_value'];
					}

					free_result($result);
				}
				else
				{
					die("Error loading WackoWiki config data: database `config` table is empty.");
				}

				// retrieving usergroups data from db
				$wacko_db_query = "SELECT
										g.group_name,
										u.user_name
									FROM
										{$this->config['table_prefix']}usergroup_member gm
											INNER JOIN {$this->config['table_prefix']}user u ON (gm.user_id = u.user_id)
											INNER JOIN {$this->config['table_prefix']}usergroup g ON (gm.group_id = g.group_id)";

				$groups_array = array();

				if ($result = sql_query($this->dblink, $wacko_db_query, 0))
				{
					while ($row = fetch_assoc($result))
					{
						// Here we join our stuff in a single array
						array_push($groups_array, $row);
					}

					free_result($result);

					if (!empty($groups_array))
					{
						$_usergroups = array();

						foreach ($groups_array as $user_group_pairs)
						{
							if (!isset($_usergroups[$user_group_pairs['group_name']]))
							{
								$_usergroups[$user_group_pairs['group_name']] = '';
							}

							// Then we make old fashioned UserName1\nUserName2\n lines for each group
							$_usergroups[$user_group_pairs['group_name']] .= $user_group_pairs['user_name'].'\n';
						}
					}

					if (!empty($_usergroups))
					{
						foreach ($_usergroups as $group => $users)
						{
							// Finally we put the proper Group => UserName1\nUserName2\n to the config
							// when we make trim($users, '\n') we get UserName1\nUserName2 without trailing '\n'
							// Made so to prevent system from trimming 'n\n' (like TestMan\n ->  TestMa)
							$trimone							= rtrim($users, 'n');
							$this->config['aliases'][$group]	= trim($trimone, '\\');
						}
					}
				}
				else
				{
					die("Error loading WackoWiki usergroups data: database `group` table is empty.");
				}

				// saving to cache
				if ($this->config['wacko_version'] == WACKO_VERSION)
				{
					$this->cache_settings('config', $this->config);
				}

				return $this->config;
			}
		}
	}

	// save serialized settings results
	function cache_settings($file_name, $data)
	{
		$filename	= $this->settings_cache_id($file_name);
		$sqldata	= serialize($data);

		file_put_contents($filename, $sqldata);
		chmod($filename, 0644);

		return true;
	}

	// retrieve and unserialize cached settings data
	function load_cached_settings($file_name)
	{
		$filename	= $this->settings_cache_id($file_name);

		if (!@file_exists($filename))
		{
			return false;
		}

		$fp			= fopen($filename, 'r');

		// check for false and empty strings
		if(($data	= fread($fp, filesize($filename))) === '')
		{
			return false;
		}

		fclose($fp);

		return unserialize($data);
	}

	function settings_cache_id($file_name)
	{
		return '_cache/'.CACHE_CONFIG_DIR.$file_name.'.php';
	}

	// REQUEST HANDLING
	// Process request string, define $page and $method vars
	function request()
	{
		// check config data
		if ($this->config == false)
		{
			die("Error processing request: WackoWiki config data must be initialized.");
		}

		// fetch wacko location
		if (isset($_SERVER['PATH_INFO']) && function_exists('virtual'))
		{
			$this->request = $_SERVER['PATH_INFO'];
		}
		else if(isset($_GET['page']))
		{
			$this->request = $_GET['page'];
		}

		// remove leading slash
		$this->request	= preg_replace('/^\//', '', $this->request);
		$this->method	= '';

		// split into page/method
		$p = strrpos($this->request, '/');

		if ($p === false)
		{
			$this->page = $this->request;
		}
		else
		{
			$this->page			= substr($this->request, 0, $p);
			$m1	= $this->method = strtolower(substr($this->request, $p - strlen($this->request) + 1));

			if (!@file_exists($this->config['handler_path'].'/page/'.$this->method.'.php'))
			{
				$this->page		= $this->request;
				$this->method	= '';
			}
			else if (preg_match('/^(.*?)\/('.$this->config['standard_handlers'].')($|\/(.*)$)/i', $this->page, $match))
			{
				//translit case
				$this->page		= $match[1];
				$this->method	= $match[2];
			}
		}

		return true;
	}

	// SESSION HANDLING
	function session()
	{
		$_secure = '';

		// run in tls mode?
		if ($this->config['tls'] == true && (( (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on' && !empty($this->config['tls_proxy'])) || $_SERVER['SERVER_PORT'] == '443' ) ))
		{
			$this->config['base_url']	= str_replace('http://', 'https://'.($this->config['tls_proxy'] ? $this->config['tls_proxy'].'/' : ''), $this->config['base_url']);
			$_secure					= true;
		}

		$_cookie_path = preg_replace('|https?://[^/]+|i', '', $this->config['base_url'].'');

		($_secure == true ? $secure = true : $secure = false );

		session_set_cookie_params(0, $_cookie_path, '', $secure, true);
		session_name($this->config['cookie_prefix'].SESSION_HANDLER_ID);

		// Save session information where specified or with PHP's default
		session_save_path(SESSION_HANDLER_PATH);

		// Initialize the session
		session_start();
		return session_id();
	}

	// DATABASE ABSTRACT LAYER
	// Initialize DBAL for basic DB operations and connect to selected DB.
	// Default DB is 'database_database' config value, however any other value may
	// be passed. All DBs must be on the server specified in the config file.
	function dbal($db_name = '')
	{
		if (isset($this->dblink))
		{
			return;
		}

		// check config data
		if ($this->config == false)
		{
			die("Error loading WackoWiki DBAL: config data must be initialized.");
		}

		// Load the correct database connector
		if (!isset( $this->config['database_driver'] ))
		{
			$this->settings('database_driver', 'mysqli_legacy');
		}

		switch($this->config['database_driver'])
		{
			case 'mysql_pdo':
				$db_file = 'db/pdo.php';
				break;
			case 'mysqli_legacy':
				$db_file = 'db/mysqli.php';
				break;
			default:
				$db_file = 'db/mysqli.php';
				break;
		}

		// load DBAL
		if (@file_exists($db_file))
		{
			require($db_file);
		}
		else
		{
			die("Error loading WackoWiki DBAL: file ".$db_file." not found.");
		}

		// connect to DB
		if ($db_name == false)
		{
			$db_name = $this->config['database_database'];
		}

		$this->dblink = connect($this->config['database_host'], $this->config['database_user'], $this->config['database_password'], $this->config['database_database'], $this->config['database_charset'], $this->config['database_driver'], $this->config['database_port']);

		if ($this->dblink)
		{
			return $this->dblink;
		}
		else
		{
			die("Error loading WackoWiki DBAL: could not establish database connection.");
		}
	}

	// CHECK WEBSITE LOCKING
	function is_locked($file = 'lock')
	{
		$path = 'config/';
		$lock_file = $path.$file;

		clearstatcache();

		if (@file_exists($lock_file))
		{
			$access = file($lock_file);

			if ($access[0] == '1')
			{
				return true;
			}
			else
			{
				return false;
			}
		}
		else
		{
			return false;
		}
	}

	// lock / unlock
	// writes value to lock file
	//		file	= lock file in config folder
	function lock($file = 'lock')
	{
		$path		= 'config/';
		$lock_file	= $path.$file;
		$access		= $this->is_locked();
		$file		= fopen($lock_file, 'w');

		if ($access === true)
		{
			fwrite($file, '0');
		}
		else
		{
			fwrite($file, '1');
		}

		fclose($file);
		unset($access);
	}

	// INSTALLER
	function installer()
	{
		// compare versions, start installer if necessary
		if (!isset($this->config['wacko_version']) || $this->config['wacko_version'] != WACKO_VERSION)
		{
			if (!isset($_REQUEST['installAction']) && !strstr($_SERVER['SERVER_SOFTWARE'], 'IIS'))
			{
				$req = $_SERVER['REQUEST_URI'];

				if ($req{strlen($req) - 1} != '/' && strstr($req, '.php') != '.php')
				{
					header('Location: http://'.$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'].'/');
					exit;
				}
			}

			// start installer
			global $config;
			$config = $this->config;

			if (!$install_action = (isset($_REQUEST['installAction']) ? trim($_REQUEST['installAction']) : ''))
			{
				$install_action = 'lang';
			}

			include('setup/header.php');

			if (@file_exists('setup/'.$install_action.'.php'))
			{
				include('setup/'.$install_action.'.php');
			}
			else
			{
				echo '<em>Invalid action</em>';
			}

			include('setup/footer.php');

			exit;
		}
	}

	// CACHING ENGINE
	// First must be initialized without parameters. Then
	// can be used with these values (for corresponding
	// cache class methods):
	//		log		= Log
	//		check	= check_http_request
	//		store	= store_page_cache
	function cache($op = '')
	{
		// check config data
		if ($this->config == false)
		{
			die("Error starting WackoWiki cache engine: config data must be initialized.");
		}

		if ($this->cache == false || $op == false)
		{
			require($this->config['class_path'].'/cache.php');
			return $this->cache = new cache($this->config['cache_dir'], $this->config['cache_ttl'], $this->config['debug']);
		}
		else if ($this->cache == true && $op == 'check')
		{
			if ($this->config['cache'] && $_SERVER['REQUEST_METHOD'] != 'POST' && $this->method != 'edit' && $this->method != 'watch')
			{
				if (!isset($_COOKIE[$this->config['cookie_prefix'].'auth'.'_'.$this->config['cookie_hash']]))	// anonymous user
				{
					return $this->cacheval = $this->cache->check_http_request($this->page, $this->method);
				}
			}
		}
		else if ($this->cache == true && $op == 'store')
		{
			if ($this->cacheval == true)
			{
				$data = ob_get_contents();

				if (!empty($data))
				{
					return $this->cache->store_page_cache($data);
				}
				else
				{
					// FALSE, then output buffering is not active
				}
			}
		}
		else if ($this->config['cache'] && $this->cache == true && $op == 'log')
		{
			return $this->cache->log('Before Run WackoWiki='.$this->engine->config['wacko_version']);
		}
		else
		{
			return false;
		}
	}

	// WACKOWIKI ENGINE
	// First must be initialized without parameters. Then
	// can be used with these values:
	//		run		= Main execution routine (open start page)
	//		lang	= Load and register locale string resources
	//				  only (for $lang or for default language)
	function engine($op = '', $lang = '')
	{
		// check config data
		if ($this->config == false)
		{
			die("Error starting WackoWiki engine: config data must be initialized.");
		}

		// terminate for banned IPs
		/* if (in_array($_SERVER['REMOTE_ADDR'], $this->config['bans']))
		{
			die();
		} */

		if ($this->engine == false || $op == false)
		{
			// check DB connection
			if ($this->dblink == false)
			{
				die("Error starting WackoWiki engine: no database connection established.");
			}

			require($this->config['class_path'].'/wacko.php');
			$this->engine = new Wacko($this->config, $this->dblink);
			$this->engine->header_count = 0;

			// FIXME: add description
			if ($this->cache == true)
			{
				$this->cache->wacko		= & $this->engine;
				$this->engine->cache	= & $this->cache;
			}

			return $this->engine;
		}
		else if ($this->engine == true && $op == 'run')
		{
			return $this->engine->run($this->page, $this->method);
		}
		else if ($this->engine == true && $op == 'lang')
		{
			// registers locale resources for admin panel
			//		call $init->engine('lang');
			if ($lang == false)
			{
				$lang = $this->config['language'];
			}

			$this->engine->load_all_languages();
			$this->engine->load_translation($lang);
			$this->engine->set_translation($lang);
			$this->engine->set_language($lang);
			// set charset
			$this->engine->charset = $this->engine->languages[$lang]['charset'];

			return true;
		}
		else
		{
			return false;
		}
	}

	// DEBUG INFO
	function debug()
	{
		if ($this->config['debug'] >= 1 && strpos($this->method, '.xml') === false && $this->method != 'print' && $this->method != 'wordprocessor')
		{
			if (($this->config['debug_admin_only'] == true && $this->engine->is_admin() === true) || $this->config['debug_admin_only'] == false)
			{
				$overall_time = $this->get_micro_time() - $this->timer;

				echo '<div id="debug">'.
					 '<p class="debug">Program execution statistics</p>'."\n<ul>\n";

				// get memory usage
				if(function_exists('memory_get_peak_usage'))
				{
					$execmem = memory_get_peak_usage(true);
				}

				if ($execmem)
				{
					echo "<li>Memory allocated: ".(number_format(($execmem / (1024*1024)), 3))." MiB </li>\n";
				}

				#echo "<li>UTC: ".date('Y-m-d H:i:s', time())."</li>\n";
				echo "<li>Overall time taken: ".(number_format(($overall_time), 3))." sec. </li>\n";

				if ($this->config['debug'] >= 2)
				{
					echo "<li>Execution time: ".number_format($overall_time - $this->engine->query_time, 3)." sec.</li>\n";
					echo "<li>SQL time: ".number_format($this->engine->query_time, 3)." sec.</li>\n";
				}

				if ($this->config['debug'] >= 3)
				{
					echo "<li>SQL queries: ".count($this->engine->query_log)."</li>\n";
					echo "<li>SQL queries dump follows".( $this->config['debug_sql_threshold'] > 0 ? " (&gt;".$this->config['debug_sql_threshold']." sec.)" : "" ).":<ol>\n";

					foreach ($this->engine->query_log as $query)
					{
						if ($query['time'] < $this->config['debug_sql_threshold'])
						{
							continue;
						}

						echo "<li>";
						echo str_replace(array('<', '>'), array('&lt;', '&gt;'), $query['query'])."<br />";
						echo "[".number_format($query['time'], 4)." sec.]";
						echo "</li>\n";
					}

					echo "</ol>\n</li>\n";
				}
				echo "</ul>\n";

				if ($this->config['debug'] >= 2)
				{
					$user = $this->engine->get_user();
					echo '<p class="debug">Language data</p>'."\n<ul>\n";
					echo "<li>Multilanguage: ".($this->config['multilanguage'] == 1 ? 'true' : 'false')."</li>\n";
					echo "<li>HTTP_ACCEPT_LANGUAGE set: ".(isset($_SERVER['HTTP_ACCEPT_LANGUAGE']) ? 'true' : 'false')."</li>\n";
					echo "<li>HTTP_ACCEPT_LANGUAGE value: ".$_SERVER['HTTP_ACCEPT_LANGUAGE']."</li>\n";
					echo "<li>HTTP_ACCEPT_LANGUAGE chopped value: ".strtolower(substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2))."</li>\n";
					echo "<li>User language set: ".(isset($user['lang']) ? 'true' : 'false')."</li>\n";
					echo "<li>User language value: ".(isset($user['lang']) ? $user['lang'] : '')."</li>\n";
					echo "<li>Page language: ".$this->engine->page['lang'] ."</li>\n";
					echo "<li>Config language: ".$this->config['language']."</li>\n";
					echo "<li>User selected language: ".(isset($this->engine->user_lang) ? $this->engine->user_lang : '')."</li>\n";
					echo "<li>Charset: ".$this->engine->get_charset()."</li>\n";
					echo "<li>HTML Entities Charset: ".HTML_ENTITIES_CHARSET."</li>\n";
					echo "</ul>\n";
				}

				if ($this->config['debug'] >= 3)
				{
					$query = 'SHOW VARIABLES LIKE "%character_set%";';

					if ($r = $this->engine->load_all($query, true))
					{
						echo "<p class=\"debug\">MySQL character set</p>\n<ul>\n";

						foreach ($r as $k => $charset_item)
						{
							echo "<li>".$charset_item['Variable_name'].": ".$charset_item['Value']."</li>\n";
						}

						echo "</ul>\n";
					}
				}

				if ($this->config['debug'] >= 3)
				{
					echo '<p class="debug">Session data</p>'."\n<ul>\n";
					echo "<li>session_id(): ".session_id()."</li>\n";
					echo "<li>Base URL: ".$this->config['base_url']."</li>\n";
					echo "<li>HTTPS: ".(isset($_SERVER['HTTPS']) ? $_SERVER['HTTPS'] : '')."</li>\n";
					echo "<li>IP-address: ".$this->engine->get_user_ip()."</li>\n";
					echo "<li>SERVER_PORT: ".$_SERVER['SERVER_PORT']."</li>\n";
					echo "<li>TLS: ".(isset($this->config['tls']) ? 'on' : 'off')."</li>\n";
					echo "<li>TLS Proxy: ".(!empty($this->config['tls_proxy']) ? $this->config['tls_proxy'] : "false")."</li>\n";
					echo "<li>TLS implicit: ".(($this->config['tls_implicit'] == true) ? 'on' : 'off')."</li>\n";
					echo "<li>Cookie hash: ".(isset($this->config['cookie_hash']) ? $this->config['cookie_hash'] : '')."</li>\n";
					echo "<li>Cookie path: ".$this->config['cookie_path']."</li>\n";
					echo "</ul>\n";
				}

				if ($this->config['debug'] >= 3)
				{
					$this->engine->debug_print_r($_SESSION);
					$this->engine->debug_print_r($this->engine->context);
					#$this->engine->debug_print_r($this->config);
					#$this->engine->debug_print_r($this->engine->page);
				}

				echo "</div >\n";
			}
			else
			{
				return;
			}
		}
		else
		{
			return;
		}
	}

}

?>