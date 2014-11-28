<?php

namespace App\AdminModule\Presenters;

/**
 * Sign in/out presenters.
 */
class BasePresenter extends \Nette\Application\UI\Presenter {

	public function startup() {
		parent::startup();
		// nastaveni oddeleneho prihlasovani
		$user = $this->getUser();
		$user->getStorage()->setNamespace('admin');

		// kontrola prihlaseni
		if (!$user->isLoggedIn()) {
			$this->redirect(':Admin:Sign:in');
		}
	}

	public function beforeRender() {
		if ($this->name == "Admin:Sign") {
			$this->template->isSign = TRUE;
		} else {
			$this->template->isSign = FALSE;
		}
	}

}
