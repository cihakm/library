<?php

namespace App\FrontModule\Presenters;

use \DataGrid\NetteDbDataSource,
    \DataGrid\Grid,
    \DataGrid\Column;

class MyProfilePresenter extends BasePresenter {

	/** @var \App\Model\BorrowManager @inject */
	public $borrowManager;

	protected function startup() {
		parent::startup();
	}

	public function renderDefault() {
		
	}

	public function renderMyBooks() {
		$this->template->books = $this->borrowManager->findMyBooks($this->user->id);
	}

	public function createComponentMyBooksDataGrid($name) {
		$source = new NetteDbDataSource($this->borrowManager->getMyBooksSource());
		$grid = new Grid($source, $this, $name);

		$grid->column(new Column\Date(array(
			Column\Date::ID => 'date',
			Column\Date::TEXT => 'Datum vypůjčení',
			Column\Date::FORMAT => 'j. n. Y',
			Column\Text::ORDERING => FALSE
		)));

		$grid->column(new Column\Text(array(
			Column\Date::ID => 'booktitle',
			Column\Date::TEXT => 'Kniha',
			Column\Text::ORDERING => FALSE
		)));


		$grid->column(new Column\Text(array(
			Column\Text::ID => 'status',
			Column\Text::TEXT => 'Status',
			Column\Text::ORDERING => FALSE
		)));

		return $grid;
	}

}
