<?php
/***************************************************************
*  Copyright notice
*
*  (c) 2013 Thomas Nussbaumer <typo3@thomasnu.ch>
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
 * The controller for actions related to Glossary
 */
class Tx_Kernaarau_Controller_GlossaryController extends Tx_Extbase_MVC_Controller_ActionController {

	/**
	 * @var Tx_Kernaarau_Domain_Model_GlossaryRepository
	 */
	protected $glossaryRepository;

	/**
	 * Dependency injection of the Glossary Repository.
	 *
	 * @param Tx_Kernaarau_Domain_Repository_GlossaryRepository $glossaryRepository
	 * @return void
	 */
	public function injectGlossaryRepository(Tx_Kernaarau_Domain_Repository_GlossaryRepository $glossaryRepository) {
		$this->glossaryRepository = $glossaryRepository;
	}
	/**
	 * Index action for this controller. Displays glossary.
	 *
	 * @param string $letter First letter in alphabetical group or -<code (term in glossary)>_<selected reference>.
	 * @return string The rendered view.
	 */
	public function indexAction($letter = '') {
		$follow = TRUE;
		if (!$letter) {
			$follow = FALSE;
			$letter = '@';
		}
		$letters = array();
		$letters[] = array('first' => '@');
		$l = '@';
		for ($i = ord('A'); $i <= ord('Z'); ++$i) {
			if ($this->glossaryRepository->countInAlphaGroup(chr($i))) {
				$letters[] = array('first' => chr($i));
				$l .= chr($i);
			}
		}
		$refs = array();
		$terms = $this->glossaryRepository->findAll();
		foreach ($terms as $term) {
			$refs[] = '-' . $term->getCode();
		}
		$this->view->assign('follow', $follow);
		$this->view->assign('letters', $letters);
		$this->view->assign('refs', $refs);
		if (ord($letter) != ord('-')) {
			if (stripos($l, $letter) === FALSE) $letter = '@';
			$this->view->assign('current', strtoupper($letter));
			if ($letter != '@') {
				$terms = $this->glossaryRepository->findInAlphaGroup($letter);
			}
			$GLOBALS['TSFE']->fe_user->record_registration(array('clear_all' => '1'));
		} else {
			$this->view->assign('current', '#');
			$items = array();
			$parts = explode('_', $letter);
			if (!($basket = $GLOBALS['TSFE']->fe_user->getKey('ses', 'recs'))) {
				$newItems['tx_kernaarau_data'][0] = substr($parts[0], 1);
				$newItems['tx_kernaarau_data'][1] = $parts[1];
				$GLOBALS['TSFE']->fe_user->record_registration($newItems);
				$items[] = $this->glossaryRepository->findOneByCode(substr($parts[0], 1));
				$items[] = $this->glossaryRepository->findOneByCode($parts[1]);
			}
			else {
				foreach ($basket['tx_kernaarau_data'] as $ref) {
					$items[] = $this->glossaryRepository->findOneByCode($ref);
				}
				if (end($basket['tx_kernaarau_data']) != $parts[1]) {
					$items[] = $this->glossaryRepository->findOneByCode($parts[1]);
					$newItems['tx_kernaarau_data'][count($basket['tx_kernaarau_data'])] = $parts[1];
					$GLOBALS['TSFE']->fe_user->record_registration($newItems);
				}
			}
			$terms = array_reverse($items);
		}
        $this->view->assign('ths', t3lib_div::trimExplode(',', $this->settings['tableHeaders']));
		$tstamp = array();
		foreach ($terms as $term) {
			$tstamp[] = $term->getTstamp()->getTimestamp();
		}
		$this->view->assign('updated', strftime('%e. %B %Y', max($tstamp)));
		$this->view->assign('terms', $terms);
	}
	/**
	 * News action for this controller. Displays table of content on news page.
	 *
	 * @return string The rendered view.
	 */
	public function newsAction() {
		$pid = $GLOBALS['TSFE']->id;
        $this->view->assign('pid', $pid);
        $selected = $GLOBALS['TYPO3_DB']->exec_SELECT_queryArray(array(
            'SELECT' => '*',
            'FROM' => 'tt_content',
            'WHERE' => 'pid = ' . $pid . ' AND hidden = 0 AND deleted = 0',
            'GROUPBY' => '',
            'ORDERBY' => 'sorting ASC',
            'LIMIT' => ''
        ));
        $sections = array();
        $skip = TRUE;
        while ($row = $GLOBALS['TYPO3_DB']->sql_fetch_assoc($selected)) {
            if ($row['CType'] == 'list') {
                $skip = FALSE;
                continue;
            }
            if (!$skip && $row['header_layout'] < 100 && $row['header']) {
                $sections[] = array('title' => $row['header'], 'id' => $row['uid']);
            }
        }
        $this->view->assign('sections', $sections);
        $recent = $this->settings['numberOfRecentArticles'];
        $recent = $recent ? $recent : 10;
        $recent = count($sections) == $recent + 1 ? $recent + 1 : $recent;
        $this->view->assign('recent', $recent);
    }
}
?>
