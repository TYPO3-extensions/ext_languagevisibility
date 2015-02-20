<?php
/***************************************************************
 * Copyright notice
 *
 * (c) 2013 AOE GmbH (dev@aoe.com)
 * All rights reserved
 *
 * This script is part of the TYPO3 project. The TYPO3 project is
 * free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * The GNU General Public License can be found at
 * http://www.gnu.org/copyleft/gpl.html.
 *
 * This script is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/

namespace Aoe\ExtLanguagevisibility\Service;

use TYPO3\CMS\Core\SingletonInterface;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface;

/**
 * Generates visibility elements for the supported tables.
 *
 * @author Chetan Thapliyal <chetan.thapliyal@aoe.com>
 */
class ElementFactory implements SingletonInterface {

	/**
	 * @var array
	 */
	private $elementTableMap;

	/**
	 * @var \TYPO3\CMS\Extbase\Object\ObjectManager
	 */
	private $objectManager;

	/**
	 * Initialized class instance.
	 */
	public function __construct() {
		$this->objectManager = GeneralUtility::makeInstance('TYPO3\CMS\Extbase\Object\ObjectManager');
		$configuration = $this->objectManager
						->get('TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface')
						->getConfiguration(ConfigurationManagerInterface::CONFIGURATION_TYPE_SETTINGS);
		$this->elementTableMap = $configuration['ext_languagevisibility']['elements']['mappings'];
	}

	/**
	 * @param  string  $table
	 * @param  integer $uid
	 * @param  array   $row
	 * @param  bool    $overlay_ids     Boolean parameter to overlay uid if the user is in workspace context
	 * @return \tx_languagevisibility_element
	 * @throws \Exception
	 */
	public function getElementForTable($table, $uid, $row, $overlay_ids) {
		if (isset($this->elementTableMap[$table])) {
			$elementClass  = $this->elementTableMap[$table];
			$elementObject = $this->objectManager->get($elementClass, $row);
		} else {
			throw new \Exception($table.': Table not configured', 1366296552);
		}

		return $elementObject;
	}
}
