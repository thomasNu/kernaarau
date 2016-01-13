<?php
/***************************************************************
*  Copyright notice
*
*  (c) 2014 Thomas Nussbaumer <typo3@thomasnu.ch>
*
*  All rights reserved
*
*  This script is part of the TYPO3 project. The TYPO3 project is
*  free software; you can redistribute it and/or modify
*  it under the terms of the GNU General Public License as published by
*  the Free Software Foundation; either version 2 of the License, or
*  (at your option) any later version.
*
*  The GNU General Public License can be found at
*  http://www.gnu.org/copyleft/gpl.html.
*
*  This script is distributed in the hope that it will be useful,
*  but WITHOUT ANY WARRANTY; without even the implied warranty of
*  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
*  GNU General Public License for more details.
*
*  This copyright notice MUST APPEAR in all copies of the script!
***************************************************************/

/**
 * View helper for rendering glossary references.
 */
class Tx_Kernaarau_ViewHelpers_GlossaryRefsViewHelper extends Tx_Fluid_Core_ViewHelper_AbstractViewHelper {

	/**
	 * Returns the references of of a glossary entry.
	 *
	 * @param string $code The product code (-xxx for glossary term)
	 * @param string $columns The columns text (-xxx\n-xxx\n-xxx.. for glossary references) 
	 * @param array $allowedRefs Allowed references
	 * @return array References
	 */
	public function render($code, $columns, $allowedRefs) {
		$cols = explode("\n", $columns);
		$refs = array();
		$i = 0;
		while ($i < count($cols)) {
			if (ord($cols[$i]) == ord('-')) {
				$ref = substr(rtrim($cols[$i]), 1);
				$refs[] = array('link' => in_array('-' . $ref, $allowedRefs) ? '-' . $code . '_' . $ref : '', 'text' => $ref);
			}
			++$i;
		}
		return $refs;
	}
}
