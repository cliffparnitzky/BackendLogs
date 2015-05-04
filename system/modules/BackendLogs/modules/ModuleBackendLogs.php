<?php

/**
 * Contao Open Source CMS
 * Copyright (C) 2005-2015 Leo Feyer
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
 * @copyright  Cliff Parnitzky 2012-2015
 * @author     Cliff Parnitzky
 * @package    BackendLogs
 * @license    LGPL
 */
 
/**
 * Run in a custom namespace, so the class can be replaced
 */
namespace BackendLogs;

/**
 * Class ModuleBackendLogs
 *
 * @copyright  Cliff Parnitzky 2012
 * @author     Cliff Parnitzky
 * @package    Controller
 */
class ModuleBackendLogs extends \BackendModule {

	/**
	 * Template
	 * @var string
	 */
	protected $strTemplate = 'be_backend-logs';

	/**
	 * Generate module
	 */
	protected function compile() {
		$key = $this->Input->get("do");
		$config = $GLOBALS["TL_LOGFILES"][$key];
		$arrLog = null;
		if (file_exists(TL_ROOT . $config["logfile"])) {
			$arrLogFileRaw = $this->readFile(TL_ROOT . $config["logfile"], $config["rows"]);
			if (count($arrLogFileRaw) > 0) {
				$prevText = '';
				$day = '';
				$rowCount = 0;
				foreach ($arrLogFileRaw as $k => $strLog) {
					if (strpos($strLog, '#') === 0) {
						// it is a comment row
						continue;
					}
					else if (strpos($strLog, '[') === 0) {
						// it is a date row
						
						$strDate = trim(substr($strLog, 1, strpos($strLog, ']')));
						$date = date_create_from_format('d-M-Y H:i:s', substr($strDate, 0, 20));
						
						if ($date != null) {
							$day = $date->format('d.m.Y');
							$datim = $date->format('d.m.Y H:i:s');
							
							$rowCount++;
							
							$arrLog[$day][$rowCount]['datim'] = $datim;
							
							$text = specialchars(trim(substr($strLog, strpos($strLog, ']') + 1)));
							if (strlen($text) == 0) {
								$text = $prevText;
							}
							$arrLog[$day][$rowCount]['text'] = $text;
							
							if (strpos($text, 'PHP Fatal error') === 0) {
								$arrLog[$day][$rowCount]['class'] = 'tl_red';
							}
						}
					}
					else {
						// it is a text row
						$prevText = specialchars(trim($strLog));
					}
				}
			}
		}

		$this->Template->arrLog = $arrLog;
	}

	/**
	 * Reads the File
	 * Based on http://tekkie.flashbit.net/php/tail-functionality-in-php#
	 *
	 * @param $file
	 * @param $lines
	 * @return array
	 */
	private function readFile($file, $lines) {
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
		return $text;
	}
}

?>