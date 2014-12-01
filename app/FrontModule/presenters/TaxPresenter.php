<?php

namespace App\FrontModule\Presenters;

class TaxPresenter extends BasePresenter {

	/** @var \App\Model\TaxManager @inject */
	public $taxManager;

	protected function startup() {
		parent::startup();
	}

	public function renderDefault() {
		$this->template->tax =	$this->taxManager->findTax();
			
	}

}
