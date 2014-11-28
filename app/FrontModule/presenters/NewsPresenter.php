<?php

namespace App\FrontModule\Presenters;

class NewsPresenter extends BasePresenter {

	/** @var \App\Model\NewsManager @inject */
	public $newsManager;

	protected function startup() {
		parent::startup();
	}

	public function renderDefault() {
		$this->template->news =	$this->newsManager->findAll();
			
	}

}
