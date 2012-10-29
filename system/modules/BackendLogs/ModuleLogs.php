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
 * Class ModuleLogs
 *
 * @copyright  Felix Peters 2011
 * @author     Felix Peters - Wichteldesign
 * @package    Controller
 */
class ModuleLogs extends BackendModule
{
    /**
     * Template
     * @var string
     */
    protected $strTemplate = 'mod_logs';

    /**
     * Generate module
     */
    protected function compile()
    {

        $config = array(
			"error" => array ("logfile"  => "/system/logs/error.log",
							  "headline" => $GLOBALS['TL_LANG']['MSC']['errorLog'],
							  "rows"     => 15
			),
			"email" => array ("logfile"  => "/system/logs/email.log",
							  "headline" => $GLOBALS['TL_LANG']['MSC']['emailLog'],
							  "rows"     => 20
			),
			"konfigurator" => array ("logfile"  => "/system/logs/konfigurator.log",
									 "headline" => $GLOBALS['TL_LANG']['MSC']['konfiguratorLog'],
									 "rows"     => 30
			)
		);
		
		$logfiles = array();
		foreach ($GLOBALS["TL_LOGFILES"] as $key=>$logfile) {
			$arrLog = null;
			if (file_exists(TL_ROOT . $logfile["logfile"])) {
				$arrLogFileRaw = $this->read_file(TL_ROOT . $logfile["logfile"], $logfile["rows"]);
				if (count($arrLogFileRaw) > 0) {
					foreach ($arrLogFileRaw as $k => $strLog) {
						$strDate = trim(substr($strLog, 1, 20));
						$strDay = substr($strDate, 0, 11);
						
						if (strpos($strLog, 'PHP Fatal error')) {
							$arrLog[$strDay][$k]['class'] = 'tl_red';
						}
						
						$arrLog[$strDay][$k]['text'] = substr($strLog, 23);
						$arrLog[$strDay][$k]['datim'] = substr($strDate, 0, 22);
					}
				}
			}
			$logfiles[$key] = array("headline" => $logfile["headline"], "log" => $arrLog);
		}
		$this->Template->logfiles = $logfiles;
    }

    /**
     * Reads the File
     * Based on http://tekkie.flashbit.net/php/tail-functionality-in-php#
     *
     * @param $file
     * @param $lines
     * @return array
     */

    private function read_file($file, $lines) {
        //global $fsize;
        $handle = fopen($file, "r");
        $linecounter = $lines;
        $pos = -2;
        $beginning = false;
        $text = array();
        while ($linecounter > 0) {
            $t = " ";
            while ($t != "\n") {
                if (fseek($handle, $pos, SEEK_END) == -1) {
                    $beginning = true;
                    break;
                }
                $t = fgetc($handle);
                $pos--;
            }
            $linecounter--;
            if ($beginning) {
                rewind($handle);
            }
            $text[$lines - $linecounter - 1] = fgets($handle);
            if ($beginning) break;
        }
        fclose($handle);
        return array_reverse($text);
    }
}

?>