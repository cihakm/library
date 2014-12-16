<?php

namespace App\Model;

use Nette;

/**
 * Book management.
 */
class BookManager {

	/** @var Nette\Database\Context */
	private $database;

	public function __construct(Nette\Database\Context $database) {
		$this->database = $database;
	}

	public function findMostBorrowed($limit) {
		$row = $this->database->table('book')->order('borrow DESC')->limit($limit)->fetchAll();
		return $row;
	}

	

}
