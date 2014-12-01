<?php

namespace App\Model;

use Nette;

/**
 * Tax management.
 */
class TaxManager {

	/** @var Nette\Database\Context */
	private $database;

	public function __construct(Nette\Database\Context $database) {
		$this->database = $database;
	}

	public function findTax() {
		$row = $this->database->table('tax')->fetch();
		return $row;
	}


	public function updateTax($values) {
		return $this->database->table('tax')->wherePrimary('1')->update($values);
	}
	

}
