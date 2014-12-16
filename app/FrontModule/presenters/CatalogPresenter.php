<?php

namespace App\FrontModule\Presenters;

class CatalogPresenter extends BasePresenter {

	/** @var \App\Model\CatalogManager @inject */
	public $catalogManager;

	protected function startup() {
		parent::startup();
	}

	public function renderDefault() {
		$this->template->books = $this->catalogManager->findAll();
	}
	public function renderDetail($id) {
		$this->template->book = $this->catalogManager->findById($id);
	}

}
