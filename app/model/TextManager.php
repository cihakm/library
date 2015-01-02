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

	public function getTextsSource() {
		return $this->database->table('text');
	}
	
	public function findById(array $id) {
		return $this->database->table('text')->wherePrimary($id);
	}

	public function updateText($id,$values) {
		return $this->database->table('text')->wherePrimary($id)->update($values);
	}

}
