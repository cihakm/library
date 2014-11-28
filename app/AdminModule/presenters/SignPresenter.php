<?php

namespace App\AdminModule\Presenters;

use Nette;

/**
 * Sign in/out presenters.
 */
class SignPresenter extends \Nette\Application\UI\Presenter {

	/** @var \App\Model\AdminUserManager @inject */
	public $adminUserManager;

	public function startup() {
		parent::startup();
		// nastaveni oddeleneho prihlasovani
		$user = $this->getUser();
		$user->getStorage()->setNamespace('admin');
	}

	public function beforeRender() {
		if ($this->name == "Admin:Sign") {
			$this->template->isSign = TRUE;
		} else {
			$this->template->isSign = FALSE;
		}
	}

	/**
	 * Sign-in form factory.
	 * @return Nette\Application\UI\Form
	 */
	protected function createComponentSignInForm() {
		$form = new Nette\Application\UI\Form;
		$form->addText('username', 'Uživatelské jméno')
			->setAttribute("class", "form-control");

		$form->addPassword('password', 'Heslo')
			->setAttribute("class", "form-control");

		$form->addSubmit('submit', 'Přihlásit')
			->setAttribute("class", "btn blue");

		$form->onSuccess[] = $this->signInFormSucceded;
		return $form;
	}

	public function signInFormSucceded($form) {
		$values = $form->getValues();

		if ($form->isSuccess()) {
			try {
				$this->adminUserManager->login($values->username, $values->password);
				$this->flashMessage('You have been successfully loged in.', 'success');
				$this->redirect(':Admin:Default:default');
			} catch (Nette\Security\AuthenticationException $e) {
				$this->getPresenter()->flashMessage($e->getMessage(), "warning");
			}
		}
	}

	public function actionOut() {
		$this->getUser()->logout();
		$this->flashMessage('You have been successfully sign out.', 'info');
		$this->redirect(':Admin:Sign:in');
	}

}
