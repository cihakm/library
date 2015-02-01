<?php

namespace App\FrontModule\Presenters;
/**
 * Sign in/out presenters.
 */
class SignPresenter extends BasePresenter {
	public function actionOut() {
		$this->getUser()->logout();
		$this->flashMessage('Odhlášení proběhlo úspěšně.', 'info');
		$this->redirect(':Front:Homepage:default');
	}

}
