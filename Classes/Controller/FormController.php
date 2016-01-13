<?php
/***************************************************************
*  Copyright notice
*
*  (c) 2015 Thomas Nussbaumer <typo3@thomasnu.ch>
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
 * The controller for actions related to Form
 */
class Tx_Kernaarau_Controller_FormController extends Tx_Extbase_MVC_Controller_ActionController {

	/**
	 * @var Tx_Kernaarau_Domain_Model_FormRepository
	 */
	protected $formRepository;

	/**
	 * Dependency injection of the Form Repository.
	 *
	 * @param Tx_Kernaarau_Domain_Repository_FormRepository $formRepository
	 * @return void
	 */
	public function injectFormRepository(Tx_Kernaarau_Domain_Repository_FormRepository $fromRepository) {
		$this->formRepository = $formRepository;
	}
	/**
	 * Index action for this controller. Displays glossary.
	 *
	 * @param string $letter First letter in alphabetical group or -<code (term in glossary)>_<selected reference>.
	 * @return string The rendered view.
	 */
	public function indexAction($letter = '') {
    
    }
