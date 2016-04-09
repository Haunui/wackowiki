<?php

/*
	Wacko Wiki MySQL Table Updates Script

	These are all the updates that need to applied to earlier Wacko version to bring them up to 5.5 specs
*/

$pref		= $config['table_prefix'];
$charset	= 'DEFAULT CHARSET='.$config['database_charset'];
$engine		= 'ENGINE='.$config['database_engine'];

// ACL

// AUTH TOKEN
$table_auth_token_r5_4_0 = "CREATE TABLE {$pref}auth_token (".
						"cookie_token CHAR(40) COLLATE utf8_bin NOT NULL DEFAULT '',".
						"user_id INT(10) UNSIGNED NOT NULL DEFAULT '0',".
						"session_last_visit DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00',".
						"session_start DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00',".
						"session_time DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00',".
						"session_ip VARCHAR(40) NOT NULL DEFAULT '',".
						"session_browser VARCHAR(150) NOT NULL DEFAULT '',".
						"session_forwarded_for VARCHAR(255) NOT NULL DEFAULT '',".
						"session_admin TINYINT(1) UNSIGNED NOT NULL DEFAULT '0',".
						"PRIMARY KEY (cookie_token),".
						"KEY session_time (session_time),".
						"KEY session_user_id (user_id)".
						") {$engine} COMMENT='' {$charset}";

// CACHE
$alter_cache_r5_1_0 = "ALTER TABLE {$pref}cache DROP INDEX timestamp, ADD INDEX idx_cache_time (cache_time)";
$alter_cache_r5_1_1 = "ALTER TABLE {$pref}cache ADD cache_id INT(10) UNSIGNED NOT NULL AUTO_INCREMENT FIRST, ADD PRIMARY KEY (cache_id)";
$alter_cache_r5_4_0 = "ALTER TABLE {$pref}cache CHANGE name name CHAR(40) NOT NULL  DEFAULT ''";
$alter_cache_r5_4_1 = "ALTER TABLE {$pref}cache CHANGE lang cache_lang VARCHAR(2) NOT NULL";

// CATEGORY
$alter_category_r5_4_0 = "ALTER TABLE {$pref}category CHANGE parent parent_id INT(10) UNSIGNED NOT NULL";
$alter_category_r5_4_1 = "ALTER TABLE {$pref}category ADD description VARCHAR(255) NOT NULL DEFAULT '' AFTER category";
$alter_category_r5_4_2 = "ALTER TABLE {$pref}category CHANGE lang category_lang VARCHAR(2) NOT NULL";

// CONFIG
$update_config_r5_4_0 = "UPDATE {$pref}config SET config_value = 'addcomment|admin\\.php|categories|claim|clone|diff|edit|export\\.xml|file|latex|moderate|new|permissions|purge|print|properties|rate|referrers|referrers_sites|remove|rename|review|revisions|revisions\\.xml|robots\\.txt|sitemap\\.xml|show|source|upload|watch|wordprocessor' WHERE config_name = 'standard_handlers'";
$update_config_r5_4_1 = "DELETE FROM {$pref}config WHERE config_name IN ('session_expiration', 'x_csp', 'x_frame_option', 'session_encrypt_cookie', 'allow_swfobject')";
$update_config_r5_4_2 = "UPDATE {$pref}config SET config_value = config_value * 1024 WHERE config_name = 'upload_max_size'";
$update_config_r5_4_3 = "UPDATE {$pref}config SET config_value = config_value * 1024 WHERE config_name = 'upload_quota'";
$update_config_r5_4_4 = "UPDATE {$pref}config SET config_value = config_value * 1024 WHERE config_name = 'upload_quota_per_user'";

// FILE LINK
$table_file_link_r5_4_0 = "CREATE TABLE {$pref}file_link (".
							"file_link_id INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,".
							"page_id INT(10) UNSIGNED NOT NULL DEFAULT '0',".
							"file_id INT(10) UNSIGNED NOT NULL DEFAULT '0',".
							"PRIMARY KEY (file_link_id),".
							"KEY idx_page_id (page_id),".
							"KEY idx_file_id (file_id)".
						") {$engine} COMMENT='' {$charset}";

// LINK
$alter_link_r5_1_0 = "ALTER TABLE {$pref}link DROP INDEX from_tag, ADD INDEX idx_from_tag (from_page_id, to_tag(78))";

// LOG

// MENU
$alter_menu_r5_4_0 = "ALTER TABLE {$pref}menu CHANGE lang menu_lang VARCHAR(2) NOT NULL";
$alter_menu_r5_4_1 = "ALTER TABLE {$pref}menu DROP INDEX idx_user_id, ADD UNIQUE idx_user_id (user_id, page_id, menu_lang) USING BTREE";

// PAGE
$alter_page_r5_1_0 = "ALTER TABLE {$pref}page ADD INDEX idx_deleted (deleted)";
$alter_page_r5_4_0 = "ALTER TABLE {$pref}page CHANGE lang page_lang VARCHAR(2) NOT NULL";

$update_page_r5_1_0 = "UPDATE {$pref}page AS page SET noindex = '0' WHERE page.noindex IS NULL";
$update_page_r5_4_0 = "UPDATE {$pref}page SET body_toc = ''";
$update_page_r5_4_1 = "UPDATE {$pref}page SET body_r = ''";
$update_page_r5_4_2 = "Update {$pref}page AS p, (SELECT user_id FROM {$pref}user WHERE user_name = 'System') AS u SET p.noindex = '1' WHERE p.owner_id = u.user_id";

// POLL

// RATING

// REFERRER
$alter_referrer_r5_4_0 = "ALTER TABLE {$pref}referrer ADD referrer_id INT(10) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY FIRST";

// REVISION
$alter_revision_r5_1_0 = "ALTER TABLE {$pref}revision ADD INDEX idx_deleted (deleted)";
$alter_revision_r5_4_0 = "ALTER TABLE {$pref}revision CHANGE lang page_lang VARCHAR(2) NOT NULL";

$update_revision_r5_4_0 = "UPDATE {$pref}revision AS r, (SELECT page_id, page_lang FROM {$pref}page) AS p SET r.page_lang = p.page_lang WHERE r.page_id = p.page_id";

// TAG
$alter_tag_r5_4_0 = "ALTER TABLE {$pref}tag CHANGE lang tag_lang VARCHAR(2) NOT NULL";

// UPLOAD
$alter_upload_r5_1_0 = "ALTER TABLE {$pref}upload ADD INDEX idx_deleted (deleted)";
$alter_upload_r5_1_1 = "ALTER TABLE {$pref}upload DROP INDEX page_id, ADD INDEX idx_page_id (page_id, file_name)";
$alter_upload_r5_1_2 = "ALTER TABLE {$pref}upload DROP INDEX page_id_2, ADD INDEX idx_page_id_2 (page_id, uploaded_dt)";
$alter_upload_r5_1_3 = "ALTER TABLE {$pref}upload CHANGE description file_description VARCHAR(250) NOT NULL DEFAULT ''";
$alter_upload_r5_4_0 = "ALTER TABLE {$pref}upload CHANGE lang upload_lang VARCHAR(2) NOT NULL";

// USER
$alter_user_r5_4_0 = "ALTER TABLE {$pref}user CHANGE session_time last_visit DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00'";
$alter_user_r5_4_1 = "ALTER TABLE {$pref}user ADD user_form_salt VARCHAR(40) NOT NULL DEFAULT '' AFTER change_password";
$alter_user_r5_4_2 = "ALTER TABLE {$pref}user CHANGE password password VARCHAR(255) NOT NULL";
$alter_user_r5_4_3 = "ALTER TABLE {$pref}user ADD account_lang VARCHAR(2) NOT NULL DEFAULT '' AFTER real_name";
$alter_user_r5_4_4 = "ALTER TABLE {$pref}user ADD account_status TINYINT(1) UNSIGNED NOT NULL DEFAULT '0' AFTER email";
$alter_user_r5_4_5 = "ALTER TABLE {$pref}user ADD user_ip VARCHAR(40) NOT NULL DEFAULT '' AFTER change_password";

$update_user_r5_4_0 = "UPDATE {$pref}user AS u, (SELECT user_id, user_lang FROM {$pref}user_setting) AS s SET u.account_lang = s.user_lang WHERE u.user_id = s.user_id";

// USER SETTING
$alter_user_setting_r5_4_0 = "ALTER TABLE {$pref}user_setting CHANGE session_expiration session_length TINYINT(3) UNSIGNED NULL DEFAULT NULL";
$alter_user_setting_r5_4_1 = "ALTER TABLE {$pref}user_setting ADD sorting_comments TINYINT(1) UNSIGNED NOT NULL DEFAULT '0' AFTER dst";
$alter_user_setting_r5_4_2 = "ALTER TABLE {$pref}user_setting DROP revisions_count";
$alter_user_setting_r5_4_3 = "ALTER TABLE {$pref}user_setting CHANGE changes_count list_count INT(10) UNSIGNED NOT NULL DEFAULT '50'";
$alter_user_setting_r5_4_4 = "ALTER TABLE {$pref}user_setting CHANGE lang user_lang VARCHAR(2) NOT NULL DEFAULT ''";
$alter_user_setting_r5_4_5 = "ALTER TABLE {$pref}user_setting ADD notify_minor_edit TINYINT(1) UNSIGNED NOT NULL DEFAULT '1' AFTER numerate_links";
$alter_user_setting_r5_4_6 = "ALTER TABLE {$pref}user_setting ADD notify_page TINYINT(1) UNSIGNED NOT NULL DEFAULT '2' AFTER notify_minor_edit";
$alter_user_setting_r5_4_7 = "ALTER TABLE {$pref}user_setting ADD notify_comment TINYINT(1) UNSIGNED NOT NULL DEFAULT '1' AFTER notify_page";

// USERGROUP
$alter_usergroup_r5_4_0 = "ALTER TABLE {$pref}usergroup CHANGE moderator moderator_id INT(10) UNSIGNED NOT NULL DEFAULT '0'";
$alter_usergroup_r5_4_1 = "ALTER TABLE {$pref}usergroup ADD group_lang VARCHAR(2) NOT NULL AFTER group_name";

// WATCH
$alter_watch_r5_4_0 = "ALTER TABLE {$pref}watch ADD pending TINYINT(1) UNSIGNED NOT NULL DEFAULT '0' AFTER comment_id";

// WORD
$table_word_r5_4_0 = "CREATE TABLE {$pref}word (".
					"word_id MEDIUMINT(8) UNSIGNED NOT NULL AUTO_INCREMENT,".
					"word VARCHAR(255) NOT NULL DEFAULT '',".
					"replacement VARCHAR(255) NOT NULL DEFAULT '',".
					"PRIMARY KEY (word_id)".
				") {$engine} COMMENT='' {$charset}";

?>