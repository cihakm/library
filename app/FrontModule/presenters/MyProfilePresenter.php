<?php

namespace App\FrontModule\Presenters;

use \DataGrid\NetteDbDataSource,
    \DataGrid\Grid,
    \DataGrid\Column,
    \Nette\Application\UI\Form;

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

	public function renderMyData() {
		$this->template->mydata = $this->userManager->getUsersData($this->user->id);
	}

	public function renderEditMyData() {
		$form = $this['myDataForm'];
		$row = $this->userManager->findUserById(array('id' => $this->user->id));
		if (!$row) {
			$this->error('No data found');
		}
		$form->setDefaults($row);
	}

	public function renderEditPassword() {
		
	}

	protected function createComponentMyDataForm() {
		$form = new Form();
		$form->addText('name', 'Jméno:');
		$form->addText('surname', 'Příjmení:');
		$form->addText('email', 'E-mail:');
		$form->addText('street', 'Ulice:');
		$form->addText('house_number', 'ČP:');
		$form->addText('city', 'Město:');
		$form->addText('post_id', 'PSČ:');

		$presenter = $this;
		$form->addSubmit('submit', 'Uložit')
			->setAttribute('class', 'button submit');
		$form->addSubmit('cancel', 'Zrušit')
				->setAttribute('class', 'button cancel')
				->setValidationScope(FALSE)
			->onClick[] = function () use ($presenter) {
			$presenter->redirect(':Front:MyProfile:myData');
		};
		$form->onSuccess[] = callback($this, 'myDataFormSubmitted');
		$form->addProtection('Time limit exceeded.'); //Prevent fr
		return $form;
	}

	protected function createComponentPasswordForm() {
		$form = new Form();
		$form->addText('passwordNew', 'Nové heslo:');
		$form->addText('passwordNew_confirm', 'Nové heslo znovu:');


		$presenter = $this;
		$form->addSubmit('submit', 'Uložit')
			->setAttribute('class', 'button submit');
		$form->addSubmit('cancel', 'Zrušit')
				->setAttribute('class', 'button cancel')
				->setValidationScope(FALSE)
			->onClick[] = function () use ($presenter) {
			$presenter->redirect(':Front:MyProfile:myData');
		};
		$form->onSuccess[] = callback($this, 'passwordFormSubmitted');
		$form->addProtection('Time limit exceeded.'); //Prevent fr
		return $form;
	}

	public function myDataFormSubmitted(Form $form) {
		$id = (int) $this->user->id;
		$values = $form->getValues();
		if ($form->isSuccess()) {
			try {
				$this->userManager->updateUser($id, $values);
				$this->flashMessage('Data were successfully updated.', 'success');
				$this->redirect(':Front:MyProfile:myData');
			} catch (Nette\Security\AuthenticationException $e) {
				$this->getPresenter()->flashMessage($e, "error");
			}
		}
	}

	public function passwordFormSubmitted(Form $form) {
		$id = (int) $this->user->id;
		$values = $form->getValues();
		$pass = $values->passwordNew;
		if ($form->isSuccess()) {
			try {
				$this->userManager->updateUserPassword($id, $pass);
				$this->flashMessage('Data were successfully updated.', 'success');
				$this->redirect(':Front:MyProfile:myData');
			} catch (Nette\Security\AuthenticationException $e) {
				$this->getPresenter()->flashMessage($e, "error");
			}
		}
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
