<?php
/***************************************************************
 * Copyright notice
 *
 * (c) 2013 AOE media (dev@aoemedia.de)
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

/**
 * Generates visibility elements for the supported tables.
 *
 * @author Chetan Thapliyal <chetan.thapliyal@aoemmedia.de>
 */
class Tx_ExtLanguagevisibility_Service_ElementFactory implements t3lib_Singleton {

	/**
	 * @var array
	 */
	private $elementTableMap;

	/**
	 * @var Tx_Extbase_Object_ObjectManagerInterface
	 */
	private $objectManager;

	/**
	 * Initialized class instance.
	 */
	public function __construct() {
		$this->objectManager = t3lib_div::makeInstance('Tx_Extbase_Object_ObjectManager');
		$configuration = $this->objectManager
								->get('Tx_Extbase_Configuration_ConfigurationManagerInterface')
								->getConfiguration(Tx_Extbase_Configuration_ConfigurationManagerInterface::CONFIGURATION_TYPE_FRAMEWORK);
		$this->elementTableMap = $configuration['settings']['ext_languagevisibility']['elements']['mappings'];
	}

	/**
	 * @throws Exception
	 * @param  string  $table
	 * @param  integer $uid
	 * @param  array   $row
	 * @param  bool    $overlay_ids     Boolean parameter to overlay uid if the user is in workspace context
	 * @return tx_languagevisibility_element
	 */
	public function getElementForTable($table, $uid, $row, $overlay_ids) {
		if ($element = array_search($table, $this->elementTableMap)) {
			$elementClass = 'Tx_ExtLanguagevisibility_Element_' . ucfirst($element);
			$elementObject = $this->objectManager->create($elementClass, $row);
		} else {
			throw new Exception($table.': Table not configured', 1366296552);
		}

		return $elementObject;
	}
}
