Contao BackendLogs Extension
============================

Provides a special functionality to display error.log, email.log and other configured logfiles in Contao backend.


Installation
------------

The extension is not published in contao extension repository.
Install it manually.


Tracker
-------

https://github.com/cliffparnitzky/BackendLogs/issues


Compatibility
-------------

- min. version: Contao 2.9.5
- max. version: Contao 2.11.6


Dependency
----------

- There are no dependencies to other extensions, that have to be installed.


Additional configuration
========================

## Add to `system/config/localconfig.php`
	$GLOBALS['TL_LOGFILES']['logfileMylog'] = array ('logfile' => '/system/logs/mylog.log', 'rows' => 30);

## Add to `system/config/langconfig.php`
	// Add additional logfile config translations
	if ($GLOBALS['TL_LANGUAGE'] == 'de') {
		$GLOBALS['TL_LANG']['MOD']['logfileMylog'] = "Mein Logfile";
	} elseif ($GLOBALS['TL_LANGUAGE'] == 'en') {
		$GLOBALS['TL_LANG']['MOD']['logfileMylog'] = "My logfile";
	}