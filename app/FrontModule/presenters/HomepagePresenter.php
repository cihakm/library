<?php

namespace App\FrontModule\Presenters;


class HomepagePresenter extends BasePresenter {

	/** @var \App\Model\TextManager @inject */
	public $textManager;
	
	/** @var \App\Model\BookManager @inject */
	public $bookManager;

	protected function startup() {
		parent::startup();
	}

	public function renderDefault() {
		$this->template->welcome = $this->textManager->findByKey('welcome');
		$this->template->registration = $this->textManager->findByKey('registration');
		$this->template->mostBorrowed = $this->bookManager->findMostBorrowed(10);
	}


}
