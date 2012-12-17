Stellt den Error-Log und den Email-Log (sowie zusätzlich konfigurierte Logdateien) von Contao im Backend dar.

Diese Extention richtet sich an Entwickler.

Adding configuration
====================

## Add to `system/config/localconfig.php`
	$GLOBALS['TL_LOGFILES']['mylog'] = array ('logfile' => '/system/logs/mylog.log', 'rows' => 30);

## Add to `system/config/langconfig.php`
	// Add additional logfile config translations
	if ($GLOBALS['TL_LANGUAGE'] == 'de') {
		$GLOBALS['TL_LANG']['MOD']['mylogLangKey'] = "Mein Logfile";
	} elseif ($GLOBALS['TL_LANGUAGE'] == 'en') {
		$GLOBALS['TL_LANG']['MOD']['mylogLangKey'] = "My logfile";
	}


Dependency
----------

- There are no dependencies to other extensions, that have to be installed.