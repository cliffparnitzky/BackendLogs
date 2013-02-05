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
 * @copyright  Cliff Parnitzky 2012
 * @author     Cliff Parnitzky
 * @package    BackendLogs
 * @license    LGPL
 */

/**
 * Back end modules
 */
$GLOBALS['TL_LANG']['MOD']['logfiles']     = 'Logdateien';
$GLOBALS['TL_LANG']['MOD']['logfileError'] = array('Error Log', 'Zeigt die Logdatei <i>error.log</i>.');
$GLOBALS['TL_LANG']['MOD']['logfileEmail'] = array('E-Mail Log', 'Zeigt die Logdatei <i>email.log</i>');

/**
 * Define name and tooltip for preferences (inactive modules)
 */
$GLOBALS['TL_LANG']['MOD']['BackendLogs'] = array('Logdateien anzeigen', 'Zeigt Logdateien im Backend an.');

?>