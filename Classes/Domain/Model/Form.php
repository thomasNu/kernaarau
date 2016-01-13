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
 * A form
 */
class Tx_Kernaarau_Domain_Model_Form extends Tx_Extbase_DomainObject_AbstractEntity {

	/**
	 * The form's caption
	 *
	 * @var sring $caption
	 */
	protected $caption = '';

	/**
	 * The form's keyPendantSilver
	 *
	 * @var integer $keyPendantSilver
	 */
	protected $keyPendantSilver = 1;

	/**
	 * The form's keyPendantGold
	 *
	 * @var integer $keyPendantGold
	 */
	protected $keyPendantGold = 0;

	/**
	 * The form's $folkloreCD
	 *
	 * @var integer $folkloreCD
	 */
	protected $folkloreCD = 0;

	/**
	 * The form's $title
	 *
	 * @var string $title
	 */
	protected $title = '';

	/**
	 * The form's $firstName
	 *
	 * @var string $firstName
	 */
	protected $firstName = '';

	/**
	 * The form's $lastName
	 *
	 * @var string $lastName
	 */
	protected $lastName = '';

	/**
	 * The form's $address
	 *
	 * @var string $address
	 */
	protected $address = '';

	/**
	 * The form's $postalCode
	 *
	 * @var string $postalCode
	 */
	protected $postalCode = '';

	/**
	 * The form's $town
	 *
	 * @var string $town
	 */
	protected $town = '';

	/**
	 * The form's $country
	 *
	 * @var string $country
	 */
	protected $country = '';

	/**
	 * The form's $email
	 *
	 * @var string $email
	 */

	/**
	 * The form's $phone
	 *
	 * @var string $phone
	 */
	protected $phone = '';

	/**
	 * The form's $note
	 *
	 * @var string $note
	 */
	protected $note = '';

	/**
	 * The form's $attachments
	 *
	 * @var string $attachments
	 */
	protected $attachments = '';
 




	/**
	 * The form's tstamp
	 *
	 * @var DateTime $tstamp
	 */
	protected $tstamp = 0;

	/*
	 * Constructs a new form
	 *
	 * @param string $code
	*/ 
	public function __construct($code = '') {
		$this->setCode($code);
	}
	/**
	 * Returns the form's caption 
	 *
	 * @return integer $caption
	 */
	public function getCaption() {
		return $this->caption;
	}
	/**
	 * Sets this form's caption
	 *
	 * @param integer $caption
	 * @return void
	 */
	public function setCaption($caption) {
		$this->caption = $caption;
	}
	/**
	 * Returns the form's keyPendantSilver 
	 *
	 * @return integer $keyPendantSilver
	 */
	public function getKeyPendantSilver() {
		return $this->keyPendantSilver;
	}
	/**
	 * Sets this form's keyPendantSilver
	 *
	 * @param integer $keyPendantSilver
	 * @return void
	 */
	public function setKeyPendantSilver($keyPendantSilver) {
		$this->keyPendantSilver = $keyPendantSilver;
	}
	/**
	 * Returns the form's keyPendantSilver 
	 *
	 * @return integer $keyPendantSilver
	 */
	public function getKeyPendantSilver() {
		return $this->keyPendantSilver;
	}
	/**
	 * Sets this form's keyPendantSilver
	 *
	 * @param integer $keyPendantSilver
	 * @return void
	 */
	public function setKeyPendantSilver($keyPendantSilver) {
		$this->keyPendantSilver = $keyPendantSilver;
	}
	/**
	 * Returns the form's keyPendantGold 
	 *
	 * @return integer $keyPendantGold
	 */
	public function getKeyPendantGold() {
		return $this->keyPendantGold;
	}
	/**
	 * Sets this form's keyPendantGold
	 *
	 * @param integer $keyPendantGold
	 * @return void
	 */
	public function setKeyPendantGold($keyPendantGold) {
		$this->keyPendantGold = $keyPendantGold;
	}
	/**
	 * Returns the form's folkloreCD 
	 *
	 * @return integer $folkloreCD
	 */
	public function getFolkloreCD() {
		return $this->folkloreCD;
	}
	/**
	 * Sets this form's folkloreCD
	 *
	 * @param integer $folkloreCD
	 * @return void
	 */
	public function setFolkloreCD($folkloreCD) {
		$this->folkloreCD = $folkloreCD;
	}
	/**
	 * Returns the form's title 
	 *
	 * @return string $title
	 */
	public function getTitle() {
		return $this->title;
	}
	/**
	 * Sets this form's title
	 *
	 * @param string $title
	 * @return void
	 */
	public function setTitle($title) {
		$this->title = $title;
	}
	/**
	 * Returns the form's firstName 
	 *
	 * @return string $firstName
	 */
	public function getFirstName() {
		return $this->firstName;
	}
	/**
	 * Sets this form's firstName
	 *
	 * @param string $firstName
	 * @return void
	 */
	public function setFirstName($firstName) {
		$this->firstName = $firstName;
	}
	/**
	 * Returns the form's lastName 
	 *
	 * @return string $lastName
	 */
	public function getLastName() {
		return $this->lastName;
	}
	/**
	 * Sets this form's lastName
	 *
	 * @param string $lastName
	 * @return void
	 */
	public function setLastName($lastName) {
		$this->lastName = $lastName;
	}
	/**
	 * Returns the form's address 
	 *
	 * @return string $address
	 */
	public function getAddress() {
		return $this->address;
	}
	/**
	 * Sets this form's address
	 *
	 * @param string $address
	 * @return void
	 */
	public function setAddress($address) {
		$this->address = $address;
	}
	/**
	 * Returns the form's postalCode 
	 *
	 * @return string $postalCode
	 */
	public function getpostalCode() {
		return $this->postalCode;
	}
	/**
	 * Sets this form's postalCode
	 *
	 * @param string $postalCode
	 * @return void
	 */
	public function setpostalCode($postalCode) {
		$this->postalCode = $postalCode;
	}
	/**
	 * Returns the form's town 
	 *
	 * @return string $town
	 */
	public function getTown() {
		return $this->town;
	}
	/**
	 * Sets this form's town
	 *
	 * @param string $town
	 * @return void
	 */
	public function setTown($town) {
		$this->town = $town;
	}
	/**
	 * Returns the form's country 
	 *
	 * @return string $country
	 */
	public function getCountry() {
		return $this->country;
	}
	/**
	 * Sets this form's country
	 *
	 * @param string $country
	 * @return void
	 */
	public function setCountry($country) {
		$this->country = $country;
	}
	/**
	 * Returns the form's email 
	 *
	 * @return string $email
	 */
	public function getEmail() {
		return $this->email;
	}
	/**
	 * Sets this form's email
	 *
	 * @param string $email
	 * @return void
	 */
	public function setEmail($email) {
		$this->email = $email;
	}
	/**
	 * Returns the form's phone 
	 *
	 * @return string $phone
	 */
	public function getPhone() {
		return $this->phone;
	}
	/**
	 * Sets this form's phone
	 *
	 * @param string $phone
	 * @return void
	 */
	public function setPhone($phone) {
		$this->phone = $phone;
	}
	/**
	 * Returns the form's note 
	 *
	 * @return string $note
	 */
	public function getNote() {
		return $this->note;
	}
	/**
	 * Sets this form's note
	 *
	 * @param string $note
	 * @return void
	 */
	public function setNote($note) {
		$this->note = $note;
	}
	/**
	 * Returns the form's attachments 
	 *
	 * @return string $attachments
	 */
	public function getAttachments() {
		return $this->attachments;
	}
	/**
	 * Sets this form's attachments
	 *
	 * @param string $attachments
	 * @return void
	 */
	public function setAttachments($attachments) {
		$this->attachments = $attachments;
	}





	/**
	 * Returns the form's tstamp 
	 *
	 * @return integer $tstamp
	 */
	public function getTstamp() {
		return $this->tstamp;
	}
	/**
	 * Sets this form's tstamp
	 *
	 * @param DateTime $tstamp
	 * @return void
	 */
	public function setTstamp($tstamp) {
		$this->tstamp = $tstamp;
	}

	/**
	 * Returns the form's code
	 *
	 * @return string $code
	 */
	public function getCode() {
		return $this->code;
	}
		
	/**
	 * Sets this form's columns 
	 *
	 * @param string $columns
	 * @return void
	 */
	public function setColumns($columns) {
		$this->columns = $columns;
	}

	/**
	 * Returns the form's columns 
	 *
	 * @return string $columns
	 */
	public function getColumns() {
		return $this->columns;
	}
}
?>

