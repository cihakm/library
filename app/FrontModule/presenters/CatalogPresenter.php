<?php

namespace App\FrontModule\Presenters;

class CatalogPresenter extends BasePresenter {

	private $categoryId = 1;

	/** @var \App\Model\CatalogManager @inject */
	public $catalogManager;

	/** @var \App\Model\CategoryManager @inject */
	public $categoryManager;

	protected function startup() {
		parent::startup();
	}

	public function handleChangeCategory($catId) {
		$this->categoryId = $catId;
		if ($this->isAjax()) {
			$this->redrawControl('category');
		} else {
			$this->redirect('this');
		}
	}

	public function handleBookBorrow($bookId) {
		$checkCount = $this->catalogManager->findBookById($bookId);
		if ($checkCount->count > 0) {
			$this->catalogManager->updateBookInfo($bookId);
			$this->catalogManager->insertBookBorrow($this->user->id, $bookId);
			if ($this->isAjax()) {
				$this->flashMessage('Informace o výpujčce byly zaslány na Váš e-mail.', 'success');
				$this->redrawControl('flashes');
			} else {
				$this->flashMessage('Informace o výpujčce byly zaslány na Váš e-mail.', 'success');
				//$this->redirect('this');
				$this->redrawControl('flashes');
			}
		} else {
			$this->flashMessage('Omlouváme se, ale požadovaná kniha není momentálně dostupná.', 'info');
			$this->redrawControl('flashes');
		}
	}

	public function renderDefault() {
		$this->template->categoryId = $this->categoryId;
		$this->template->books = $this->catalogManager->findCategoryBooks($this->categoryId);
		$this->template->category = $this->catalogManager->findBookCategory($this->categoryId);
		$this->template->categories = $this->categoryManager->findAllCategories();
	}

	public function renderDetail($id) {
		$this->template->book = $this->catalogManager->findById($id);
	}

}
