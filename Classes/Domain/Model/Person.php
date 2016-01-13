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
 * A person
 */
class Tx_Kernaarau_Domain_Model_Person extends Tx_Extbase_DomainObject_AbstractEntity {

	/**
	 * The person's name
	 *
	 * @var string $name
	 */
	protected $name = '';

	/**
	 * The person's anniversary
	 *
	 * @var string $years25
	 */
	protected $years25 = '';

	/**
	 * The person's anniversary
	 *
	 * @var string $years40
	 */
	protected $years40 = '';

	/**
	 * The person's anniversary
	 *
	 * @var string $years50
	 */
	protected $years50 = '';

	/**
	 * The person's retired
	 *
	 * @var string $retired
	 */
	protected $retired = '';

	/**
	 * The person's decesed
	 *
	 * @var string $decesed
	 */
	protected $decesed = '';

	/**
	 * The product's tstamp
	 *
	 * @var DateTime $tstamp
	 */
	protected $tstamp = 0;

	/*
	 * Constructs a new person
	 *
	 * @param string $name
	*/ 
	public function __construct($name = '') {
		$this->setName($name);
	}
	
	/**
	 * Sets this person's name
	 *
	 * @param strig $name
	 * @return void
	 */
	public function setName($name) {
		$this->name = $name;
	}

	/**
	 * Returns the person's name
	 *
	 * @return string $name
	 */
	public function getName() {
		return $this->name;
	}
		
	/**
	 * Sets this person's anniversary
	 *
	 * @param string $years25
	 * @return void
	 */
	public function setYears25($years25) {
		$this->years25 = $years25;
	}

	/**
	 * Returns the person's anniversary
	 *
	 * @return string $years25
	 */
	public function getYears25() {
		return $this->years25;
	}
	
	/**
	 * Sets this person's anniversary
	 *
	 * @param string $years40
	 * @return void
	 */
	public function setYears40($years40) {
		$this->years40 = $years40;
	}

	/**
	 * Returns the person's anniversary
	 *
	 * @return string $years40
	 */
	public function getYears40() {
		return $this->years40;
	}
	
	/**
	 * Sets this person's anniversary
	 *
	 * @param string $years50
	 * @return void
	 */
	public function setYears50($years50) {
		$this->years50 = $years50;
	}

	/**
	 * Returns the person's anniversary
	 *
	 * @return string $years50
	 */
	public function getYears50() {
		return $this->years50;
	}
	
	/**
	 * Sets this person's retired
	 *
	 * @param string $retired
	 * @return void
	 */
	public function setRetired($retired) {
		$this->retired = $retired;
	}

	/**
	 * Returns the person's retired
	 *
	 * @return string $retired
	 */
	public function getRetired() {
		return $this->retired;
	}
	
	/**
	 * Sets this person's decesed 
	 *
	 * @param string $decesed
	 * @return void
	 */
	public function setDecesed($decesed) {
		$this->decesed = $decesed;
	}

	/**
	 * Returns the person's decesed 
	 *
	 * @return string $decesed
	 */
	public function getDecesed() {
		return $this->decesed;
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
