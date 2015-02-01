<?php

namespace App\FrontModule\Presenters;

use \DataGrid\NetteDbDataSource,
	\DataGrid\Grid,
	\DataGrid\Column,
	\Nette\Application\UI\Form;

class MyProfilePresenter extends BasePresenter
{

	/** @var \App\Model\BorrowManager @inject */
	public $borrowManager;

	protected function startup()
	{
		parent::startup();
	}

	public function renderDefault()
	{

	}

	public function renderMyBooks()
	{
		$this->template->books = $this->borrowManager->findMyBooks($this->user->id);
	}

	public function renderMyData()
	{
		$this->template->mydata = $this->userManager->getUsersData($this->user->id);
	}

	public function renderEditMyData()
	{
		$form = $this['myDataForm'];
		$row = $this->userManager->findUserById(array('id' => $this->user->id));
		if (!$row) {
			$this->error('Data nenalezena.');
		}
		$form->setDefaults($row);
	}

	public function renderEditPassword()
	{

	}

	protected function createComponentMyDataForm()
	{
		$form = new Form();
		$form->addText('name', 'Jméno:')
			->setAttribute("class", "form-control")
			->addRule(Form::FILLED, "Vyplňte prosím jmméno.");
		$form->addText('surname', 'Příjmení:')
			->setAttribute("class", "form-control")
			->addRule(Form::FILLED, "Vyplňte prosím příjmení");
		$form->addText('email', 'E-mail:')
			->setAttribute("class", "form-control")
			->addRule(Form::FILLED, "Vyplňte prosím email.")
			->addRule(Form::EMAIL, "Špatný formát e-mailu.");
		$form->addText('street', 'Ulice:')
			->setAttribute("class", "form-control")
			->addRule(Form::FILLED, "Vyplňte prosím ulici");
		$form->addText('house_number', 'ČP:')
			->setAttribute("class", "form-control")
			->addRule(Form::FILLED, "Vyplňte prosím číslo popisné")
			->addRule(Form::INTEGER, "Musí být číslo");
		$form->addText('city', 'Město:')
			->setAttribute("class", "form-control")
			->addRule(Form::FILLED, "Vyplňte prosím město.");
		$form->addText('post_id', 'PSČ:')
			->setAttribute("class", "form-control")
			->addRule(Form::FILLED, "Vyplňte prosím PSČ")
			->addRule(Form::INTEGER, "Musí být číslo");;

		$presenter = $this;
		$form->addSubmit('submit', 'Uložit')
			->setAttribute('class', 'btn orange');
		$form->addSubmit('cancel', 'Zrušit')
			->setAttribute('class', 'btn cancel')
			->setValidationScope(FALSE)
			->onClick[] = function () use ($presenter) {
			$presenter->redirect(':Front:MyProfile:myData');
		};
		$form->onSuccess[] = callback($this, 'myDataFormSubmitted');
		$form->addProtection('Vypršel časový limit.'); //Prevent fr
		return $form;
	}

	protected function createComponentPasswordForm()
	{
		$form = new Form();
		$form->addPassword('passwordNew', 'Nové heslo:')
			->setAttribute("class", "form-control")
			->addRule(Form::FILLED, "Vyplňte prosím Vaše heslo.");

		$form->addPassword('passwordNew_confirm', 'Nové heslo znovu:')
			->setAttribute("class", "form-control")
			->addRule(Form::FILLED, "Vyplňte prosím znovu Vaše heslo.")
			->addRule(Form::EQUAL, 'Zadaná hesla se neschodují.', $form['passwordNew']);


		$presenter = $this;
		$form->addSubmit('submit', 'Uložit')
			->setAttribute('class', 'btn orange');
		$form->addSubmit('cancel', 'Zrušit')
			->setAttribute('class', 'btn cancel')
			->setValidationScope(FALSE)
			->onClick[] = function () use ($presenter) {
			$presenter->redirect(':Front:MyProfile:myData');
		};
		$form->onSuccess[] = callback($this, 'passwordFormSubmitted');
		$form->addProtection('Vypršel časový limit.'); //Prevent fr
		return $form;
	}

	public function myDataFormSubmitted(Form $form)
	{
		$id = (int)$this->user->id;
		$values = $form->getValues();
		if ($form->isSuccess()) {
			try {
				$this->userManager->updateUser($id, $values);
				$this->flashMessage('Data byly úspěšně uložena.', 'success');
				$this->redirect(':Front:MyProfile:myData');
			} catch (Nette\Security\AuthenticationException $e) {
				$this->getPresenter()->flashMessage($e, "error");
			}
		}
	}

	public function passwordFormSubmitted(Form $form)
	{
		$id = (int)$this->user->id;
		$values = $form->getValues();
		$pass = $values->passwordNew;
		if ($form->isSuccess()) {
			try {
				$this->userManager->updateUserPassword($id, $pass);
				$this->flashMessage('Data byly úspěšně uložena.', 'success');
				$this->redirect(':Front:MyProfile:myData');
			} catch (Nette\Security\AuthenticationException $e) {
				$this->getPresenter()->flashMessage($e, "error");
			}
		}
	}

	public function createComponentMyBooksDataGrid($name)
	{
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
