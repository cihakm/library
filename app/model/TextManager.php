<?php

namespace App\Model;

use Nette;

/**
 * Text management.
 */
class TextManager {

	/** @var Nette\Database\Context */
	private $database;

	public function __construct(Nette\Database\Context $database) {
		$this->database = $database;
	}

	public function findByKey($key) {
		$row = $this->database->table('text')->where('key', $key)->fetch();
		return $row;
	}


	public function updateTax($values) {
		return $this->database->table('tax')->wherePrimary('1')->update($values);
	}
	

}
