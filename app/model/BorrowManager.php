<?php

namespace App\Model;

use Nette;

/**
 * Borrow management.
 */
class BorrowManager {

	/** @var Nette\Database\Context */
	private $database;

	public function __construct(Nette\Database\Context $database) {
		$this->database = $database;
	}

	public function getMyBooksSource() {
		//return $this->database->table('book_borrow');
		return $this->database->table('book_borrow')->select('book.title AS booktitle, book_borrow.*')->where('book.id = book_borrow.book_id')->order('date');
	}

	public function findMyBooks($userId) {
		$row = $this->database->table('book_borrow')->where('user_id', $userId)->fetchAll();
		return $row;
	}

	public function insertBookBorrow($userId, $bookId, $date, $status) {
		return $this->database->table('book_borrow')->insert(array(
				'user_id' => $userId,
				'book_id' => $bookId,
				'date' => $date,
				'status' => $status
		));
	}

}
