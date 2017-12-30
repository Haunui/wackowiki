<?php

if (!defined('IN_WACKO'))
{
	exit;
}

$ap_translation = [
	'MainNote'					=> 'Hinweis: Es wird empfolen den Zugang zur Site f�r administrative Wartungsarbeiten zu sperren.',

	'CategoryArray'		=> [
		'basics'		=> 'Grundfunktion',
		'preferences'	=> 'Einstellungen',
		'content'		=> 'Inhalt',
		'users'			=> 'Nutzer',
		'maintenance'	=> 'Wartung',
		'messages'		=> 'Mitteilung',
		'extension'		=> 'Erweiterung',
		'database'		=> 'Datenbank',
	],

	// Admin panel
	'AdminPanel'				=> 'Administrations-Bereich',
	'RecoveryMode'				=> 'Wiederherstellungs-Modus',
	'Authorization'				=> 'Autorisation',
	'AuthorizationTip'			=> 'Bitte gib das Administratorkennwort ein (und stelle sicher, dass Cookies von deinem Browser akzeptiert werden).',
	'NoRecoceryPassword'		=> 'Das Administrator-Passwort wurde nicht gesetzt!',
	'NoRecoceryPasswordTip'		=> 'Hinweis: Das Fehlen eines Administrator-Passworts ist eine Bedrohung f�r die Sicherheit! Gib das Passwort in der Konfigurationsdatei an und starte das Programm erneut.',

	'ErrorLoadingModule'		=> 'Fehler beim Laden des Admin-Moduls %1: existiert nicht.',

	'FormSave'					=> 'Speichern',
	'FormReset'					=> 'Zur�cksetzen',
	'FormUpdate'				=> 'Aktualisieren',

	'ApHomePage'				=> 'Startseite',
	'ApHomePageTip'				=> '�ffne die Startseite, beende nicht die Verwaltung ',
	'ApLogOut'					=> 'Abmelden',
	'ApLogOutTip'				=> 'Beende die Systemverwaltung',

	'TimeLeft'					=> 'Restzeit:  %1 Minuten',
	'ApVersion'					=> 'Version',

	'SiteOpen'					=> '�ffnen',
	'SiteOpened'				=> 'Website ge�ffnet',
	'SiteOpenedTip'				=> 'Die Website ist offen',
	'SiteClose'					=> 'schlie�en',
	'SiteClosed'				=> 'Website geschlossen',
	'SiteClosedTip'				=> 'Die Website ist geschlossen',

	// Generic
	'Cancel'					=> 'Abbrechen',
	'Add'						=> 'Hinzuf�gen',
	'Edit'						=> 'Bearbeiten',
	'Remove'					=> 'Entfernen',
	'Enabled'					=> 'aktiviert',
	'Disabled'					=> 'deaktiviert',
	'On'						=> 'an',
	'Off'						=> 'aus',
	'Mandatory'					=> 'zwingend',
	'Admin'						=> 'Admin',

	'MiscellaneousSection'		=> 'Sonstiges',
	'MainSection'				=> 'Grundeinstellungen',

	'DirNotWritable'			=> 'Das Verzeichis %1 ist nicht schreibbar.',

	/**
	 * AP MENU
	 *
	 *	'module_name'		=> [
	 *		'name'		=> 'Module name',
	 *		'title'		=> 'Module title',
	 *	],
	 */

	// Config Basic module
	'config_basic'		=> [
		'name'		=> 'Allgemein',
		'title'		=> 'Grundeinstellungen',
	],

	// Config Appearance module
	'config_appearance'		=> [
		'name'		=> 'Aussehen',
		'title'		=> 'Aussehen-Einstellungen',
	],

	// Config Email module
	'config_email'		=> [
		'name'		=> 'E-Mail',
		'title'		=> 'E-Mail-Einstellungen',
	],

	// Config Filter module
	'config_filter'		=> [
		'name'		=> 'Filter',
		'title'		=> 'Filter-Einstellungen',
	],

	// Config Formatter module
	'config_formatter'		=> [
		'name'		=> 'Formatierer',
		'title'		=> 'Formatierungs-Einstellungen',
	],

	// Config Notifications module
	'config_notifications'		=> [
		'name'		=> 'Mitteilungen',
		'title'		=> 'Einstellungen f�r Benachrichtigungen',
	],

	// Config Pages module
	'config_pages'		=> [
		'name'		=> 'Seiten',
		'title'		=> 'Seiten und Website-Einstellungen',
	],

	// Config Permissions module
	'config_permissions'		=> [
		'name'		=> 'Berechtigungen',
		'title'		=> 'Einstellungen f�r Berechtigungen',
	],

	// Config Security module
	'config_security'		=> [
		'name'		=> 'Sicherheit',
		'title'		=> 'Sicherheits-Einstellungen',
	],

	// Config System module
	'config_system'		=> [
		'name'		=> 'System',
		'title'		=> 'System-Einstellungen',
	],

	// Config Upload module
	'config_upload'		=> [
		'name'		=> 'Hochladen',
		'title'		=> 'Anhang-Einstellungen',
	],

	// Categories module
	'content_categories'		=> [
		'name'		=> 'Kategorien',
		'title'		=> 'Kategorien verwalten',
	],

	// Comments module
	'content_comments'		=> [
		'name'		=> 'Kommentare',
		'title'		=> 'Kommentare verwalten',
	],

	// Deleted module
	'content_deleted'		=> [
		'name'		=> 'Gel�scht',
		'title'		=> 'Neu gel�schte Inhalte',
	],

	// Files module
	'content_files'		=> [
		'name'		=> 'Dateien',
		'title'		=> 'Verwalte hochgeladene Dateien',
	],

	// Menu module
	'content_menu'		=> [
		'name'		=> 'Men�',
		'title'		=> 'Hinzuf�gen, Bearbeiten oder Entfernen von Standard-Men�punkten',
	],

	// Pages module
	'content_pages'		=> [
		'name'		=> 'Seiten',
		'title'		=> 'Seiten verwalten',
	],

	// Polls module
	'content_polls'		=> [
		'name'		=> 'Umfragen',
		'title'		=> 'Bearbeiten, Starten und Beenden von Abstimmungen',
	],

	// DB Backup module
	'db_backup'		=> [
		'name'		=> 'Datensicherung',
		'title'		=> 'Daten sichern',
	],

	// DB Convert module
	'db_convert'		=> [
		'name'		=> 'Konvertieren',
		'title'		=> 'Konvertieren von Tabellen oder Spalten',
	],

	// DB Repair module
	'db_repair'		=> [
		'name'		=> 'Reperatur',
		'title'		=> 'Datenbank reparieren und optimieren',
	],

	// DB Restore module
	'db_restore'		=> [
		'name'		=> 'Wiederherstellung',
		'title'		=> 'Wiederherstellen von Sicherungsdaten',
	],

	// Dashboard module
	'main'		=> [
		'name'		=> 'Haupt-Men�',
		'title'		=> 'WackoWiki Administration',
	],

	// Inconsistencies module
	'maint_inconsistencies'		=> [
		'name'		=> 'Inkonsistenzen',
		'title'		=> 'Inkonsistenzen beheben',
	],

	// Data Synchronization module
	'maint_resync'		=> [
		'name'		=> 'Daten-Synchronisation',
		'title'		=> 'Daten synchronisieren',
	],

	// Transliterate module
	'maint_transliterate'		=> [
		'name'		=> 'Transliteration',
		'title'		=> 'Aktualisiere den Supertag in den Datenbankdatens�tzen',
	],

	// Mass email module
	'massemail'		=> [
		'name'		=> 'Rundmail',
		'title'		=> 'Rundmail senden',
	],

	// System message module
	'messages'		=> [
		'name'		=> 'System-Nachrichten',
		'title'		=> 'System-Nachrichten',
	],

	// System Info module
	'system_info'		=> [
		'name'		=> 'System-Info',
		'title'		=> 'Systeminformationen',
	],

	// System log module
	'system_log'		=> [
		'name'		=> 'System-Log',
		'title'		=> 'Protokoll der Systemereignisse',
	],

	// Statistics module
	'system_statistics'		=> [
		'name'		=> 'Statistik',
		'title'		=> 'Zeige Statistiken',
	],

	// Bad Behavior module
	'badbehavior'		=> [
		'name'		=> 'Bad Behavior',
		'title'		=> 'Bad Behavior',
	],

	// Registration Approval module
	'user_approve'		=> [
		'name'		=> 'Freischaltung',
		'title'		=> 'Neu registrierte Benutzer zulassen',
	],

	// Groups module
	'user_groups'		=> [
		'name'		=> 'Gruppen',
		'title'		=> 'Gruppen-Verwaltung',
	],

	// User module
	'user_users'		=> [
		'name'		=> 'Nutzer',
		'title'		=> 'Nutzer-Verwaltung',
	],

	// Main module
	'PurgeSessions'				=> 'entfernen',
	'PurgeSessionsTip'			=> 'Entferne alle Sitzungen',
	'PurgeSessionsConfirm'		=> 'Bist du dir sicher, da� du alle Sitzungen entfernen willst? Dies wird alle Nuzer abmelden.',
	'PurgeSessionsExplain'		=> 'Entferne alle Sitzungen. Dies wird alle Nuzer abmelden in dem es die auth_token Tabelle leert.',
	'PurgeSessionsDone'			=> 'Sitzungen erfolgreich enfernt.',

	// Basic settings
	'SiteName'					=> 'Name der Seite',
	'SiteNameInfo'				=> 'Der Seitentitel (title-Element im HTML-Kopf) erscheint in der Titelleiste von Browserfenstern und den Registerkarten, im Theme Header, bei Email Benachrichtigung, etc.',
	'SiteDesc'					=> 'Beschreibung der Seite',
	'SiteDescInfo'				=> 'Erg�nzung zum Titel der Website, die im Seitenkopf erscheint, um in wenigen Worten zu erkl�ren, worum es in dieser Seite geht.',
	'AdminName'					=> 'Administrator der Seite',
	'AdminNameInfo'				=> 'Benutzername, der insgesamt f�r die Webseite verantwortlich ist. Dieser Name wird nicht verwendet, um Zugriffsrechte zu bestimmen, aber es ist w�nschenswert, dass er dem Namen des Hauptadministrators der Webseite entspricht.',

	'LanguageSection'			=> 'Sprache',
	'DefaultLanguage'			=> 'Standard Sprache',
	'DefaultLanguageInfo'		=> 'Definiert die Spracheinstellung f�r (nicht registrierte) G�ste sowie die Gebietsschemaeinstellungen und die Transliterationsregeln f�r Seitennamen.',
	'MultiLanguage'				=> 'Unterst�tzung mehrerer Sprachen',
	'MultiLanguageInfo'			=> 'Enth�lt eine Auswahl an Sprachen auf Seitenbasis.',
	'AllowedLanguages'			=> 'Erlaubte Sprachen',
	'AllowedLanguagesInfo'		=> 'Es wird empfohlen, nur die Sprachen auszuw�hlen, die man verwenden m�chte. Andernfalls sind alle Sprachen ausgew�hlt.',

	'CommentSection'			=> 'Kommentare',
	'AllowComments'				=> 'Kommentare aktivieren',
	'AllowCommentsInfo'			=> 'Aktivieren von Kommentaren f�r G�ste, registrierte Benutzer oder deaktivieren auf der gesamten Website.',
	'SortingComments'			=> 'Kommentare sortieren',
	'SortingCommentsInfo'		=> '�ndern der Reihenfolge, in der die Seitenkommentare angezeigt werden, entweder mit dem neuesten oder dem �ltesten Kommentar oben.',

	'ToolbarSection'			=> 'Werkzeugleiste',
	'CommentsPanel'				=> 'Kommentarleiste',
	'CommentsPanelInfo'			=> 'Die Standardanzeige von Kommentaren im unteren Bereich der Seite.',
	'FilePanel'					=> 'Dateileiste',
	'FilePanelInfo'				=> 'Die Standardanzeige von Anh�ngen im unteren Bereich der Seite.',
	'RatingPanel'				=> 'Bewertungsfunktion',
	'RatingPanelInfo'			=> 'Die Standardanzeige f�r das Bewertungsfeld im unteren Bereich der Seite.',
	'TagsPanel'					=> 'Schlagwortliste (Tags)',
	'TagsPanelInfo'				=> 'Die Standardanzeige f�r Schlagworte im unteren Bereich der Seite.',
	// Vergleiche: WackoWiki Administration: Inhalt > Kategorien (Tags etwa nicht hierarchisches Stichwortverzeichnis ; Kategorien etwa hierarchisches Inhaltsverzeichnis )
	'HideRevisions'				=> 'Seitenversionen ausblenden',
	'HideRevisionsInfo'			=> 'Die Standardanzeige der Seitenversionen.',
	'TocPanel'					=> 'Inhaltsverzeichnis',
	'TocPanelInfo'				=> 'Die Standardanzeige f�r das Inhaltsverzeichnis-Fenster der Seite (setzt die Unterst�tzung durch das Layout vorraus).',
	'SectionsPanel'				=> 'Bereichsanzeige (Seitenbaum)',
	'SectionsPanelInfo'			=> 'Das Fenster zeigt standardm��ig benachbarte Seiten im Namensraum an (setzt die Unterst�tzung durch das Layout voraus).',
	// Tree action {{tree}} wird im default theme nicht am Seitenende angezeigt.

	'DisplayingSections'		=> 'Angezeigte Bereiche',
	'DisplayingSectionsInfo'	=> 'Wenn die vorherige Option aktiviert ist, werden nur untergeordnete Seiten (<em> untere </ em>), nur benachbarte (<em> obere </ em>) oder beide (<em> Baum </ em>) ausgegeben.',
	'MenuItems'					=> 'Men�punkte',
	'MenuItemsInfo'				=> 'Standardanzahl der angezeigten Men�elemente (setzt die Unterst�tzung durch das Layout vorraus).',

	'FeedsSection'				=> 'Feeds',
	'EnableFeeds'				=> 'Aktiviere Feeds',
	'EnableFeedsInfo'			=> 'Aktiviert oder deaktiviert RSS-Feeds f�r das gesamte Wiki.',
	'XmlSitemap'				=> 'XML Sitemap',
	'XmlSitemapInfo'			=> 'Erstellt eine XML-Datei namens "sitemap-wackowiki.xml". Die XML-Datei ist mit dem XML-Sitemaps Format kompatibel und muss im Hauptverzeichnis der Installation gespeichert werden.',
	'XmlSitemapTime'			=> 'XML Sitemap Erstellungszeit',
	'XmlSitemapTimeInfo'		=> 'Erzeugt die Sitemap nur einmal in der angegebenen Anzahl von Tagen, Null bedeutet bei jeder Seiten�nderung.',

	'DiffModeSection'			=> 'Diff-Modi',
	'DefaultDiffModeSetting'	=> 'Standard Diff-Modus',
	'DefaultDiffModeSettingInfo'=> 'Vorausgew�hlter Diff-Modus.',
	'AllowedDiffMode'			=> 'Zugelassene Diff-Modi',
	'AllowedDiffModeInfo'		=> 'Es wird empfohlen, nur die Modi auszuw�hlen, welche man verwenden m�chte. Andernfalls werden alle Diff-Modi ausgew�hlt.',

	'EditSummary'				=> '�nderungszusammenfassung aktivieren',
	'EditSummaryInfo'			=> 'Zeigt Kommentarfeld f�r die Zusammenfassung von �nderungen im Bearbeitungsmodus.',
	'MinorEdit'					=> 'Kleine �nderung',
	'MinorEditInfo'				=> 'Aktiviert die Option "Kleine �nderung" im Bearbeitungsmodus.',
	'ReviewSettings'			=> '�nderungen �berpr�fen',
	'ReviewSettingsInfo'		=> 'Aktiviert die Option �nderungen durch einen "Reviewer" zu pr�fen. In der Gruppenverwaltung muss mindestens ein "Reviewer" zugeordnet sein (WackoWiki Administration: Nutzer > Gruppen > Reviewer > hinzuf�gen).',

	'PublishAnonymously'		=> 'Anonyme Ver�ffentlichung zulassen',
	'PublishAnonymouslyInfo'	=> 'Erlaubt den Benutzern, vorzugsweise anonym zu ver�ffentlichen (um den Namen zu verbergen).',
	'DefaultRenameRedirect'		=> 'Bei Umbenennung einer Seite eine Umleitung setzen',
	'DefaultRenameRedirectInfo'	=> 'Standardm��ig erfolgt eine Umleitung an die alte Adresse der umbenannten Seite.',

	'StoreDeletedPages'			=> 'Gel�schte Seiten behalten',
	'StoreDeletedPagesInfo'		=> 'Wenn eine Seite, einen Kommentar oder eine Datei gel�scht wird, steht diese noch in einen gesonderten Bereich f�r eine bestimmte Zeit (siehe n�chster Punkt) zur die Wiederherstellung und Anzeige zur Verf�gung.',
	'KeepDeletedTime'			=> 'Aufbewahrungszeit f�r gel�schten Seiten',
	'KeepDeletedTimeInfo'		=> 'Der Zeitraum in Tagen. Dies macht nur mit der vorherigen Option Sinn. Null bedeutet unbegrenzte Aufbewahrungszeit (in diesem Fall kann der Administrator diese manuell im Verwaltungs-Panel l�schen).',
	'PagesPurgeTime'			=> 'Aufbewahrungszeit der Seiten-Revisionen',
	'PagesPurgeTimeInfo'		=> 'L�scht automatisch die �lteren Versionen innerhalb der angegebenen Anzahl von Tagen. Wenn Sie Null eingeben, werden die �lteren Versionen nicht entfernt.',
	'EnableReferrers'			=> 'Erlaube Referrer',
	'EnableReferrersInfo'		=> 'Erm�glicht das Speichern und Anzeigen externer Verweise.',
	'ReferrersPurgeTime'		=> 'Aufbewahrungszeit der Verweise',
	'ReferrersPurgeTimeInfo'	=> 'Verlauf der Aufrufe externer Seiten nicht l�nger als diese Anzahl von Tagen aufbewahren. Null bedeutet unbegrenzte Aufbewahrungszeit, aber die Seite aktiv zu besuchen, k�nnte zu einer hohen Auslastung der Datenbank f�hren.',

	'AttachmentHandler'			=> 'Dateianh�nge aktivieren',
	'AttachmentHandlerInfo'		=> 'Aktivieren von Dateianh�ngen f�r G�ste, registrierte Benutzer oder deaktivieren auf der gesamten Website.',
	'SearchEngineVisibility'	=> 'Suchmaschinen blockieren (Suchmaschinen-Sichtbarkeit)',
	'SearchEngineVisibilityInfo'=> 'Suchmaschinen blockieren, aber normale Besucher erlauben. �berschreibt die Seiteneinstellungen. Hiermit wird erkl�rt, keine Indexierung durch Suchmaschinen zu erlauben.',

	// Appearance settings
	'AppearanceSettingsInfo'	=> 'Die Darstellung der Webseite �ndern',
	'AppearanceSettingsUpdated'	=> 'Aussehen der Webseite wurde aktualisiert.',

	'LogoOff'					=> 'Aus',
	'LogoOnly'					=> 'Logo',
	'LogoAndTitle'				=> 'Logo und Titel',

	'LogoSection'				=> 'Logo',
	'SiteLogo'					=> 'Site Logo',
	'SiteLogoInfo'				=> 'Das Logo wird normalerweise in der oberen linken Ecke der Anwendung angezeigt. Die maximale Gr��e betr�gt 2 MiB. Optimale Abmessungen sind 255 Pixel breit und 55 Pixel hoch.',
	'LogoDimensions'			=> 'Logo Ma�e',
	'LogoDimensionsInfo'		=> 'Breite und H�he des angezeigten Logos.',
	'LogoDisplayMode'			=> 'Logo-Anzeigemodus',
	'LogoDisplayModeInfo'		=> 'Bestimmt wie und ob das Logo angezeigt wird. Standard ist ausgeschaltet.',
	'FaviconSection'			=> 'Favicon',
	'SiteFavicon'				=> 'Site Favicon',
	'SiteFaviconInfo'			=> 'Das Verkn�pfungssymbol oder Favicon wird in der Adressleiste, den Registerkarten und den Lesezeichen der meisten Browser angezeigt. Dies �berschreibt das Favicon deines Themas.',
	'LayoutSection'				=> 'Layout',
	'Theme'						=> 'Layout',
	'ThemeInfo'					=> 'Layout, welches die Site standardm��ig verwendet.',
	'ThemesAllowed'				=> 'Zul�ssige Layouts',
	'ThemesAllowedInfo'			=> 'W�hle die zul�ssigen Layouts aus, die der Benutzer verwenden kann, andernfalls sind alle verf�gbaren Layouts zul�ssig.',
	'ThemesPerPage'				=> 'Layouts pro Seite',
	'ThemesPerPageInfo'			=> 'Erlaube Layouts pro Seite, welche der Seitenbesitzer �ber Seiteneigenschaften ausw�hlen kann.',

	// System settings
	'SystemSettingsInfo'		=> 'Systemeinstellungen der Webseite. Ver�ndere hier nichts, au�er wenn Du sicher �ber die Folgen bist.',
	'SystemSettingsUpdated'		=> 'Systemeinstellungen  aktualisiert',
	'DebugModeSection'			=> 'Debug-Modus',
	'DebugMode'					=> 'Debug-Modus',
	'DebugModeInfo'				=> 'An- und Abschaltung zur Ausgabe von Telemetriedaten �ber die Programmlaufzeit. Achtung: Der Modus f�r alle Details stellt h�here Anforderungen an den zugewiesenen Speicher, insbesondere bei ressourcenintensiven Vorg�ngen wie dem Sichern und Wiederherstellen der Datenbank.',
	'DebugModes'	=> [
		'0'		=> 'Debug-Modus ist deaktiviert',
		'1'		=> 'nur die Gesamtausf�hrungszeit',
		'2'		=> 'alle Zeiten',
		'3'		=> 'alle Details (DBMS, Cache, usw.)',
	],
	'DebugSqlThreshold'			=> 'RDBMS Schwellenleistung',
	'DebugSqlThresholdInfo'		=> 'Im ausf�hrlichen Debug-Modus werden nur die Abfragen aufgezeichnet, welche l�nger ben�tigen als die Anzahl der hier ausgewiesen Sekunden.',
	'DebugAdminOnly'			=> 'Geschlossene Diagnose',
	'DebugAdminOnlyInfo'		=> 'Zeigt die Debug-Daten des Programms (und des DBMS) nur dem Administrator.',

	'CachingSection'			=> 'Zwischenspeicher-Optionen',
	'Cache'						=> 'Gerenderte Seiten zwischenspeichern',
	'CacheInfo'					=> 'Gerenderte Seiten zwischenspeichern, um nachfolgende Seitenaufrufe zu beschleunigen. Nur g�ltig f�r nicht angemeldete Nutzer.',
	'CacheTtl'					=> 'Aufbewahrungsdauer zwischenspeicherter Seiten',
	'CacheTtlInfo'				=> 'Speichere Seiten nicht l�nger als die angegebene Anzahl von Sekunden zwischen.',
	'CacheSql'					=> 'SQL-Abfragen zwischenspeichern',
	'CacheSqlInfo'				=> 'Einen lokalen Zwischenspeicher mit Ergebnissen aus bestimmten Datenbankabfragen (resource-SQL-queries) behalten.',
	'CacheSqlTtl'				=> 'Aufbewahrungsdauer zwischengespeicherter SQL-Abfragen',
	// �bersetzung fehlt
	'CacheSqlTtlInfo'			=> 'Speichere Ergebnisse der SQL-Abfragen nicht l�nger als die angegebene Anzahl von Sekunden zwischen. Einen Wert >1200 zu verwenden ist ung�nstig.',
	'ReverseProxySection'		=> 'Reverse-Proxy',
	'ReverseProxy'				=> 'Nutze Reverse-Proxy',
	'ReverseProxyInfo'			=> 'Aktivieren Sie diese Einstellung, um die korrekte IP-Adresse des Remote-
									 Clients zu ermitteln, indem Sie die in den X-Forwarded-For-Headern
									 gespeicherten Informationen untersuchen. X-Forwarded-For-Header sind ein
									 Standardmechanismus zum Identifizieren von Client-Systemen, die �ber einen
									 Reverse-Proxy-Server wie Squid oder Pound verbunden sind. Reverse-Proxy-Server
									 werden h�ufig verwendet, um die Leistung stark frequentierter Websites zu
									 verbessern, und bieten m�glicherweise auch andere Vorteile f�r lokale
									 Zwischenspeicherung (Cache), Sicherheit oder Verschl�sselung.
									 Wenn diese WackoWiki-Installation hinter einem Reverse-Proxy ausgef�hrt wird,
									 sollte diese Einstellung aktiviert sein, damit die korrekten
									 IP-Adressinformationen in WackoWiki\'s Sitzungsmanagement-, Protokollierungs-,
									 Statistik- und Zugriffsverwaltungssystemen erfasst werden.
									 Wenn Sie sich bei dieser Einstellung nicht sicher sind, keinen Reverse-Proxy
									 haben oder WackoWiki in einer Shared-Hosting-Umgebung betreiben,
									 sollte diese Einstellung deaktiviert bleiben.',
	'ReverseProxyHeader'		=> 'Reverse-Proxy-Header',
	'ReverseProxyHeaderInfo'	=> 'Setzen Sie diesen Wert nur, wenn Ihr Proxy-Server die Client-IP
									 nicht mit X-Forwarded-For-Header sendet. Der Header "X-Forwarded-For"
									 ist eine durch Komma + Leerzeichen getrennte Liste von IP-Adressen,
									 wobei nur der letzte (der linke) verwendet.',
	'ReverseProxyAddresses'		=> 'Reverse-Proxy IP-Adressliste',
	'ReverseProxyAddressesInfo'	=> 'Jedes Element dieser Liste ist eine IP-Adresse eines zu verwendenden
									 Reverse-Proxy. WackoWiki wird diesen, im X-Forwarded-For Header zu speichernden,
									 Informationen nur vertrauen, wenn die Anfrage den Webserver �ber die
									 entfernte IP-Adresse eines gelisteten Reverse-Proxies erreicht. Ansonsten k�nnte
									 der Client sich direkt mit Deinem Webserver verbinden und den X-Forwarded-For Header t�uschen.',
	'RewriteMode'				=> 'Verwende <code>mod_rewrite</code>',
	'RewriteModeInfo'			=> 'Wenn der Webserver diese Funktion unterst�tzt, aktivieren sie, um "sch�ne" Seitenadressen zu erhalten.<br>
									<span class="cite">Der Wert wird m�glicherweise zur Laufzeit von der Settings-Klasse �berschrieben, obwohl er deaktiviert ist, wenn HTTP_MOD_REWRITE aktiviert ist.',

	// Permissions settings
	'PermissionsSettingsInfo'		=> 'Einstellungen f�r Zugriffsteuerung und Berechtigungen.',
	'PermissionsSettingsUpdated'	=> 'Berechtigungen aktualisiert',
	'PermissionsSection'		=> 'Rechte und Privilegien',
	'ReadRights'				=> 'Standard Lese-Rechte',
	'ReadRightsInfo'			=> 'Wird verwendet f�r neu erstellte Themenbereiche und Seiten ohne (von Namensr�umen/Oberverzeichnissen geerbte) verf�gbare Rechte.',
	'WriteRights'				=> 'Standard Schreib-Rechte',
	'WriteRightsInfo'			=> 'Wird verwendet f�r neu erstellte Themenbereiche und Seiten ohne (von Namensr�umen/Oberverzeichnissen geerbte) verf�gbare Rechte.',
	'CommentRights'				=> 'Standard Kommentar-Rechte',
	'CommentRightsInfo'			=> 'Wird verwendet f�r neu erstellte Themenbereiche und Seiten ohne (von Namensr�umen/Oberverzeichnissen geerbte) verf�gbare Rechte.',
	'CreateRights'				=> 'Standard-Unterseitenerstellungsrechte',
	'CreateRightsInfo'			=> 'Definiert die Rechte f�r neu erstellte Themenbereiche und Seiten ohne (von Namensr�umen/Oberverzeichnissen geerbte) verf�gbare Rechte.',
	'UploadRights'				=> 'Standard Hochlade-Rechte',
	'UploadRightsInfo'			=> 'Wird verwendet f�r neu erstellte Themenbereiche und Seiten ohne (von Namensr�umen/Oberverzeichnissen geerbte) verf�gbare Rechte.',
	'RenameRights'				=> 'Globale Berechtigung Seiten umzubenennen',
	'RenameRightsInfo'			=> 'Liste von Benutzern mit Berechtigung, Seiten umzubenennen (zu verschieben).',
	'LockAcl'					=> 'Beschr�nke alle Berechtigungen auf Nur Lesen',
	'LockAclInfo'				=> '<span class="cite">�berschreibt die Berechtigungen f�r alle Seiten zu Nur Lesen.</span><br>Dies k�nnte n�tzlich sein, wenn ein Projekt beendet wurde oder aus Sicherheitsgr�nden die Bearbeitung von Seiten zeitweise ausgesetzt werden muss oder als Notfallma�nahme.',
	'HideLocked'				=> 'Nicht zug�ngliche Seiten ausblenden',
	'HideLockedInfo'			=> 'Wenn der Benutzer nicht berechtigt ist, eine Seite zu lesen, blenden sie in verschiedenen Seitenlisten aus (der im Text platzierte Link ist jedoch weiterhin sichtbar).',
	'RemoveOnlyAdmins'			=> 'Nur Administratoren k�nnen Seiten l�schen',
	'RemoveOnlyAdminsInfo'		=> 'Verweigert allen Benutzern, au�er Administratoren, Seiten zu l�schen. Wird zuerst auf Besitzer normaler Seiten angewendet.',
	'OwnersRemoveComments'		=> 'Seitenbesitzer k�nnen Kommentare l�schen',
	'OwnersRemoveCommentsInfo'	=> 'Erm�glicht es Seitenbesitzern, Kommentare auf ihren Seiten zu moderieren.',
	'OwnersEditCategories'		=> 'Besitzer k�nnen Seitenkategorien bearbeiten',
	'OwnersEditCategoriesInfo'	=> 'Erlaubt es den Seitenbesitzern die Kageorien-Liste, welche den Seiten zugewiesen ist, zu �ndern (W�rter hinzuf�gen, umbenennen oder l�schen)',
	'TermHumanModeration'		=> 'Zeit zur Moderation',
	'TermHumanModerationInfo'	=> 'Moderatoren k�nnen nur Kommentare bearbeiten, wenn sie mindestens vor dieser Anzahl von Tagen dazu freigeschaltet wurden (diese Einschr�nkung gilt nicht f�r den letzten Kommentar zum Thema)',

	// Security settings
	'SecuritySettingsInfo'		=> 'Gesamte Sicherheitseinstellungen f�r die Platform, Benutzersicherheit und Sicherheitsteilsysteme.',
	'SecuritySettingsUpdated'	=> 'Sicherheitseinstellungen aktualisiert',

	'AllowRegistration'			=> 'Online registrieren',
	'AllowRegistrationInfo'		=> '�ffnen der Benutzerregistrierung. Das Deaktivieren der Option verhindert die freie Registrierung. Der Site-Administrator kann jedoch andere Benutzer registrieren.',
	'ApproveNewUser'			=> 'Neue Nutzer best�tigen',
	'ApproveNewUserInfo'		=> 'Erm�glicht Administratoren, Benutzer nach der Registrierung zuzulassen. Nur zugelassene Benutzer d�rfen sich auf der Site anmelden.',
	'PersistentCookies'			=> 'Dauerhafte Cookies',
	'PersistentCookiesInfo'		=> 'Erlaube dauerhafte Cookies.',
	// Namenskonventionen f�r Benutzernamen
	'AntiDupe'					=> 'Anti-clone',
	'AntiDupeInfo'				=> 'Verweigern der Registrierung von Namen, die <span class = "underline">�hnlich</span> zu vorhanden Benutzernamen sind (G�ste k�nnen diese Namen auch nicht zum Unterschreiben von Kommentaren verwenden). Wenn die Option deaktiviert ist, nur bei <span class = "underline">identischen</span> Namen.',
	'DisableWikiName'			=> 'Deaktiviere WikiName',
	'DisableWikiNameInfo'		=> 'Deaktiviere die die obligatorische Verwendung von WikiNamen. Erm�glicht die Registrierung von Benutzern mit traditionellen Spitznamen, NameVorname ist nicht zwingend.',
	'AllowEmailReuse'			=> 'Erlaubt die Wiederverwendung von E-Mail-Adressen',
	'AllowEmailReuseInfo'		=> 'Verschiedene Benutzer k�nnen sich mit derselben E-Mail-Adresse registrieren.',
	'UsernameLength'			=> 'L�nge von Benutzernamen',
	'UsernameLengthInfo'		=> 'Mindestens erforderliche und maximal zul�ssige Zeichenanzahl in Benutzernamen.',

	'CaptchaSection'			=> 'CAPTCHA',
	'EnableCaptcha'				=> 'Aktiviere Captcha',
	'EnableCaptchaInfo'			=> 'Aktiviert eine Sicherheitsabfrage zum Schutz vor SPAM auf der gesamten Website.',
	'CaptchaComment'			=> 'Neuer Kommentar',
	'CaptchaCommentInfo'		=> 'Wenn aktiviert, wird f�r nicht registrierte Benutzer eine Sicherheitsabfrage (Captcha) vor der Ver�ffentlichung von Kommentaren erforderlich.',
	'CaptchaPage'				=> 'Neue Seite',
	'CaptchaPageInfo'			=> 'Wenn aktiviert, wird f�r nicht registrierte Benutzer eine Sicherheitsabfrage (Captcha) vor der Erstellung von neuen Seiten erforderlich.',
	'CaptchaEdit'				=> 'Seite bearbeiten',
	'CaptchaEditInfo'			=> 'Wenn aktiviert, wird f�r nicht registrierte Benutzer eine Sicherheitsabfrage (Captcha) vor der Bearbeitung von Seiten erforderlich.',
	'CaptchaRegistration'		=> 'Registrierung',
	'CaptchaRegistrationInfo'	=> 'Wenn aktiviert, wird f�r nicht registrierte Benutzer eine Sicherheitsabfrage (Captcha) vor der Registrierung  erforderlich.',

	'TlsSection'				=> 'TLS-Einstellungen',
	'TlsConnection'				=> 'TLS-Verwendung',
	'TlsConnectionInfo'			=> 'Verwende eine TLS-gesicherte Verbindung. <span class = "cite"> Dazu ist es erforderlich, ein TLS-Zertifikat auf dem Server zu installieren, sonst besteht kein Zugriff auf den Admin-Bereich! </ span>',
	'TlsImplicit'				=> 'TLS erzwingen',
	'TlsImplicitInfo'			=> 'Erzwingt erneute Verbindung des Clients von HTTP zu HTTPS.  Wenn die Option aktiviert ist, �bertr�gt der Client die Webseite �ber einen verschl�sselten HTTPS-Kanal.',
	'TlsProxy'					=> 'TLS-Proxy',
	'TlsProxyInfo'				=> 'Verwendet diesen TLS-Proxy anstelle von TLS. z.B. https://<span class="cite">dein-https-proxy.tld</span> ohne Schr�gstrich am Ende und ohne https://.',
	'HttpSecurityHeaders'		=> 'HTTP-Security-Header',
	'EnableSecurityHeaders'		=> 'Security-Header aktivieren',
	'EnableSecurityHeadersinfo'	=> 'Aktiviert Security-Header (frame busting, clickjacking/XSS/CSRF-Schutz). <br> Diese Content Security Policy (CSP) kann in bestimmten Situationen (z. B. w�hrend der Entwicklung) oder bei Verwendung von Plugins, die auf extern gehostete Ressourcen wie Bilder oder Skripts angewiesen sind, Probleme verursachen. <br> Das Deaktivieren der CSP ist ein Sicherheitsrisiko!',
	'Csp'						=> 'Content-Security-Policy (CSP)',
	'CspInfo'					=> 'Zur Etablierung von Sicherheitsrichtlinien gegen schadhafte Inhalte geh�rt zu entscheiden, welche einzelnen Richtlinien geschaffen werden sollen, diese zu gestalten und festzuschreiben.',
	'CspModes'	=> [
		'0'		=> 'deaktiviert',
		'1'		=> 'strikt',
		'2'		=> 'benutzerdefiniert',
	],
	'UserPasswordSection'		=> 'Passwortschutz-Einstellungen',
	'PwdMinChars'				=> 'Minimale Passwortl�nge',
	'PwdMinCharsInfo'			=> 'L�ngere Passw�rter bieten notwendigerweise mehr Schutz als k�rzere Passw�rter (z.B. 12 bis 16 Zeichen).<br>Anstelle eines einzelnen Passwortes wird die Verwendung einer Passphrase empfohlen.',

	'AdminPwdMinChars'			=> 'Minimale Admin Passwortl�nge',
	'AdminPwdMinCharsInfo'		=> 'L�ngere Passw�rter bieten notwendigerweise mehr Schutz als k�rzere Passw�rter (z.B. 15 bis 20 Zeichen).<br>Anstelle eines einzelnen Passwortes wird die Verwendung einer Passphrase empfohlen.',
	'PwdCharComplexity'			=> 'Die erforderliche Kennwortkomplexit�t',
	'PwdCharClasses'	=> [
		'0'		=> 'ungepr�ft',
		'1'		=> 'alle Buchstaben + Zahlen',
		'2'		=> 'Gro�- und Kleinschreibung + Zahlen',
		'3'		=> 'Gro�- und Kleinschreibung + Zahlen + Zeichen',
	],
	'PwdUnlikeLogin'			=> 'zus�tzliche Erschwernis',
	'PwdUnlikes'	=> [
		'0'		=> 'ungepr�ft',
		'1'		=> 'Passwort darf nicht identisch mit dem Anmeldenamen sein',
		'2'		=> 'Passwort darf nicht den Anmeldenamen enthalten',
	],

	'LoginSection'				=> 'Anmeldung',
	'MaxLoginAttempts'			=> 'Maximale Anzahl von Anmeldeversuchen pro Nutzername',
	'MaxLoginAttemptsInfo'		=> 'Anzahl der zul�ssigen Login-Versuche je Benutzerkonto bevor der SPAM-Schutz ausgel�st wird. Wenn 0 eingetragen: kein SPAM-Schutz f�r die Anmeldung je Benutzer.',
	'IpLoginLimitMax'			=> 'Maximale Anzahl von Anmeldeversuchen pro IP-Adresse',
	'IpLoginLimitMaxInfo'		=> 'Anzahl der zul�ssigen Login-Versuche von einer einzelnen IP-Adresse aus, bevor der SPAM-Schutz ausgel�st wird. Wenn 0 eingetragen: kein SPAM-Schutz f�r die Anmeldung je IP-Adresse.',

	'LogSection'				=> 'Protokolleinstellungen',
	'LogLevel'					=> 'Protokollierung verwenden',
	'LogLevelInfo'				=> 'Die Mindestpriorit�t f�r Ereignisse, die im Protokoll aufgezeichnet werden.',
	'LogThresholds'	=> [
		'0'		=> 'keine Protokollierung',
		'1'		=> 'nur kritische Stufe',
		'2'		=> 'h�chste Stufe',
		'3'		=> 'hoch',
		'4'		=> 'mittel',
		'5'		=> 'niedrig',
		'6'		=> 'niedrigste Stufe',
		'7'		=> 'alles aufzeichnen',
	],
	'LogDefaultShow'			=> 'Angezeigter Log-Modus',
	'LogDefaultShowInfo'		=> 'Die Mindestpriorit�t f�r Ereignisse die standardm��ig im Log angezeigt werden .',
	'LogModes'	=> [
		'1'		=> 'nur kritische Stufe',
		'2'		=> 'h�chste Stufe',
		'3'		=> 'hohes Stufe',
		'4'		=> 'mittel',
		'5'		=> 'niedrig',
		'6'		=> 'niedrigste Stufe',
		'7'		=> 'zeige alle',
	],
	'LogPurgeTime'				=> 'Aufbewahrungszeit f�r das Ereignisprotokoll',
	'LogPurgeTimeInfo'			=> 'Entfernt das Ereignisprotokoll nach der angegebenen Anzahl von Tagen.',

	'FormsSection'				=> 'Formulare',
	'FormTokenTime'				=> 'Maximale Zeit f�r die �bermittlung von Formularen',
	'FormTokenTimeInfo'			=> 'Die Zeit, die ein Benutzer f�r das Senden eines Formulares hat (in Sekunden).<br> Verwende -1 zum Deaktivieren. Beachte: Ein Formular wird unabh�ngig von dieser Einstellung ung�ltig, wenn die Sitzung (Session) abl�uft.',

	'SessionLength'				=> 'Aufbewahrungsdauer Login-Cookie',
	'SessionLengthInfo'			=> 'Die standardm��ige Lebensdauer des Login-Cookie von Benutzern (in Tagen).',
	'CommentDelay'				=> 'Anti-flood f�r Kommentare',
	'CommentDelayInfo'			=> 'Mindestwartezeit zwischen der Ver�ffentlichung von neuen Benutzerkommentaren (in Sekunden).',
	'IntercomDelay'				=> 'Anti-flood f�r pers�nliche Mitteilungen',
	'IntercomDelayInfo'			=> 'Mindestwartezeit zwischen dem Senden einer pers�nlicher Nachricht (in Sekunden).',

	//Formatter settings
	'FormatterSettingsInfo'		=> 'Group of parameters responsible for the fine tuning platform. Do not change them unless you are confident in their actions.',
	//
	'FormatterSettingsUpdated'	=> 'Formatierungseinstellungen aktualisiert',

	'TextHandlerSection'		=> 'Text Handler ',
	//
	'Typografica'				=> 'Typografischer Korrektor',
	'TypograficaInfo'			=> 'Durch das Deaktivieren wird der Vorgang des Hinzuf�gens von Kommentaren und des Speicherns von Seiten geringf�gig beschleunigt.',
	'Paragrafica'				=> 'Paragrafica Markierungen',
	//
	'ParagraficaInfo'			=> '�hnlich wie bei der vorherigen Option, jedoch wird die Deaktivierung zu einer Fehlfunktion des automatischen Inhaltsverzeichnisses f�hren: <code>{{toc}}</code>.',
	'AllowRawhtml'				=> 'Globale HTML-Unterst�tzung',
	'AllowRawhtmlInfo'			=> 'Die Verwendung dieser Option f�r eine offene Site ist m�glicherweise unsicher.',
	'SafeHtml'					=> 'HTML filtern',
	'SafeHtmlInfo'				=> 'Verhindert das Speichern gef�hrlicher HTML-Objekte. Das Deaktivieren des Filters auf einer offnen Website mit HTML-Unterst�tzung ist <span class="underline">extrem</span> unerw�nscht!',

	'WackoFormatterSection'		=> 'Wiki Text Formatierer (Wacko Formatierer)',
	'X11colors'					=> 'X11 Farben Verwendung',
	'X11colorsInfo'				=> 'Erweitert die verf�gbaren Farben f�r <code>??(Farbe) Hintergrund??</code> und <code>!!(Farbe) Text!!</code>. Durch das Deaktivieren wird der Vorgang des Hinzuf�gens von Kommentaren und des Speicherns von Seiten geringf�gig beschleunigt.',
	'TikiLinks'					=> 'Deaktiviere Tikilinks',
	'TikiLinksInfo'				=> 'Deaktiviert die Verlinkung von <code>Double.CamelCaseWords</code>.',
	'WikiLinks'					=> 'Deaktiviere Wikilinks',
	'WikiLinksInfo'				=> 'Deaktiviert die Verlinkung von <code>CamelCaseWords</code>, deine CamelCase W�rter werden nicht mehr direkt auf eine neue Seite verlink. Dies ist n�tzlich, wenn man �ber verschiedene Namensr�ume, also Cluster, hinweg arbeitet. Standardm��ig ist es ausgeschaltet.',
	'BracketsLinks'				=> 'Deaktiviere Bracketslinks',
	'BracketsLinksInfo'			=> 'Deaktiviert <code>[[link]]</code> und <code>((link))</code> Syntax.',
	'Formatters'				=> 'Deaktiviere Formatierer',
	'FormattersInfo'			=> 'Deaktiviert <code>%%code%%</code> Syntax, verwendet f�r Textauszeichner.',

	'DateFormatsSection'		=> 'Datumsformate',
	'DateFormat'				=> 'Das Format des Datums',
	'DateFormatInfo'			=> '(Tag, Monat, Jahr)',
	'TimeFormat'				=> 'Das Format der Zeit',
	'TimeFormatInfo'			=> '(Stunde, Minute)',
	'TimeFormatSeconds'			=> 'Das Format der genauen Zeit',
	'TimeFormatSecondsInfo'		=> '(Stunden, Minuten, Sekunden)',
	'NameDateMacro'				=> 'Das Format des <code>::@::</code> Makros',
	'NameDateMacroInfo'			=> '(Name, Zeit), e.g. <code>UserName (17.11.2016 16:48)</code>',
	'Timezone'					=> 'Zeitzone',
	'TimezoneInfo'				=> 'Zeitzone f�r die Anzeige von Zeiten f�r Benutzer, die nicht angemeldet sind (G�ste). Angemeldete Benutzer k�nnen ihre Zeitzone in ihren Benutzereinstellungen einstellen und �ndern.',
	'EnableDst'					=> 'Sommerzeit aktivieren',
	'EnableDstInfo'				=> '',

	'LinkTarget'				=> 'Wo externe Links ge�ffnet werden',
	'LinkTargetInfo'			=> '�ffnet jeden externen Link in einem neuen Browserfenster. F�gt <code>target="_blank"</code> zum Link-Syntax hinzu.',
	'Noreferrer'				=> 'noreferrer',
	'NoreferrerInfo'			=> 'Setzt voraus, dass der Browser, wenn der Benutzer den Hyperlink folgt keine Referrer-Header sendet. F�gt <code>rel="noreferrer"</code> zum Link-Syntax hinzu.',
	'Nofollow'					=> 'nofollow',
	'NofollowInfo'				=> 'Weist Suchmaschinen an, da� die Hyperlinks sich nicht auf das Seiten-Ranking der Zielseite im Suchmaschinenindex auswirken sollen. F�gt <code>rel="nofollow"</code> zum Link-Syntax hinzu.',
	'UrlsUnderscores'			=> 'Bildet Adressen (URLs) mit Unterstrichen',
	'UrlsUnderscoresInfo'		=> 'Beispielsweise <code>http://[..]/WackoWiki</code> wird zu <code>http://[..]/Wacko_Wiki</code> mit dieser Option.',
	'ShowSpaces'				=> 'Zeigt Leerzeichen in WikiNamen',
	'ShowSpacesInfo'			=> 'Zeigt Leerzeichen in WikiNamen, e.g. <code>MyName</code> wird angezeigt als <code>My Name</code> mit dieser Option.',
	'NumerateLinks'				=> 'Nummeriert die Links in der Druckansicht',
	'NumerateLinksInfo'			=> 'Nummeriert und listet alle Links am Fu� der Seite in der Druckansicht mit dieser Option.',
	'YouareHereText'			=> 'Deaktiviert und visualisiert selbstreferenzierende Links',
	'YouareHereTextInfo'		=> 'Visualisiert Links zur selben Seite, bspw. <code>&lt;b&gt;####&lt;/b&gt;</code>, alle Links auf sich selbst werden nicht als Link, sondern als fetter Text dargestellt.',
	//

	// Pages settings
	'PagesSettingsInfo'			=> '',
	'PagesSettingsUpdated'		=> 'Einstellungen der Basisseiten aktualisiert',
	//

	'ListCount'					=> 'Anzahl der Datens�tze pro Liste',
	'ListCountInfo'				=> 'Anzahl der Zeilen, die in jeder Liste f�r G�ste angezeigt werden, oder als Standardwert f�r neue Benutzer.',
	//

	'ForumSection'				=> 'Options Forum',
	//
	'ForumCluster'				=> 'Cluster Forum',
	'ForumClusterInfo'			=> 'Adresse der Hauptseite des Forums.',
	'ForumTopics'				=> 'Anzahl der Themen pro Seite',
	'ForumTopicsInfo'			=> 'Anzahl der Themen, die auf jeder Seite der Liste in den Forumsabschnitten angezeigt werden.',
	'CommentsCount'				=> 'Anzahl der Kommentare pro Seite',
	'CommentsCountInfo'			=> 'Die Anzahl der Kommentare, welche auf jeder Seite der in der Kommentarliste angezeigt werden. Dies gilt f�r alle Kommentare auf der Website und nicht nur f�r die im Forum.',

	'NewsSection'				=> 'Nachrichten',
	'NewsCluster'				=> 'Nachrichten Cluster',
	'NewsClusterInfo'			=> 'Root-Cluster f�r den Nachrichtenbereich.',
	'NewsLevels'				=> 'Tiefe der Nachrichtenseiten aus dem Root-Cluster',
	'NewsLevelsInfo'			=> 'Regular expression (SQL regexp-slang), specifying the number of intermediate levels of the news root cluster directly to the names of pages of news reports. (e.g. <code>[cluster]/[year]/[month]</code> -> <code>/.+/.+/.+</code>)',

	'LicenseSection'			=> 'Lizenz',
	'DefaultLicense'			=> 'Standard-Lizenz',
	'DefaultLicenseInfo'		=> 'Unter welcher Lizenz sollen deine Inhalte ver�ffentlicht werden?',

	'ServicePagesSection'		=> 'Standardseiten',
	//
	'RootPage'					=> 'Startseite',
	'RootPageInfo'				=> 'Der Tag der Hauptseite, welcher automatisch aufgerufen wird, wenn ein Nutzer die Website besucht.',

	'PolicyPage'				=> 'Nutzungsbedingungen',
	'PolicyPageinfo'			=> 'Die Seite mit den Regeln der Website.',

	'SearchPage'				=> 'Suche',
	'SearchPageInfo'			=> 'Seite mit dem Suchformular (Aktion <code>{{search}}</code>).',
	'RegistrationPage'			=> 'Register on our site',
	'RegistrationPageInfo'		=> 'Seite f�r neue Benutzerregistrierung (Aktion <code>{{registration}}</code>).',
	'LoginPage'					=> 'Benutzer-Anmeldung',
	'LoginPageInfo'				=> 'Seite zur Anmeldung (Aktion <code>{{login}}</code>).',
	//
	'SettingsPage'				=> 'Benutzereinstellungen',
	'SettingsPageInfo'			=> 'Seite zum Anpassen des Benutzerprofils (Aktion <code>{{usersettings}}</code>).',
	'PasswordPage'				=> 'Passwort �ndern',
	'PasswordPageInfo'			=> 'Seite mit dem Formular zum �ndern und Zur�cksetzen des Benutzerpasswortes (Aktion <code>{{changepassword}}</code>).',
	'UsersPage'					=> 'Benutzerliste',
	'UsersPageInfo'				=> 'Seite mit einer Liste der registrierten Benutzer (Aktion <code>{{users}}</code>).',
	'CategoryPage'				=> 'Kategorien',
	'CategoryPageInfo'			=> 'Seite mit einer Liste von kategorisierten Seiten (Aktion <code>{{category}}</code>).',
	'TagPage'					=> 'Tag',
	'TagPageInfo'				=> 'Page with a list of tagged pages (Aktion <code>{{tag}}</code>).',
	//
	'GroupsPage'				=> 'Gruppen',
	'GroupsPageInfo'			=> 'Seite mit einer Liste von Arbeitsgruppen (Aktion <code>{{usergroups}}</code>).',
	'ChangesPage'				=> 'Letzte �nderungen',
	'ChangesPageInfo'			=> 'Seite mit einer Liste der zuletzt ge�nderten Seiten (Aktion <code>{{changes}}</code>).',
	'CommentsPage'				=> 'Letzte Kommentare',
	'CommentsPageInfo'			=> 'Seite mit einer Liste der letzten Kommentare auf der Seite (Aktion <code>{{commented}}</code>).',
	'RemovalsPage'				=> 'Gel�schte Seiten',
	'RemovalsPageInfo'			=> 'Seite mit einer Liste der zuletzt gel�schten Seiten (Aktion <code>{{deleted}}</code>).',
	'WantedPage'				=> 'Gew�nschte Seiten',
	'WantedPageInfo'			=> 'Seite mit einer Liste der fehlenden Seiten, auf die verwiesen wird (Aktion <code>{{wanted}}</code>).',
	'OrphanedPage'				=> 'Verwaiste Seiten',
	'OrphanedPageInfo'			=> 'Seite mit einer Liste der vorhandenen Seiten welche von anderen Seiten nicht verlinkt wurden (Aktion <code>{{orphaned}}</code>).',
	'TodoPage'					=> 'Aufgaben',
	'TodoPageInfo'				=> 'Seite mit einer Liste von Aufgaben (erstellt mit Hilfe von <code>{{backlinks}}</code> und  dem Makro <code>::*::</code>).',
	'SandboxPage'				=> 'Sandkasten',
	'SandboxPageInfo'			=> 'Seite, auf der Benutzer die Verwendung des Wiki-Markups �ben k�nnen.',
	'WikiDocsPage'				=> 'Wiki-Dokumentation',
	'WikiDocsPageInfo'			=> 'Section of the documentation for using the tool site.',
	//

	// Notification settings
	'NotificationSettingsInfo'	=> 'Parameter f�r Benachrichtigungen des Systems.',
	'NotificationSettingsUpdated'	=> 'Benachrichtigungseinstellungen aktualisiert',

	'EmailNotification'			=> 'E-Mail-Benachrichtigung',
	'EmailNotificationInfo'		=> 'E-Mail-Benachrichtigung zulassen. W�hle EIN, um E-Mail-Benachrichtigungen zu aktivieren, und AUS, um sie zu deaktivieren. Beachte, dass die Deaktivierung von E-Mail-Benachrichtigungen keine Auswirkungen auf E-Mails hat, die im Rahmen des Benutzeranmeldungsvorgangs generiert wurden.',
	'Autosubscribe'				=> 'Automatisch abonnieren',
	//
	'AutosubscribeInfo'			=> 'Automatically sign a new page in the owner\'s notice of its changes.',
	//

	'NotificationSection'		=> 'Benachrichtigungen',
	'NotifyPageEdit'			=> 'Seiten�nderung mitteilen',
	'NotifyPageEditInfo'		=> 'Ausstehend - Es wird nur f�r die erste �nderung einer beobachteten Seite eine Benachrichtigung gesendet. Die Benachrichtigung wird automatisch wieder aktiviert, wenn die aktuelle Version der Seite aufgerufen wird.',
	//
	'NotifyMinorEdit'			=> 'Kleine �nderung mitteilen',
	'NotifyMinorEditInfo'		=> 'Sende Mitteilungen auch bei kleinen �nderungen.',
	'NotifyNewComment'			=> 'Neuen Kommentar mitteilen',
	'NotifyNewCommentInfo'		=> 'Ausstehend - Es wird nur f�r den ersten Kommentar einer beobachteten Seite eine Benachrichtigung gesendet. Die Benachrichtigung wird automatisch wieder aktiviert, wenn die aktuelle Version der Seite aufgerufen wird.',
	//
	'NotifyUserAccount'			=> 'Neues Benutzerkonto mitteilen',
	'NotifyUserAccountInfo'		=> 'Der Administrator wird benachrichtigt, wenn ein neuer Benutzer �ber das Anmelde-Formular erstellt wurde.',
	//

	// Resync settings
	'Synchronize'				=> 'Synchronisieren',
	'UserStatsSynched'			=> 'Benutzerstatistiken wurden synchronisiert.',
	'PageStatsSynched'			=> 'Seitenstatistiken wurden synchronisiert.',
	'FeedsUpdated'				=> 'RSS-Feeds aktualisiert.',
	'SiteMapCreated'			=> 'Die neue Version der Sitemap wurde erfolgreich erstellt.',
	'WikiLinksRestored'			=> 'Wiki-Links wiederhergestellt.',

	'UserStats'					=> 'Benutzerstatistik',
	'UserStatsInfo'				=> 'Benutzerstatistiken (Anzahl der Kommentare, besessene Seiten, Revisionen und Dateien) k�nnen in einigen Situationen von den tats�chlichen Daten abweichen.<br> Diese Operation erm�glicht das Aktualisieren von Statistiken auf aktuelle tats�chliche Daten der Datenbank.',
	'PageStats'					=> 'Seitenstatistiken',
	'PageStatsInfo'				=> 'Seitenstatistiken (Anzahl der Kommentare, Dateien und Revisionen) k�nnen in einigen Situationen von den tats�chlichen Daten abweichen. <br> Diese Operation erm�glicht das Aktualisieren von Statistiken auf aktuelle tats�chliche Daten der Datenbank.',
	'Feeds'						=> 'Feeds',
	'FeedsInfo'					=> 'Im Falle der direkten Bearbeitung von Seiten in der Datenbank spiegelt der Inhalt der RSS-Feeds m�glicherweise nicht die vorgenommenen �nderungen wider. <br> Diese Funktion synchronisiert die RSS-Kan�le mit dem aktuellen Zustand der Datenbank.',
	'XmlSiteMap'				=> 'XML-Sitemap',
	'XmlSiteMapInfo'			=> 'Diese Funktion synchronisiert die XML-Sitemap mit dem aktuellen Zustand der Datenbank.',
	'WikiLinksResync'			=> 'Wiki-Links',
	'WikiLinksResyncInfo'		=> 'F�hrt ein Re-Rendering f�r alle Intrasite-Links durch und stellt den Inhalt der Tabelle <code> page_link </code> und <code> file_link </code> im Falle einer Besch�digung oder Verlagerung wieder her (dies kann einige Zeit in Anspruch nehmen).',

	// Email settings
	'EmaiSettingsInfo'			=> 'Diese Informationen werden ben�tigt, um E-Mails an die Benutzer zu senden. Stelle bitte sicher, dass die angegebene Adresse g�ltig ist; abgewiesene oder nicht zustellbare Nachrichten werden an diese Adresse geschickt. Falls dein Webhosting-Provider keinen PHP-basierten E-Mail-Dienst anbietet, k�nnen die Nachrichten auch direkt �ber SMTP versendet werden. Dies erfordert die Angabe der Adresse eines geeigneten Servers (frage falls n�tig deinen Provider). Falls der Server eine Authentifizierung erfordert (und nur, wenn dies der Fall ist), gib den Benutzernamen und das Passwort ein und w�hle eine Authentifizierungsmethode aus.',

	'EmailSettingsUpdated'		=> 'E-Mail Einstellungen wurden aktualisiert.',

	'EmailFunctionName'			=> 'Name der E-Mail-Funktion',
	'EmailFunctionNameInfo'		=> 'Die PHP-Funktion, welche genutzt wird, um E-Mails zu versenden.',
	'UseSmtpInfo'				=> 'W�hle <code>SMTP</code> aus, wenn du E-Mails �ber einen SMTP-Server senden m�chtest (oder musst), anstatt die PHP-eigene Mail-Funktion zu nutzen.',

	'EnableEmail'				=> 'Aktiviere E-Mail',
	'EnableEmailInfo'			=> 'Aktiviere E-Mail-Funktionalit�t',

	'FromEmailName'				=> 'Absender',
	'FromEmailNameInfo'			=> 'Absender Name, im Adressfeld <code>Von:</code> der Kopfzeile in E-Mails f�r alle E-Mail-Benachrichtigungen, die von dieser Seite gesendet werden.',
	'NoReplyEmail'				=> 'No-reply Adresse',
	'NoReplyEmailInfo'			=> 'Diese Adresse, z.B. <code>noreply@example.com</code>, erscheint im Adressfeld <code>Von:</code> der Kopfzeile bei allen E-Mail Benachrichtigungen, die von dieser Seite gesendet werden.',
	'AdminEmail'				=> 'E-Mail Adresse des Seiteninhabers',
	'AdminEmailInfo'			=> 'Diese Adresse ist f�r Administrationszwecke, wie Benachrichtigung bei neuen Benutzern.',
	'AbuseEmail'				=> 'Dienst bei E-Mail-Missbrauch',
	'AbuseEmailInfo'			=> 'Adresse f�r dringende Angelegenheiten: Registrierung einer verd�chtigen E-Mail, usw. Kann mit der vorherigen �bereinstimmen.',

	'SendTestEmail'				=> 'Test-Mail senden',
	'SendTestEmailInfo'			=> 'Sendet eine Test-Mail an die in deinem Benutzerkonto hinterlegte Adresse.',
	'TestEmailSubject'			=> 'Dein Wiki ist f�r den E-Mail-Versand richtig konfiguriert',
	'TestEmailBody'				=> 'Wenn du diese Nachricht erh�ltst, ist deine Wiki richtig f�r den E-Mail-Versand konfiguriert.',
	'TestEmailMessage'			=> 'Die Test-Mail wurde gesendet.<br>Falls du sie nicht erhalten solltest, pr�fe bitte deine E-Mail-Konfiguration.',

	'SmtpAutoTls'				=> 'STARTTLS',
	'SmtpAutoTlsInfo'			=> 'Aktiviert Verschl�sselung automatisch, wenn der Server TLS Verschl�sselung anbietet (nach dem Aufbau der Serververbindung), sogar wenn <code>SMTPSecure</code> nicht eingeschaltet wurde.',
	'SmtpConnectionMode'		=> 'Authentifizierungsmethode f�r SMTP',
	'SmtpConnectionModeInfo'	=> 'Nur ben�tigt, wenn ein Benutzername/Passwort eingegeben ist. Frage deinen Webhosting-Provider, falls du nicht sicher bist, welche Methode du w�hlen sollst.',
	'SmtpPassword'				=> 'SMTP-Passwort',
	'SmtpPasswordInfo'			=> 'Gib nur ein Passwort ein, wenn dein SMTP-Server dies erfordert. <em><strong>WARNUNG:</strong> Dieses Passwort wird im Klartext in der Datenbank gespeichert und ist daher f�r jeden einsehbar, der Zugriff auf die Datenbank oder diese Konfigurationsseite hat.</em>',
	'SmtpPort'					=> 'SMTP-Server-Port',
	'SmtpPortInfo'				=> '�ndere diese Einstellung nur, wenn du wei�t, dass dein SMTP-Server einen anderen Port nutzt. <br>(default: <code>tls</code> auf Port 587 (oder m�glicherweise 25) und <code>ssl</code> auf Port 465)',
	'SmtpServer'				=> 'SMTP-Server-Adresse',
	'SmtpServerInfo'			=> 'Beachte, dass du das Protokoll angeben musst, das dein Server verwendet. Wird SSL verwendet, musst du <code>ssl://mail.example.com</code> angeben.',
	'SmtpSettings'				=> 'SMTP-Einstellungen',
	'SmtpUsername'				=> 'SMTP-Benutzername',
	'SmtpUsernameInfo'			=> 'Gib nur einen Benutzernamen ein, wenn dein SMTP-Server dies erfordert.',

	// Upload settings
	'UploadSettingsInfo'		=> 'Hier kannst du die Einstellungen f�r Dateianh�nge und verkn�pfte Spezialkategorien vornehmen.',
	'UploadSettingsUpdated'		=> 'Updated upload settings',

	'RightToUpload'				=> 'Berechtigung Dateien hochzuladen',
	'RightToUploadInfo'			=> '<code>admins</code> bedeutet nur Nutzer welche der Admins-Gruppe angeh�ren, k�nnen Dateien hochladen. <code>1</code> bedeutet jeder registrierte Benutzer kann Dateien hochladen. <code>0</code> das Hochladen von Dateien ist nicht m�glich.',
	'UploadOnlyImages'			=> 'Erlaube nur das Hochladen von Bildern',
	'UploadOnlyImagesInfo'		=> 'Nur Bilder k�nnen hochgeladen werden.',
	'FileUploads'				=> 'Dateien hochladen',
	'UploadMaxFilesize'			=> 'Maximale Dateigr��e',
	'UploadMaxFilesizeInfo'		=> 'Maximale Gr��e pro Datei. Die Dateigr��e wird nur durch die PHP-Konfiguration beschr�nkt, wenn 0 als Wert eingestellt wird.',
	'UploadQuota'				=> 'Maximales Kontingent f�r Dateianh�nge',
	'UploadQuotaInfo'			=> 'Maximaler f�r Dateianh�nge verf�gbarer Speicherplatz f�r das gesamte Wiki; 0 bedeutet unbegrenzt.',
	'UploadQuotaUser'			=> 'Speicherkontingent pro Benutzer',
	'UploadQuotaUserInfo'		=> 'Beschr�nkung des Speicherkontingentes, der von einem Benutzer hochgeladen werden kann, wobei 0 unbegrenzt ist.',
	'CheckMimetype'				=> 'Dateianh�nge pr�fen',
	'CheckMimetypeInfo'			=> 'Manchen Browsern kann ein fehlerhafter MIME-Typ f�r hochgeladene Dateien vorget�uscht werden. Diese Option stellt sicher, dass Dateien, die dieses Verhalten provozieren k�nnten, abgewiesen werden.',

	'Thumbnails'				=> 'Vorschaubilder',
	'CreateThumbnail'			=> 'Vorschaubild erstellen',
	'CreateThumbnailInfo'		=> 'Vorschaubild in allen m�glichen F�llen erstellen.',
	'MaxThumbWidth'				=> 'Maximale Breite der Vorschaubilder in Pixeln',
	'MaxThumbWidthInfo'			=> 'Ein Vorschaubild wird nicht breiter sein als der hier eingestellte Wert.',
	'MinThumbFilesize'			=> 'Minimale Vorschaubild-Dateigr��e',
	'MinThumbFilesizeInfo'		=> 'Erstellt keine Vorschaubilder bei Bildern, die kleiner sind als dieser Wert.',

	// Deleted module
	'DeletedObjectsInfo'		=> 'Liste der entfernten Seiten und Dateien.
									Um die Seiten und Dateien endg�ltig aus der Datenbank zu l�schen oder wiederherzustellen klicke in der entsprechenden Zeile auf <em>Entfernen</em> oder <em>Wiederherstellen</em>.
									(Achtung, es ist keine L�schbest�tigung erforderlich!)',
	//

	// Filter module
	'FilterSettingsInfo'		=> 'W�rter, die automatisch in deinem Wiki zensiert werden.',
	'FilterSettingsUpdated'		=> 'Die Einstellungen f�r den Spamfilter wurden aktualisiert',

	'WordCensoringSection'		=> 'Wort zensieren',
	'SPAMFilter'				=> 'Spamfilter',
	'SPAMFilterInfo'			=> 'Spamfilter aktivieren',
	'WordList'					=> 'Wortliste',
	'WordListInfo'				=> 'Wort oder Phrase <code>fragment</code> welches auf die schwarze Liste gesetzt wird (eins pro Zeile)',

	// DB Convert module
	'Convert'					=> 'Konvertieren',
	'NoColumnsToConvert'		=> 'Keine Spalten zum Konvertieren.',
	'NoTablesToConvert'			=> 'Keine Tabellen zum Konvertieren.',

	'LogDatabaseConverted'		=> 'Datenbank konvertiert',
	'ConversionTablesOk'		=> 'Konvertierung der ausgew�hlten Tabellen erfolgreich.',

	'LogColumsToStrict'			=> 'Spalten konvertiert, um dem strikten SQL-Modus zu entsprechen',
	//
	'ConversionColumnsOk'		=> 'Konvertierung der ausgew�hlten Spalten erfolgreich.',

	'ConvertTablesEngine'		=> 'Konvertiere Tabellen von MyISAM zu InnoDB/XtraDB',
	'ConvertTablesEngineInfo'	=> 'Falls man �ber vorhandene Tabellen verf�gt, die f�r eine bessere Zuverl�ssigkeit und Skalierbarkeit in InnoDB / XtraDB * konvertiert werden sollen, verwende die folgende Routine. Diese Tabellen waren urspr�nglich MyISAM, was fr�her der Standard war.',
	//
	'ConvertTablesEngineHint'	=> '* XtraDB ist eine erweiterte Version der InnoDB-Speicher-Engine, die auf moderner Hardware besser skaliert werden kann, und enth�lt eine Vielzahl anderer Funktionen, die in Hochleistungsumgebungen n�tzlich sind. Sie ist vollst�ndig abw�rtskompatibel und identifiziert sich selbst MariaDB als "<code> ENGINE = InnoDB </ code>" (genau wie InnoDB) und kann daher als ein Drop-In-Ersatz f�r Standard-InnoDB verwendet werden.',
	//

	'DbVersion'					=> 'Erfordert mindestens MySQL 5.6.4, verf�gbare Version',
	'DbEngineOk'				=> 'InnoDB/XtraDB ist verf�gbar.',
	'DbEngineMissing'			=> 'InnoDB / XtraDB ist nicht verf�gbar.',
	'EngineTable'				=> 'Tabelle',
	'EngineDefault'				=> 'Standard',
	'EngineColumn'				=> 'Spalte',
	'EngineTyp'					=> 'Typ',

	'ConvertColumnsToStrict'	=> 'Konvertiere Spalten f�r den SQL-Strikt-Modus',
	'ConvertTablesStrictInfo'	=> 'Wenn man �ber vorhandene Tabellen verf�gt, welche man konvertieren m�chte, um dem strikten SQL-Modus zu entsprechen, verwende die folgende Routine.',
	//

	// Log module
	'LogFilterTip'				=> 'Filtere Ereignisse nach Kriterien',
	'LogLevel'					=> 'Stufe',
	'LogLevelFilters'	=> [
		'1'		=> 'nicht weniger als',
		'2'		=> 'nicht h�her als',
		'3'		=> 'gleich',
	],
	'LogNoMatch'				=> 'Keine Ereignisse, die die Kriterien erf�llen',
	'LogDate'					=> 'Datum',
	'LogEvent'					=> 'Ereignis',
	'LogUsername'				=> 'Benutzername',
	'LogLevels'	=> [
		'1'		=> 'kritisch',
		'2'		=> 'h�chste',
		'3'		=> 'hoch',
		'4'		=> 'mittel',
		'5'		=> 'niedrig',
		'6'		=> 'unterste',
		'7'		=> 'debugging',
	],

	// Massemail module
	'MassemailInfo'				=> 'Hier kannst du eine Nachricht per E-Mail an alle Mitglieder des Wikis oder einer spezifischen Gruppe senden, <strong>sofern diese den Erhalt von Informationen per E-Mail zugelassen haben</strong>. Dazu wird eine E-Mail an die festgelegte administrative E-Mail-Adresse verschickt und alle Empf�nger als Blindkopie (BCC) hinzugef�gt. Standardm��ig wird pro 20 Empf�nger eine solche E-Mail versandt; bei mehreren Empf�ngern werden mehrere E-Mails versandt. Bitte habe nach dem Absenden Geduld, wenn du eine Nachricht an eine gro�e Gruppe schickst und breche den Vorgang nicht ab. Bei einer Massen-E-Mail ist es normal, dass ihr Versand l�nger dauert. Du wirst benachrichtigt, sobald der Vorgang abgeschlossen wurde.',
	'LogMassemail'				=> 'Rundmail gesendet %1 an Gruppe / Nutzer ',
	'MassemailSend'				=> 'Rundmail gesendet',

	'NoEmailMessage'			=> 'Du musst eine Nachricht angeben.',
	'NoEmailSubject'			=> 'Du musst einen Betreff f�r die Nachricht angeben.',

	'MessageSubject'			=> 'Betreff',
	'MessageSubjectInfo'		=> '',
	'YourMessage'				=> 'Deine Nachricht',
	'YourMessageInfo'			=> 'Bitte beachte, dass du nur reinen Text verwenden kannst. Alle Auszeichnungen werden vor dem Versand entfernt.',

	'MessageLanguage'			=> 'Sprache',
	'MessageLanguageInfo'		=> '',
	'SendMail'					=> 'Senden',

	'SendToGroup'				=> 'Sende an Nutzergruppe',
	'SendToUser'				=> 'Sende an Nutzer',

	// System message module
	'SysMsgInfo'				=> '',
	'SysMsgUpdated'				=> 'System-Mitteilung aktualisiert',

	'SysMsgSection'				=> 'System-Mitteilung',
	'SysMsg'					=> 'System-Mitteilung',
	'SysMsgInfo'				=> 'Dein Text hier',

	'SysMsgType'				=> 'Typ',
	'SysMsgTypeInfo'			=> 'Mitteilungtyp (CSS).',
	'EnableSysMsg'				=> 'Aktiviere System-Mitteilung',
	'EnableSysMsgInfo'			=> 'Zeige System-Mitteilung.',

	// User approval module
	'ApproveNotExists'			=> 'Please select at least one user via the Set button.',

	'LogUserApproved'			=> 'User ##%1## approved',
	'LogUserBlocked'			=> 'User ##%1## blocked',
	'LogUserDeleted'			=> 'User ##%1## removed from the database',
	'LogUserCreated'			=> 'Created a new user ##%1##',
	'LogUserUpdated'			=> 'Updated User ##%1##',

	'UserApproveInfo'			=> 'Schalte neue Benutzer frei, damit sie sich auf der Seite anmelden k�nnen.',
	'Approve'					=> 'Zulassen',
	'Deny'						=> 'Ablehnen',
	'Pending'					=> 'Ausstehend',
	'Approved'					=> 'Best�tigt',
	'Denied'					=> 'Abgelehnt',

	// DB Backup module
	'BackupStructure'			=> 'Struktur',
	'BackupData'				=> 'Daten',
	'BackupFolder'				=> 'Ordner',
	'BackupTable'				=> 'Tabelle',
	'BackupCluster'				=> 'Cluster',
	'BackupFiles'				=> 'Dateien',
	'BackupSettings'			=> 'W�hle das gew�nsche Datensicherungs-Schema.<br>' .
									'Der Stammcluster wirkt sich nicht auf die Sicherung der globalen Dateisicherung und der Cache-Dateien aus (die Auswahl wird immer vollst�ndig gespeichert).<br>' .
									'<br>' .
									'<strong>Achtung</strong>: Um den Verlust von Informationen aus der Datenbank bei der Angabe des Root-Clusters zu vermeiden, werden die Tabellen aus dieser Sicherung nicht umstrukturiert, ' .
									'auch wenn nur die Tabellenstruktur gesichert wird, ohne die Daten zu speichern. ' .
									'Um eine vollst�ndige Konvertierung der Tabellen in das Backup-Format vorzunehmen, muss eine <em> vollst�ndigen Datenbanksicherung (Struktur und Daten) ohne Angabe des Clusters</em> gemacht werden.',
	'BackupCompleted'			=> 'Sichern und Archivieren abgeschlossen.<br>' .
									'Die Sicherungspaketdateien wurden im Unterverzeichnis %1 abgelegt.<br>' .
									'Um es herunterzuladen verwende FTP (ver�ndere die Verzeichnisstruktur und die Dateinamen beim Kopieren nicht).<br>' .
									'Um eine Sicherungskopie wiederherzustellen oder ein Paket zu entfernen, gehe zu <a href="%2">Datenbank wiederherstellen</a>.',
	'LogSavedBackup'			=> 'Sicherungskopie gespeichert ##%1##',

	// DB Restore module
	'RestoreInfo'				=> 'Du kannst jedes gefundene Sicherungsspaket wiederherstellen oder vom Server entfernen.',
	'ConfirmDbRestore'			=> 'M�chtest du die Datensicherung wiederherstellen',
	'ConfirmDbRestoreInfo'		=> 'Bitte warte dies kann einige Minuten ben�tigen.',
	'RestoreWrongVersion'		=> 'WackoWiki Version stimmt nicht �berein!',
	'BackupDelete'				=> 'Willst du die Datensicherung wirklich entfernen',
	'BackupDeleteInfo'			=> '',
	'RestoreOptions'			=> 'Zus�tzliche Otionen zur Daten-Wiederherstellung',
	'RestoreOptionsInfo'		=> '* Vor dem Wiederherstellen der <strong>Cluster-Sicherung</strong>, ' .
									'werden die Zieltabellen nicht zerst�rt (um den Verlust von Informationen aus den Clustern, die nicht gesichert wurden, zu verhindern).. ' .
									'Somit werden w�hrend des Wiederherstellungsvorgangs doppelte Datens�tze auftreten. ' .
									'Im normalen Modus werden alle Dateien durch die Datens�tze ersetzt (mit SQL-Anweisung <code>REPLACE</code>), ' .
									'aber wenn dieses Kontrollk�stchen aktiviert ist, werden alle Duplikate �bersprungen (die aktuellen Werte der Datens�tze werden beibehalten), ' .
									'und nur die Datens�tze mit neuem Schl�ssel werden in die Tabelle aufgenommen (SQL-Anweisung <code>INSERT IGNORE</code>).<br>' .
									'<strong>Hinweis</strong>: Wenn Sie eine vollst�ndige Sicherung der Site wiederherstellen, hat diese Option keinen Zweck.<br>' .
									'<br>' .
									'** Wenn die Sicherung die Benutzerdateien (global und perpage, Cache-Dateien usw.) enth�lt, ' .
									'ersetzen sie im normalen Modus die vorhandenen Dateien mit denselben Namen und werden beim Wiederherstellen in demselben Verzeichnis abgelegt. ' .
									'Mit dieser Option kann man die aktuellen Kopien der Dateien speichern und aus einer Sicherung nur neue Dateien (fehlt auf dem Server) wiederherstellen.',
	'IgnoreDuplicatedKeys'		=> 'Ignoriere doppelte Tabellenschl�ssel (nicht ersetzen)',
	'IgnoreSameFiles'			=> 'Ignoriere die gleichen Dateien (nicht �berschreiben)',
	'NoBackupsAvailable'		=> 'Keien Datensicherung verf�gbar.',
	'BackupEntireSite'			=> 'Gesamte Website',
	'BackupRestored'			=> 'Die Datensicherung wurde wiederhergestellt, ein zusammenfassender Bericht ist angef�gt. Um die Dateien zu dieser Datensicherung zu l�schen, klicke bitte',
	'BackupRemoved'				=> 'Die ausgew�hlte Datensicherung wurde erfolgreich entfernt.',
	'LogRemovedBackup'			=> 'Sicherungskopie gel�scht ##%1##',

	'RestoreStarted'			=> 'Beginne Wiederherstellung der Datensicherung',
	'RestoreParameters'			=> 'Verwendete Parameter',
	'IgnoreDublicatedKeys'		=> 'Ignoriere doppelte Schl�ssel',
	'IgnoreDublicatedFiles'		=> 'Ignoriere doppelte Dateien',
	'SavedCluster'				=> 'Gespeicherter Cluster',
	'DataProtection'			=> 'Datenschutz - %1 weggelassen',
	'AssumeDropTable'			=> 'Nehme %1',
	'RestoreTableStructure'		=> 'Wiederherstellen der Struktur der Tabelle',
	'RunSqlQueries'				=> 'F�hre SQL-Anweisungen aus',
	'CompletedSqlQueries'		=> 'Abgeschlossen. Verarbeitete Anweisungen',
	'NoTableStructure'			=> 'Die Struktur der Tabellen wurde nicht gespeichert - �berspringen',
	'RestoreRecords'			=> 'Tabelleninhalte wiederherstellen',
	'ProcessTablesDump'			=> 'Just download and process tables dump',
	//
	'Instruction'				=> 'Anweisung',
	'RestoredRecords'			=> 'Datens�tze',
	'RecordsRestoreDone'		=> 'Abgeschlossen. Gesamtzahl der Datens�tze',
	'SkippedRecords'			=> 'Daten nicht gespeichert - �bersprungen',
	'RestoringFiles'			=> 'Dateien wiederherstellen',
	'DecompressAndStore'		=> 'Entpake und speichere Inhalte der Verzeichnisse',
	'HomonymicFiles'			=> 'gleichnamige Dateien',
	'RestoreSkip'				=> '�berspringen',
	'RestoreReplace'			=> 'ersetzen',
	'RestoreFile'				=> 'Datei',
	'Restored'					=> 'wiederhergestellt',
	'Skipped'					=> '�bersprungen',
	'FileRestoreDone'			=> 'Abgeschlossen. Gesamtzahl der Dateien',
	'FilesAll'					=> 'alle',
	'SkipFiles'					=> 'Dateien nicht gespeichert - �bersprungen',
	'RestoreDone'				=> 'WIEDERHERSTELLUNG ABGESCHLOSSEN',

	'BackupCreationDate'		=> 'Erstellungsdatum',
	'BackupPackageContents'		=> 'Der Inhalt des Pakets',
	'BackupRestore'				=> 'wiederherstellen',
	'BackupRemove'				=> 'entfernen',
	'RestoreYes'				=> 'ja',
	'RestoreNo'					=> 'nein',
	'LogDbRestored'				=> 'Sicherung ##%1## der Datenbank wiederhergestellt.',

	// User module
	'UsersInfo'					=> 'Hier k�nnen Sie Ihre Benutzerinformationen und bestimmte spezifische Optionen �ndern.',

	'UsersAdded'				=> 'Benutzer hinzugef�gt',
	'UsersDeleteInfo'			=> '[Informationen an Benutzer zur L�schung hier..]',
	'UserEditButton'			=> 'Bearbeiten',
	'UserEnabled'				=> 'Aktiviert',
	'UsersAddNew'				=> 'F�ge einen neuen Benutzer hinzu',
	'UsersDelete'				=> 'Bist du dir sicher das du den Benutzer entfernen willst ',
	'UsersDeleted'				=> 'Der Benutzer wurde aus der Datenbank entfernt.',
	'UsersRename'				=> 'Benutzer umbenennen',
	'UsersRenameInfo'			=> '* Hinweise: Die �nderung wirkt sich auf alle Seiten aus, die diesem Benutzer zugeordnet sind.',
	'UsersUpdated'				=> 'Benutzer erfolgreich aktualisiert.',

	'UserName'					=> 'Benutzername',
	'UserRealname'				=> 'Realname',
	'UserEmail'					=> 'E-Mail',
	'UserIP'					=> 'IP',
	'UserLanguage'				=> 'Sprache',
	'UserSignuptime'			=> 'Anmeldung',
	'UserActions'				=> 'Actions',
	'NoMatchingUser'			=> 'Keine Benutzer, welche diese Kriterien erf�llen.',

	// Groups module
	'GroupsInfo'				=> 'Von diesem Panel aus k�nnen Sie alle Ihre Benutzergruppen verwalten. Sie k�nnen vorhandene Gruppen l�schen, erstellen und bearbeiten. Dar�ber hinaus k�nnen Sie Gruppenleiter ausw�hlen, den Status der offenen / versteckten / geschlossenen Gruppen umschalten und den Gruppennamen und die Beschreibung festlegen.',

	'LogMembersUpdated'			=> 'Updated usergroup members',
	'LogMemberAdded'			=> 'Added member ##%1## into group ##%2##',
	'LogMemberRemoved'			=> 'Removed member ##%1## from group ##%2##',
	'LogGroupCreated'			=> 'Created a new group ##%1##',
	'LogGroupRenamed'			=> 'Group ##%1## renamed to ##%2##',
	'LogGroupRemoved'			=> 'Removed group ##%1##',

	'GroupsMembersFor'			=> 'Mitglieder der Gruppe',
	'GroupsDescription'			=> 'Beschreibung',
	'GroupsModerator'			=> 'Moderator',
	'GroupsOpen'				=> 'Offen',
	'GroupsActive'				=> 'Aktiv',
	'GroupsTip'					=> 'Klicke um die Gruppe zu bearbeiten',
	'GroupsUpdated'				=> 'Gruppen aktualisiert',
	'GroupsAlreadyExists'		=> 'Diese Gruppe gibt es bereits.',
	'GroupsAdded'				=> 'Gruppe erfolgreich hinzugef�gt.',
	'GroupsRenamed'				=> 'Gruppe erfolgreich umbenannt.',
	'GroupsDeleted'				=> 'Die Gruppe und alle Mitglieder wurde aus der Datenbank gel�scht.',
	'GroupsAdd'					=> 'Eine neue Gruppe hinzuf�gen',
	'GroupsRename'				=> 'Gruppe umbenennen',
	'GroupsRenameInfo'			=> '* Hinweis: Die �nderung wirkt sich auf alle Seiten aus, die dieser Gruppe zugeordnet sind.',
	'GroupsDelete'				=> 'Bist du dir sicher das du die Gruppe entfernen m�chtest ',
	'GroupsDeleteInfo'			=> '* Hinweis: Die �nderung wirkt sich auf alle Mitglieder aus, die dieser Gruppe zugeordnet sind.',
	'GroupsStoreButton'			=> 'Speichere Gruppen',
	'GroupsSaveButton'			=> 'Absenden',
	'GroupsCancelButton'		=> 'Abbrechen',
	'GroupsAddButton'			=> 'Hinzuf�gen',
	'GroupsEditButton'			=> 'Bearbeiten',
	'GroupsRemoveButton'		=> 'Entfernen',
	'GroupsEditInfo'			=> 'Zum Bearbeiten der Gruppen-Liste w�hle das Optionsfeld',

	'MembersAddNew'				=> 'Neues Mitglied hinzuf�gen',
	'MembersAdded'				=> 'Neues Mitglied der Gruppe erfolgreich hinzugef�gt.',
	'MembersRemove'				=> 'Bist du dir sicher das du das Mitglied enfernen m�chtest ',
	'MembersRemoved'			=> 'Das Mitglied wurde aus der Gruppe entfernt.',
	'MembersDeleteInfo'			=> '* Hinweis: Die �nderung wirkt sich auf alle Mitglieder aus, die dieser Gruppe zugeordnet sind.',

	// Statistics module
	'DbStatSection'				=> 'Datenbank-Statistik',
	'DbTable'					=> 'Tabelle',
	'DbRecords'					=> 'Datens�tze',
	'DbSize'					=> 'Gr��e',
	'DbIndex'					=> 'Index',
	'DbOverhead'				=> '�berhang',
	'DbTotal'					=> 'Gesamt',

	'FileStatSection'			=> 'Dateisystem-Statistik',
	'FileFolder'				=> 'Ordner',
	'FileFiles'					=> 'Dateien',
	'FileSize'					=> 'Gr��e',
	'FileTotal'					=> 'Gesamt',

	// Sysinfo module
	'SysInfo'					=> 'Versionsinformationen',
	'SysParameter'				=> 'Parameter',
	'SysValues'					=> 'Werte',

	'WackoVersion'				=> 'Wacko version',
	'LastWackoUpdate'			=> 'Letzte Aktualisierung',
	'ServerOS'					=> 'OS',
	'ServerName'				=> 'Server name',
	'WebServer'					=> 'Web server',
	'DbVersion'					=> 'MariaDB / MySQL version',
	'SQLModesGlobal'			=> 'SQL Modes Global',
	'SQLModesSession'			=> 'SQL Modes Session',
	'PhpVersion'				=> 'PHP Version',
	'MemoryLimit'				=> 'Memory',
	'UploadMaxFilesize'			=> 'Upload max filesize',
	'PostMaxSize'				=> 'Post max size',
	'MaxExecutionTime'			=> 'Max execution time',
	'SessionPath'				=> 'Session path',
	'PhpDefaultCharset'			=> 'PHP default charset',
	'GZipCompression'			=> 'GZip compression',
	'PHPExtensions'				=> 'PHP Erweiterungen',
	'ApacheModules'				=> 'Apache Module',

	// DB repair module
	'DbRepairSection'			=> 'Datenbank reparieren',
	'DbRepair'					=> 'Datenbank reparieren',
	'DbRepairInfo'				=> 'Dieses Skript kann automatisch nach einigen h�ufigen Datenbankproblemen suchen und sie reparieren. Das Reparieren kann eine Weile dauern, seien Sie also bitte geduldig.',

	'DbOptimizeRepairSection'	=> 'Datenbank reparieren und optimieren',
	'DbOptimizeRepair'			=> 'Datenbank reparieren und optimieren',
	'DbOptimizeRepairInfo'		=> 'Dieses Skript kann auch versuchen, die Datenbank zu optimieren. Dies verbessert die Leistung in einigen Situationen. Das Reparieren und Optimieren der Datenbank kann sehr lange dauern und die Datenbank wird w�hrend der Optimierung gesperrt.',

	'TableOk'					=> 'Die Tabelle %1 ist in Ordnung.',
	'TableNotOk'				=> 'Die %1-Tabelle ist nicht in Ordnung. Es meldet den folgenden Fehler: %2. Dieses Skript wird versuchen, diese Tabelle zu reparieren&hellip;',
	'TableRepaired'				=> 'Die %1-Tabelle wurde erfolgreich repariert.',
	'TableRepairFailed'			=> 'Die %1-Tabelle konnte nicht repariert werden. <br>Fehler: %2',
	'TableAlreadyOptimized'		=> 'Die Tabelle %1 ist bereits optimiert.',
	'TableOptimized'			=> 'Die %1-Tabelle wurde erfolgreich optimiert.',
	'TableOptimizeFailed'		=> 'Fehler beim Optimieren der %1-Tabelle. <br>Fehler: %2',
	'TableNotRepaired'			=> 'Einige Datenbankprobleme konnten nicht repariert werden.',
	'RepairsComplete'			=> 'Reparaturen abgeschlossen',

	// Transliterate module
	'TranslitField'				=> 'Transliteriere Feld %1 in der Tabelle `%2`.',
	'TranslitStart'				=> 'Start',
	'TranslitContinue'			=> 'Weiter',
	'TranslitCompleted'			=> 'Der Update-Vorgang ist abgeschlossen.',


];

?>