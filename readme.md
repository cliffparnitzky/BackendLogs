Stellt den Error-Log und den Email-Log (sowie zusätzlich konfigurierte Logdateien) von Contao im Backend dar.

Diese Extention richtet sich an Entwickler.

Adding configuration
====================

## Add to `system/config/localconfig.php`
	$GLOBALS['TL_LOGFILES']['mylog'] = array ('logfile' => '/system/logs/mylog.log', 'headline' => &$GLOBALS['TL_LANG']['MSC']['mylogLangKey'], 'rows' => 30);

## Add to `system/config/langconfig.php`
	// Add additional logfile config translations
	if ($GLOBALS['TL_LANGUAGE'] == 'de') {
		$GLOBALS['TL_LANG']['MSC']['mylogLangKey'] = "Mein Logfile";
	} elseif ($GLOBALS['TL_LANGUAGE'] == 'en') {
		$GLOBALS['TL_LANG']['MSC']['mylogLangKey'] = "My logfile";
	}