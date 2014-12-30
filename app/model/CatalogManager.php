<?php

namespace App\Model;

use Nette;

/**
 * Catalog management.
 */
class CatalogManager {

	/** @var Nette\Database\Context */
	private $database;

	public function __construct(Nette\Database\Context $database) {
		$this->database = $database;
	}

	public function findCategoryBooks($catId) {
		$row = $this->database->table('book')->where("category_id", $catId)->fetchAll();
		return $row;
	}
	
	public function findBookCategory($catId) {
		$row = $this->database->table('category')->where("id", $catId)->fetch();
		return $row;
	}

	public function findById($id) {
		$row = $this->database->table('book')->where('id', $id)->fetch();
		return $row;
	}


	public function updateTax($values) {
		return $this->database->table('tax')->wherePrimary('1')->update($values);
	}
	

}
