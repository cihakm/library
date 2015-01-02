<?php

namespace App\FrontModule\Presenters;

class SearchPresenter extends BasePresenter {

	/** @var \App\Model\CatalogManager @inject */
	public $catalogManager;

	protected function startup() {
		parent::startup();
	}


	public function renderDefault($key) {
		$this->template->searchKey = $key;
		$this->template->books = $this->catalogManager->findBookByKey($key);
		$this->template->booksCount = $this->catalogManager->countBookByKey($key);
		
	}


}
