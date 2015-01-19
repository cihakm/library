<?php

namespace App\Model;

use Nette;

/**
 * Catalog management.
 */
class CatalogManager
{

	/** @var Nette\Database\Context */
	private $database;

	public function __construct(Nette\Database\Context $database)
	{
		$this->database = $database;
	}

	public function findCategoryBooks($catId)
	{
		$row = $this->database->table('book')->where("category_id", $catId)->fetchAll();
		return $row;
	}

	public function findBookCategory($catId)
	{
		$row = $this->database->table('category')->wherePrimary($catId)->fetch();
		return $row;
	}

	public function findLastId()
	{
		$row = $this->database->table('book')->order('id DESC')->fetch();
		return $row->id;
	}

	public function findById($id)
	{
		$row = $this->database->table('book')->wherePrimary($id)->fetch();
		return $row;
	}

	public function findPublisherById($id)
	{
		$row = $this->database->table('publisher')->wherePrimary($id)->fetch();
		return $row;
	}

	public function findCategoryById($id)
	{
		$row = $this->database->table('category')->wherePrimary($id)->fetch();
		return $row;
	}

	public function findAuthorById($id)
	{
		$row = $this->database->table('author')->wherePrimary($id)->fetch();
		return $row;
	}

	public function findBookById($id)
	{
		$row = $this->database->table('book')->wherePrimary($id)->fetch();
		return $row;
	}

	public function findBookByKey($key)
	{
		return $this->database->table('book')->select('author.name, book.*')->where('book.title LIKE ? OR author.name LIKE ?', '%' . $key . '%', '%' . $key . '%')->order('book.title');
	}

	public function countBookByKey($key)
	{
		return $this->database->table('book')->select('author.name, book.*')->where('book.title LIKE ? OR author.name LIKE ?', '%' . $key . '%', '%' . $key . '%')->count();
	}


	public function getAuthors()
	{
		$row = $this->database->table('author')->fetchPairs('id', 'name');
		return $row;
	}

	public function getPublishers()
	{
		$row = $this->database->table('publisher')->fetchPairs('id', 'name');
		return $row;
	}

	public function getCategories()
	{
		$row = $this->database->table('category')->fetchPairs('id', 'name');
		return $row;
	}

	public function updatePublisher($id, $values)
	{
		return $this->database->table('publisher')->wherePrimary($id)->update($values);
	}

	public function insertPublisher($values)
	{
		return $this->database->table('publisher')->insert($values);
	}

	public function insertBook($values)
	{
		return $this->database->table('book')->insert($values);
	}

	public function updateCategory($id, $values)
	{
		return $this->database->table('category')->wherePrimary($id)->update($values);
	}

	public function updateAuthor($id, $values)
	{
		return $this->database->table('author')->wherePrimary($id)->update($values);
	}

	public function updateBook($id, $values)
	{
		return $this->database->table('book')->wherePrimary($id)->update($values);
	}

	public function updateBookInfo($id)
	{
		return $this->database->table('book')->wherePrimary($id)->update(array(
			'count' => new \Nette\Database\SqlLiteral('count - 1'),
			'borrow' => new \Nette\Database\SqlLiteral('borrow + 1')
		));
	}
	public function updateBookInfoPlus($id)
	{
		return $this->database->table('book')->wherePrimary($id)->update(array(
			'count' => new \Nette\Database\SqlLiteral('count + 1')
		));
	}


	public function insertCategory($values)
	{
		return $this->database->table('category')->insert($values);
	}

	public function insertAuthor($values)
	{
		return $this->database->table('author')->insert($values);
	}

	public function getPublishersSource()
	{
		return $this->database->table('publisher')->order('name');
	}

	public function getCategoriesSource()
	{
		return $this->database->table('category')->order('name');
	}

	public function getAuthorsSource()
	{
		return $this->database->table('author')->order('name');
	}

	public function getBooksSource()
	{
		return $this->database->table('book')->select('author.name AS authorname, category.name AS categoryname, book.*')->where('author.id = book.author_id')->where('category.id = book.category_id')->order('title');
	}

	public function removePublisher($id)
	{
		return $this->database->table('publisher')->wherePrimary($id)->delete();
	}

	public function countBooksInCategory($categoryId)
	{
		return $this->database->table('book')->where('category_id', $categoryId)->count();
	}

	public function countPublishersOnBook($publisherId)
	{
		return $this->database->table('book')->where('publisher_id', $publisherId)->count();
	}

	public function countAuthorsOnBook($authorId)
	{
		return $this->database->table('book')->where('author_id', $authorId)->count();
	}

	public function removeCategory($id)
	{
		return $this->database->table('category')->wherePrimary($id)->delete();
	}

	public function removeAuthor($id)
	{
		return $this->database->table('author')->wherePrimary($id)->delete();
	}

	public function removeBook($id)
	{
		return $this->database->table('book')->wherePrimary($id)->delete();
	}

}
