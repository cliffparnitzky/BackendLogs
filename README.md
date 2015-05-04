[![Latest Version on Packagist](http://img.shields.io/packagist/v/cliffparnitzky/backend-logs.svg?style=flat)](https://packagist.org/packages/cliffparnitzky/backend-logs)
[![Installations via composer per month](http://img.shields.io/packagist/dm/cliffparnitzky/backend-logs.svg?style=flat)](https://packagist.org/packages/cliffparnitzky/backend-logs)
[![Installations via composer total](http://img.shields.io/packagist/dt/cliffparnitzky/backend-logs.svg?style=flat)](https://packagist.org/packages/cliffparnitzky/backend-logs)

Contao Extension: BackendLogs
=============================

Provides a special functionality to display error.log, email.log and other configured logfiles in Contao backend.


Installation
------------

Install the extension via composer: [cliffparnitzky/backend-logs](https://packagist.org/packages/cliffparnitzky/backend-logs).

If you prefer to install it manually, download the latest release here: https://github.com/cliffparnitzky/BackendLogs/releases


Tracker
-------

https://github.com/cliffparnitzky/BackendLogs/issues


Compatibility
-------------

- min. Contao version: >= 3.2.0
- max. Contao version: <  3.5.0


Dependency
----------

- There are no dependencies to other extensions, that have to be installed.


Additional configuration
------------------------

Add to `system/config/localconfig.php`
	$GLOBALS['TL_LOGFILES']['logfileMylog'] = array ('logfile' => '/system/logs/mylog.log', 'rows' => 30);

Add to `system/config/langconfig.php`
	// Add additional logfile config translations
	if ($GLOBALS['TL_LANGUAGE'] == 'de') {
		$GLOBALS['TL_LANG']['MOD']['logfileMylog'] = "Mein Logfile";
	} elseif ($GLOBALS['TL_LANGUAGE'] == 'en') {
		$GLOBALS['TL_LANG']['MOD']['logfileMylog'] = "My logfile";
	}