<?php
/***************************************************************
*  Copyright notice
*
*  (c) 2014 Thomas Nussbaumer <typo3@thomasnu.ch>
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
 * The controller for actions related to Person
 */
class Tx_Kernaarau_Controller_PersonController extends Tx_Extbase_MVC_Controller_ActionController {

	/**
	 * @var Tx_Kernaarau_Domain_Repository_PersonRepository
	 */
	protected $personRepository;

	/**
	 * Dependency injection of the Person Repository
	 *
	 * @param Tx_Kernaarau_Domain_Repository_PersonRepository $personRepository
	 * @return void
	 */
	public function injectPersonRepository(Tx_Kernaarau_Domain_Repository_PersonRepository $personRepository) {
		$this->personRepository = $personRepository;
	}
	/**
	 * Index action for this controller. Displays persons.
	 *
	 * @param string $letter First letter in alphabetical group
	 * @return string The rendered view
	 */
	public function indexAction($letter = '') {
		$follow = TRUE;
		if (!$letter) {
			$follow = FALSE;
			$letter = substr($this->settings['startLetter'], 0, 1);
		}
		$letters = array();
		for ($i = ord('A'); $i <= ord('Z'); ++$i) {
			if ($this->personRepository->countInAlphaGroup(chr($i))) {
				$letters[] = array('first' => chr($i));
				$l .= chr($i);
			}
		}
		$letter = strtoupper($letter);
		if (strpos($l, $letter) === FALSE) $letter = 'A';
        $selected = $GLOBALS['TYPO3_DB']->exec_SELECT_queryArray(array(
            'SELECT' => '*',
            'FROM' => 'tx_kernaarau_domain_model_newspaper',
            'WHERE' => 'page < 255 AND hidden = 0 AND deleted = 0',
            'GROUPBY' => '',
            'ORDERBY' => '',
            'LIMIT' => ''
        ));
        $pdfs = array();
        while ($row = $GLOBALS['TYPO3_DB']->sql_fetch_assoc($selected)) {
            $pdfs[$row['issue']] = array('page' => $row['page'], 'size' => $row['size']);
        }
        $this->view->assign('letters', $letters);
		$this->view->assign('current', $letter);
		$this->view->assign('follow', $follow);
		$this->view->assign('pdfs', $pdfs);
        $this->view->assign('ths', t3lib_div::trimExplode(',', $this->settings['tableHeaders']));
		$persons = $this->personRepository->findInAlphaGroup($letter);
		$tstamp = array();
		foreach ($persons as $person) {
			$tstamp[] = $person->getTstamp()->getTimestamp();
		}
		$this->view->assign('updated', strftime('%e. %B %Y', max($tstamp)));
		$this->view->assign('persons', $persons);
	}
}
?>
