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
 * The controller for actions related to Prducts
 */
class Tx_Kernaarau_Controller_ProductController extends Tx_Extbase_MVC_Controller_ActionController {

	/**
	 * @var Tx_Kernaarau_Domain_Model_ProductRepository
	 */
	protected $productRepository;
	/**
	 * Dependency injection of the Product Repository.
	 *
	 * @param Tx_Kernaarau_Domain_Repository_ProductRepository $productRepository
	 * @return void
	 */
	public function injectProductRepository(Tx_Kernaarau_Domain_Repository_ProductRepository $productRepository) {
		$this->productRepository = $productRepository;
	}
    /**
    * @var Tx_Extbase_Persistence_Manager
    */
    protected $persistanceManager;
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
	 * Index action for this controller. Displays products.
	 *
	 * @param string $letter First letter in alphabetical group or searchword.
	 * @return string The rendered view.
	 */
	public function indexAction($letter = '') {
		$letters = array();
		$letters[] = array('first' => '@');
		$l = '@';
		for ($i = ord('A'); $i <= ord('Z'); ++$i) {
			if ($this->productRepository->countInAlphaGroup(chr($i))) {
				$letters[] = array('first' => chr($i));
				$l .= chr($i);
			}
		}
		$this->view->assign('letters', $letters);
		$follow = TRUE;
		if ($search = trim(trim(t3lib_div::_GET('sw')), '\'"')) {
			$letter = strlen($search) > 1 ? '-' . $search : $search;
		} else if (!$letter) {
			$follow = FALSE;
			$letter = '@';
		}
		$this->view->assign('follow', $follow);
		if (ord($letter) != ord('-')) {
			if (stripos($l, $letter) === FALSE) $letter = '@';
			$this->view->assign('current', strtoupper($letter));
			$products = $letter == '@' ? $this->productRepository->findAll() : $this->productRepository->findInAlphaGroup($letter);
/*            if ($letter == '@') {
//        		$codes = array();
        		foreach ($products as $product) {
                    $key = preg_replace('%[^a-z0-9]%i', '', $product->getCode());  
        			$product->setKeyword($key);
			$this->persistanceManager->persistAll();
         		} */ //print_r($codes);
		} else {
			$this->view->assign('search', $search);
			$products = $this->productRepository->findWithSearchWord(substr($letter, 1));
		}
        $this->view->assign('ths', t3lib_div::trimExplode(',', $this->settings['tableHeaders']));
		$tstamp = array();
		foreach ($products as $product) {
			$tstamp[] = $product->getTstamp()->getTimestamp();
		}
		$this->view->assign('updated', strftime('%e. %B %Y', count($tstamp) ? max($tstamp) : time()));
		$this->view->assign('products', $products);
	}
}
?>
