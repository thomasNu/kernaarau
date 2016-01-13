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
 * A newspaper
 */
class Tx_Kernaarau_Domain_Model_Newspaper extends Tx_Extbase_DomainObject_AbstractEntity {

	/**
	 * The newspaper's issue
	 *
	 * @var string $issue
	 */
	protected $issue = '';

	/**
	 * The newspaper's personal page on PDF
	 *
	 * @var int $page
	 */
	protected $page = 0;

	/**
	 * The newspaper's size
	 *
	 * @var string $size
	 */
	protected $size = '';

	/**
	 * The newspaper's tstamp
	 *
	 * @var DateTime $tstamp
	 */
	protected $tstamp = 0;

	/*
	 * Constructs a new newspaper
	 *
	 * @param string $issue
	*/ 
	public function __construct($issue = '') {
		$this->setIssue($issue);
	}
	/**
	 * Sets this newspaper's issue
	 *
	 * @param strig $issue
	 * @return void
	 */
	public function setIssue($issue) {
		$this->issue = $issue;
	}
	/**
	 * Returns the newspaper's issue
	 *
	 * @return string $issue
	 */
	public function getIssue() {
		return $this->issue;
	}
	/**
	 * Sets this newspaper's personal page on PDF 
	 *
	 * @param int $page
	 * @return void
	 */
	public function setPage($page) {
		$this->page = $page;
	}
	/**
	 * Returns the newspaper's personal page on PDF 
	 *
	 * @return int $page
	 */
	public function getPage() {
		return $this->page;
	}
	/**
	 * Sets this newspaper's size
	 *
	 * @param strig $size
	 * @return void
	 */
	public function setSize($size) {
		$this->size = $size;
	}
	/**
	 * Returns the newspaper's size
	 *
	 * @return string $size
	 */
	public function getSize() {
		return $this->size;
	}
	/**
	 * Returns the newspaper's tstamp 
	 *
	 * @return DateTime $tstamp
	 */
	public function getTstamp() {
		return $this->tstamp;
	}
}
?>
