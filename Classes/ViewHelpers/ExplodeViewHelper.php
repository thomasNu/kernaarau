<?php
/***************************************************************
*  Copyright notice
*
*  (c) 2011 Claus Due <claus@wildside.dk>, Wildside A/S
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
 * Explode ViewHelper
 *
 * Explodes a string by $glue
 *
 * @author Claus Due, Wildside A/S
 * @package Fed ported into Thomasnu by Thomas Nussbaumer <typo3@thomasnu.ch>
 * @subpackage ViewHelpers
 */
class Tx_Kernaarau_ViewHelpers_ExplodeViewHelper extends Tx_Fluid_Core_ViewHelper_AbstractViewHelper {

	/**
	 * Initialize
	 */
	public function initializeArguments() {
		$this->registerArgument('glue', 'string', 'String used as glue in the string to be exploded. Use glue value of "constant:NAMEOFCONSTANT" (fx "constant:LF" for linefeed as glue)', FALSE, ',');
		$this->registerArgument('as', 'string', 'Template variable name to assign. If not specified returns the result array instead');
	}

	/**
	 * Render method
	 *
	 * @param mixed $content String or variable convertible to string which should be exploded
	 * @return mixed
	 */
	public function render($content=NULL) {
		$contentWasSource = FALSE;
		if (!$content) {
			$content = $this->renderChildren();
			$contentWasSource = TRUE;
		}
		$glue = $this->resolveGlue();
		$output = explode($glue, $content);
		if ($as = $this->arguments['as']) {
			if ($this->templateVariableContainer->exists($as)) {
				$this->templateVariableContainer->remove($as);
			}
			$this->templateVariableContainer->add($as, $output);
			$content = '';
			if ($codeWasSource === FALSE) {
				$content = $this->renderChildren();
				if ($content) {
					$this->templateVariableContainer->remove($as);
				}
			return $content;
			}
		} else {
			return $output;
		}
	}

	/**
	 * Detects the proper glue string to use for implode/explode operation
	 *
	 * @return string
	 */
	protected function resolveGlue() {
		$glue = $this->arguments['glue'];
		if (strpos($glue, ':') && substr_count($glue, ':')) {
				// glue contains a special type identifier, resolve the actual glue
			list ($type, $value) = explode(':', $glue);
			switch ($type) {
				case 'constant':
					$glue = constant($value);
					break;
				default:
					$glue = $value;
			}
		}
		return $glue;
	}

}
