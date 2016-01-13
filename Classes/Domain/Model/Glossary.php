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
 * A product
 */
class Tx_Kernaarau_Domain_Model_Glossary extends Tx_Extbase_DomainObject_AbstractEntity {

	/**
	 * The product's code
	 *
	 * @var string $code
	 */
	protected $code = '';

	/**
	 * The product's description
	 *
	 * @var string $description
	 */
	protected $description = '';

	/**
	 * The product's links
	 *
	 * @var string $links
	 */
	protected $links = '';

	/**
	 * The product's columns
	 *
	 * @var string $columns
	 */
	protected $columns = '';

	/**
	 * The product's tstamp
	 *
	 * @var DateTime $tstamp
	 */
	protected $tstamp = 0;

	/*
	 * Constructs a new product
	 *
	 * @param string $code
	*/ 
	public function __construct($code = '') {
		$this->setCode($code);
	}
	
	/**
	 * Sets this product's code
	 *
	 * @param strig $code
	 * @return void
	 */
	public function setCode($code) {
		$this->code = $code;
	}

	/**
	 * Returns the product's code
	 *
	 * @return string $code
	 */
	public function getCode() {
		return $this->code;
	}
		
	/**
	 * Sets this product's description
	 *
	 * @param string $description
	 * @return void
	 */
	public function setDescription($description) {
		$this->description = $description;
	}

	/**
	 * Returns the product's description
	 *
	 * @return string $description
	 */
	public function getDescription() {
		return $this->description;
	}
	
	/**
	 * Sets this product's links
	 *
	 * @param string $links
	 * @return void
	 */
	public function setLinks($links) {
		$this->links = $links;
	}

	/**
	 * Returns the product's links
	 *
	 * @return string $links
	 */
	public function getLinks() {
		return $this->links;
	}
	
	/**
	 * Sets this product's columns 
	 *
	 * @param string $columns
	 * @return void
	 */
	public function setColumns($columns) {
		$this->columns = $columns;
	}

	/**
	 * Returns the product's columns 
	 *
	 * @return string $columns
	 */
	public function getColumns() {
		return $this->columns;
	}
	/**
	 * Returns the product's tstamp 
	 *
	 * @return DateTime $tstamp
	 */
	public function getTstamp() {
		return $this->tstamp;
	}
}
?>
