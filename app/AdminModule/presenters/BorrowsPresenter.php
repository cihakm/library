<?php

namespace App\AdminModule\Presenters;

use \Nette\Application\UI\Form,
	\Nette\Utils\DateTime,
	\DataGrid\NetteDbDataSource,
	\DataGrid\Grid,
	\DataGrid\Column,
	\DataGrid\Components\ButtonsContainer,
	\DataGrid\Components\Button,
	\DataGrid\Components\Link;

class BorrowsPresenter extends BasePresenter
{

	/** @var \App\Model\BorrowManager @inject */
	public $borrowManager;

	/** @var \App\Model\CatalogManager @inject */
	public $catalogManager;

	public function startup()
	{
		parent::startup();
	}

	public function renderDefault()
	{

	}

	public function createComponentBorrowDataGrid($name)
	{
		$source = new NetteDbDataSource($this->borrowManager->getBorrowSource());
		$table_id = 'id';
		$book_id = 'bookid';
		$grid = new Grid($source, $this, $name);


		$grid->column(new Column\Text(array(
			Column\Text::ID => 'id',
			Column\Text::TEXT => 'Id výpůjčky',
		)));
		$grid->column(new Column\Date(array(
			Column\Text::ID => 'date',
			Column\Text::TEXT => 'Datum vypůjčení',
			Column\Date::FORMAT => 'j. n. Y',
		)));
		$grid->column(new Column\Text(array(
			Column\Text::ID => 'booktitle',
			Column\Text::TEXT => 'Kniha',
		)));
		$grid->column(new Column\Text(array(
			Column\Text::ID => 'user_name',
			Column\Text::TEXT => 'Jméno',
		)));
		$grid->column(new Column\Text(array(
			Column\Text::ID => 'user_surname',
			Column\Text::TEXT => 'Příjmení',
		)));
		$grid->column(new Column\Text(array(
			Column\Text::ID => 'status',
			Column\Text::TEXT => 'Status',
			Column\Text::ORDERING => FALSE
		)));


		$buttons_container = new ButtonsContainer();
		$first_button = new Button();
		$first_button->setType('btn-primary')
			->setIcon('glyphicon-pencil')
			->setTitle('Vráceno')
			->addAttribute('href', new Link(array(
				Link::HREF => 'borrowBack!',
				Link::PARAMS => array(
					'book_id' => '{' . $book_id . '}',
					'borrow_id' => '{' . $table_id . '}'
				)
			)));
		$buttons_container->addButton($first_button);
		$grid->column(new Column\Button(array(
			Column\Button::TEXT => 'Actions',
			Column\Button::BUTTONS_OPTION => $buttons_container
		)));

		return $grid;
	}

	public function handleBorrowBack($book_id, $borrow_id)
	{
		$this->catalogManager->updateBookInfoPlus($book_id);
		$this->borrowManager->updateBorrow($borrow_id);
		$this->redrawControl('dataGrid');

	}

	public function renderEdit($id = 0)
	{
		$form = $this['textForm'];
		$row = $this->textManager->findById(array('id' => $id))->fetch();
		if (!$row) {
			$this->error('No data found');
		}
		$form->setDefaults($row);
	}

	protected function createComponentTextForm()
	{
		$form = new Form();
		$form->addTextarea('text', 'Text:')
			->setAttribute("class", "ckeditor");

		$presenter = $this;
		$form->addSubmit('submit', 'Uložit')
			->setAttribute('class', 'button submit');
		$form->addSubmit('cancel', 'Zrušit')
			->setAttribute('class', 'button cancel')
			->setValidationScope(FALSE)
			->onClick[] = function () use ($presenter) {
			$presenter->redirect(':Admin:Texts:');
		};
		$form->onSuccess[] = callback($this, 'textFormSubmitted');
		$form->addProtection('Time limit exceeded.'); //Prevent fr
		return $form;
	}

	public function textFormSubmitted(Form $form)
	{
		$id = (int)$this->getParameter('id');
		$values = $form->getValues();

		if ($form->isSuccess()) {
			try {
				$this->textManager->updateText($id, $values);

				$this->flashMessage('Data were successfully updated.', 'success');
				$this->redirect(':Admin:Texts:');
			} catch (Nette\Security\AuthenticationException $e) {
				$this->getPresenter()->flashMessage($e, "error");
			}
		}
	}

}
