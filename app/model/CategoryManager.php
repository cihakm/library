<?php

namespace App\Model;

use Nette;

/**
 * Category management.
 */
class CategoryManager {

	/** @var Nette\Database\Context */
	private $database;

	public function __construct(Nette\Database\Context $database) {
		$this->database = $database;
	}

	public function findAllCategories() {
		$row = $this->database->table('category')->fetchAll();
		return $row;
	}

}
