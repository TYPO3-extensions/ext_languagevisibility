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

namespace Aoe\ExtLanguagevisibility\Element;

/**
 * Base class for new visibility type elements.
 *
 * @author Chetan Thapliyal <chetan.thapliyal@aoe.com>
 */
abstract class Base extends \tx_languagevisibility_recordelement {

	/**
	 * Returns a formal description for this element type.
	 *
	 * (non-PHPdoc)
	 * @see languagevisibility/classes/tx_languagevisibility_recordelement#getElementDescription()
	 */
	public function getElementDescription() {
		return $this->table . ' Record';
	}
}
