<?php

namespace App\Model;

use Nette;

/**
 * Borrow management.
 */
class BorrowManager
{

	/** @var Nette\Database\Context */
	private $database;

	public function __construct(Nette\Database\Context $database)
	{
		$this->database = $database;
	}

	public function getMyBooksSource($user_id)
	{
		//return $this->database->table('book_borrow');
		return $this->database->table('book_borrow')->select('book.title AS booktitle, book_borrow.*')->where('book.id = book_borrow.book_id')->where('book_borrow.user_id = ?', $user_id)->order('date');
	}

	public function getBorrowSource()
	{
		return $this->database->table('book_borrow')->select('user.name AS user_name, user.surname AS user_surname, book.title AS booktitle, book.id AS bookid, book_borrow.*')->where('book.id = book_borrow.book_id')->where('book_borrow.status', 'Vypůjčeno');
	}

	public function findMyBooks($userId)
	{
		$row = $this->database->table('book_borrow')->where('user_id', $userId)->fetchAll();
		return $row;
	}

	public function insertBookBorrow($userId, $bookId, $date, $status)
	{
		return $this->database->table('book_borrow')->insert(array(
			'user_id' => $userId,
			'book_id' => $bookId,
			'date' => $date,
			'status' => $status
		));
	}

	public function updateBorrow($id)
	{
		return $this->database->table('book_borrow')->wherePrimary($id)->update(array(
			'status' => 'Vráceno'
		));
	}

}
