<?php

namespace App\Model;

use Nette;

/**
 * News management.
 */
class NewsManager {

	/** @var Nette\Database\Context */
	private $database;

	public function __construct(Nette\Database\Context $database) {
		$this->database = $database;
	}

	public function findAll() {
		$row = $this->database->table('new')->fetchAll();
		return $row;
	}

	public function getNewsSource() {
		return $this->database->table('new');
	}

	public function findById(array $id) {
		return $this->database->table('new')->wherePrimary($id);
	}

	public function updateNew($id, $values) {
		return $this->database->table('new')->wherePrimary($id)->update($values);
	}
	
	public function insertNew($values) {
		return $this->database->table('new')->insert($values);
	}
	
	public function removeNew($id) {
		return $this->database->table('new')->wherePrimary($id)->delete();
	}

}
