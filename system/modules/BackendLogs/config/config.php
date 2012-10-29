<?php if (!defined('TL_ROOT')) die('You cannot access this file directly!');

/**
 * Contao Open Source CMS
 * Copyright (C) 2005-2011 Leo Feyer
 *
 * Formerly known as TYPOlight Open Source CMS.
 *
 * This program is free software: you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation, either
 * version 3 of the License, or (at your option) any later version.
 * 
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU
 * Lesser General Public License for more details.
 * 
 * You should have received a copy of the GNU Lesser General Public
 * License along with this program. If not, please visit the Free
 * Software Foundation website at <http://www.gnu.org/licenses/>.
 *
 * PHP version 5
 * @copyright  Felix Peters 2011 
 * @author     Felix Peters - Wichteldesign 
 * @package    wd_logs 
 * @license    LGPL 
 * @filesource
 */

/**
 * Backend modules
 */
$logs = array(
	'logs' => array(
		'callback' => 'ModuleLogs',
		'icon'	 => 'system/modules/wd_logs/html/page_white_text.png'
	)
);
array_insert($GLOBALS['BE_MOD']['development'], 3, $logs);

/**
 * Logfile configuration
 */
$GLOBALS["TL_LOGFILES"] = array(
	"error" => array ("logfile"  => "/system/logs/error.log",
					  "headline" => &$GLOBALS['TL_LANG']['MSC']['errorLog'],
					  "rows"     => 15
	),
	"email" => array ("logfile"  => "/system/logs/email.log",
					  "headline" => &$GLOBALS['TL_LANG']['MSC']['emailLog'],
					  "rows"     => 20
	)
);


?>