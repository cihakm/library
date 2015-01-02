<?php

namespace App\FrontModule\Presenters;

use Nette,
    App\Model,
    Kdyby\Facebook\Facebook,
    Kdyby\Facebook\Dialog\LoginDialog,
    Kdyby\Facebook\FacebookApiException,
    Nette\Diagnostics\Debugger,
    Nette\Security\User;

/**
 * Sign in/out presenters.
 */
abstract class BasePresenter extends \Nette\Application\UI\Presenter {

	/** @var \Kdyby\Facebook\Facebook @inject */
	public $facebook;

	/** @var \App\Model\UserManager @inject */
	public $userManager;

	/** @var \App\Model\CatalogManager @inject */
	public $catalogManager;

	public function __construct() {
		parent::__construct();
	}

	protected function startup() {
		parent::startup();
		$this->user->getStorage()->setNamespace('front');
	}

	/** @return LoginDialog */
	protected function createComponentFbLogin() {
		$dialog = $this->facebook->createDialog('login');
		/** @var LoginDialog $dialog */
		$dialog->onResponse[] = function (LoginDialog $dialog) {
			$fb = $dialog->getFacebook();

			if (!$fb->getUser()) {
				$this->flashMessage("Omlouváme se, ale Facebook ověření selhalo.", "error");
				return;
			}

			/**
			 * If we get here, it means that the user was recognized
			 * and we can call the Facebook API
			 */
			try {
				$me = $fb->api('/me');
				if (!$existing = $this->userManager->findByEmail($me['email'])) {
					/**
					 * Variable $me contains all the public information about the user
					 * including facebook id, name and email, if he allowed you to see it.
					 */
					/* Register user, if his email isn't in db */
					$existing = $this->userManager->registerFromFacebook($fb->getUser(), $fb->getAccessToken(), $me);
				}
				/**
				 * You should save the access token to database for later usage.
				 *
				 * You will need it when you'll want to call Facebook API,
				 * when the user is not logged in to your website,
				 * with the access token in his session.
				 */
				/* Update user fb info if user is registred normaly */
				$this->userManager->updateFacebookAccess($fb->getUser(), $fb->getAccessToken(), $me['email']);

				/**
				 * Nette\Security\User accepts not only textual credentials,
				 * but even an identity instance!
				 */
				$this->getUser()->login(new \Nette\Security\Identity($existing->id, $existing->role, $existing));
				/**
				 * You can celebrate now! The user is authenticated :)
				 */
			} catch (FacebookApiException $e) {
				/**
				 * You might wanna know what happened, so let's log the exception.
				 *
				 * Rendering entire bluescreen is kind of slow task,
				 * so might wanna log only $e->getMessage(), it's up to you
				 */
				Debugger::log($e, 'facebook');
				$this->flashMessage("Omlouváme se, ale něco je špatně. Již pracujeme na opravách.", "error");
			}
			$this->flashMessage("Byl jste úspěšně přihlášen");
			$this->redirect(':Front:Homepage:default');
		};

		return $dialog;
	}

	/**
	 * Registration form factory.
	 * @return Nette\Application\UI\Form
	 */
	protected function createComponentRegForm() {
		$form = new Nette\Application\UI\Form;

		$form->addText('name', 'Vaše jméno')
			->setAttribute("placeholder", "Vaše jméno")
			->setAttribute("class", "form-control")
			->addRule(Nette\Forms\Form::FILLED, "Vyplňte prosím Vaše jméno.");

		$form->addText('surname', 'Vaše příjmení')
			->setAttribute("placeholder", "Vaše příjmení")
			->setAttribute("class", "form-control")
			->addRule(Nette\Forms\Form::FILLED, "Vyplňte prosím Vaše příjmení.");


		$form->addText('mail', 'Váš e-mail')
			->setType('email')
			->setAttribute("placeholder", "Váš e-mail")
			->setAttribute("class", "form-control")
			->addRule(Nette\Forms\Form::FILLED, "Vyplňte prosím Váš e-mail.")
			->addRule(Nette\Forms\Form::EMAIL, "Špatný formát emailu.");


		$form->addPassword('password', 'Heslo')
			->setAttribute("placeholder", "Heslo")
			->setAttribute("class", "form-control")
			->addRule(Nette\Forms\Form::FILLED, "Vyplňte prosím Vaše heslo.");

		$form->addPassword('password_ver', 'Heslo')
			->setAttribute("placeholder", "Heslo znovu")
			->setAttribute("class", "form-control")
			->addRule(Nette\Forms\Form::FILLED, "Vyplňte prosím znovu Vaše heslo.")
			->addRule(Nette\Forms\Form::EQUAL, 'Zadaná hesla se neschodují.', $form['password']);

		$form->addSubmit('submit', 'Registrovat')
			->setAttribute("class", "btn");

		$form->onSuccess[] = $this->regFormSuccess;
		return $form;
	}

	public function regFormSuccess($form) {
		$values = $form->getValues();

		if ($form->isSuccess()) {
			try {
				$this->userManager->registerUser($values->name, $values->surname, $values->mail, $values->password);
				$this->flashMessage('Byl jste úspěšně zaregistrován.', 'success');
				$this->redirect(':Front:Homepage:default');
			} catch (Nette\Security\AuthenticationException $e) {
				$this->getPresenter()->flashMessage($e->getMessage(), "danger");
			}
		}
	}

	protected function createComponentSearchForm() {
		$form = new Nette\Application\UI\Form;

		$form->addText('search', 'Hledaný výraz')
			->setAttribute('placeholder', 'Zadejte jméno autora nebo název knihy')
			->setAttribute('class', 'form-control');

		$form->addSubmit('submit', 'Hledat')
			->setAttribute("class", "btn");

		$form->onSuccess[] = $this->searchFormSuccess;
		return $form;
	}

	public function searchFormSuccess($form) {
		$values = $form->getValues();

		if ($form->isSuccess()) {
			try {
			//	$this->catalogManager->findByKey();
				$this->redirect(':Front:Search:default', $values->search);
			} catch (Nette\Security\AuthenticationException $e) {
				$this->getPresenter()->flashMessage($e->getMessage(), "danger");
			}
		}
	}

	/**
	 * Sign-in form factory.
	 * @return Nette\Application\UI\Form
	 */
	protected function createComponentSignInForm() {
		$form = new Nette\Application\UI\Form;

		$form->addText('email', 'Váš e-mail')
			->setAttribute("placeholder", "Váš e-mail")
			->setAttribute("class", "form-control mail");

		$form->addPassword('password', 'Heslo')
			->setAttribute("placeholder", "Heslo")
			->setAttribute("class", "form-control pass");

		$form->addSubmit('submit', 'Přihlásit')
			->setAttribute("class", "btn");

		$form->onSuccess[] = $this->signInFormSuccess;
		return $form;
	}

	public function signInFormSuccess($form) {
		$values = $form->getValues();

		if ($form->isSuccess()) {
			try {
				$this->userManager->login($values->email, $values->password);
				//$this->getUser()->setExpiration('30 minute', TRUE);

				$this->flashMessage('Přihlášení proběhlo v pořádku', 'success');
				$this->redirect(':Front:Homepage:default');
			} catch (Nette\Security\AuthenticationException $e) {
				$this->getPresenter()->flashMessage($e->getMessage(), "danger");
			}
		}
	}

}
