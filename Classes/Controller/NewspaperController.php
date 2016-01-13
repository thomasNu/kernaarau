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
 * The controller for actions related to Newspaper
 */
class Tx_Kernaarau_Controller_NewspaperController extends Tx_Extbase_MVC_Controller_ActionController {

	/**
	 * @var Tx_Kernaarau_Domain_Repository_NewspaperRepository
	 */
	protected $newspaperRepository;

    /**
    * @var Tx_Extbase_Persistence_Manager
    */
    protected $persistanceManager;

	/**
	 * Dependency injection of the Newspaper Repository
	 *
	 * @param Tx_Kernaarau_Domain_Repository_NewspaperRepository $newspaperRepository
	 * @return void
	 */
	public function injectNewspaperRepository(Tx_Kernaarau_Domain_Repository_NewspaperRepository $newspaperRepository) {
		$this->newspaperRepository = $newspaperRepository;
	}
	/**
	 * Dependency injection of the Persistence Manager
	 *
     * @param Tx_Extbase_Persistence_Manager $persistanceManager
     * @return void
     */
    public function injectPersistanceManager(Tx_Extbase_Persistence_Manager $persistanceManager) {
      $this->persistanceManager = $persistanceManager;
    }
	/**
	 * Index action for this controller. Displays newspapers.
	 *
	 * @return string The rendered view
	 */
	public function indexAction() {
/*		$pdfs = array();
		foreach (t3lib_div::getFilesInDir($this->settings['filePath'], 'pdf') as $pdf) {
			if (substr($pdf, 11, 4) != '.pdf') continue;
			$size = t3lib_div::formatSize(filesize(t3lib_div::getFileAbsFileName($this->settings['filePath']) . $pdf), 'B| kB| MB| GB');
			$key = 'KHZ' . substr($pdf, 9, 2) . '.' . substr($pdf, 4, 4);
			$pdfs[$key] = array('url' => $this->settings['filePath'] . $pdf, 'size' => $size);
            $issue = substr($pdf, 4, 4) . '.' . substr($pdf, 9, 2);
    		if ($this->newspaperRepository->countByIssue($issue) == 0) {
    			$this->newspaperRepository->add(new Tx_Kernaarau_Domain_Model_Newspaper($issue));
    			$this->persistanceManager->persistAll();
			}
            $newspaper = $this->newspaperRepository->findIssue($issue)->getFirst(); 
            $newspaper->setSize($size);
		} */
        $this->view->assign('newspapers', $this->newspaperRepository->findAll());
        $this->view->assign('ths', t3lib_div::trimExplode(',', $this->settings['tableHeaders']));
        $parts = array();
 		foreach (t3lib_div::trimExplode(',', $this->settings['splitedIssues']) as $issue) {
            $parts[substr($issue, 0, 7)] = array('file' => substr($issue, 7), 'text' => str_replace('_', ' ', substr($issue, 7)));
        }
        $this->view->assign('parts', $parts);
	}
}
?>
