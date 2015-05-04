<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2005-2015 Leo Feyer
 *
 * @package BackendLogs
 * @link    https://contao.org
 * @license http://www.gnu.org/licenses/lgpl-3.0.html LGPL
 */


/**
 * Register the namespaces
 */
ClassLoader::addNamespaces(array
(
	'BackendLogs',
));


/**
 * Register the classes
 */
ClassLoader::addClasses(array
(
	// Modules
	'BackendLogs\ModuleBackendLogs' => 'system/modules/BackendLogs/modules/ModuleBackendLogs.php',
));


/**
 * Register the templates
 */
TemplateLoader::addFiles(array
(
	'be_backend-logs' => 'system/modules/BackendLogs/templates/backend',
));
