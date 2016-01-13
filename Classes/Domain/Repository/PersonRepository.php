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
 * A repository for person
 */
class Tx_Kernaarau_Domain_Repository_PersonRepository extends Tx_Extbase_Persistence_Repository {

	protected $defaultOrderings = array('name' => Tx_Extbase_Persistence_QueryInterface::ORDER_ASCENDING);

	/**
	 * Finds persons in alphabetical groups.
	 *
	 * @param string $firstLetter First letter of name 
	 * @return array List of persons
	 */
	public function findInAlphaGroup($firstLetter) {
		$query = $this->createQuery();
		$query->matching($query->like('name', $firstLetter . '%'));
		return $query->execute();
	} 
	/**
	 * Counts persons in alphabetical groups.
	 *
	 * @param string $firstLetter First letter of name 
	 * @return integer Count of persons
	 */
	public function countInAlphaGroup($firstLetter) {
		$query = $this->createQuery();
		$query->matching($query->like('name', $firstLetter . '%'));
		return $query->execute()->count();
	} 
}
?>
