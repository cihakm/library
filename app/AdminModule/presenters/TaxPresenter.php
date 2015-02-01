<?php

namespace App\AdminModule\Presenters;

use \Nette\Application\UI\Form;

class TaxPresenter extends BasePresenter {

	/** @var \App\Model\TaxManager @inject */
	public $taxManager;

	public function startup() {
		parent::startup();
	}

	public function renderDefault() {
		$this->template->tax = $this->taxManager->findTax();
	}

	public function renderEdit() {
		$form = $this['taxForm'];
		$row = $this->taxManager->findTax();
		if (!$row) {
			$this->error('No data found');
		}
		$form->setDefaults($row);
	}

	protected function createComponentTaxForm() {
		$form = new Form();
		$form->addTextarea('content', 'Obsah:')
			->setAttribute("class", "ckeditor")
			->addRule(Form::FILLED, "Vyplňte prosím obsah.");

		$presenter = $this;
		$form->addSubmit('submit', 'Uložit')
			->setAttribute('class', 'button submit');
		$form->addSubmit('cancel', 'Zrušit')
				->setAttribute('class', 'button cancel')
				->setValidationScope(FALSE)
			->onClick[] = function () use ($presenter) {
			$presenter->redirect(':Admin:Tax:');
		};
		$form->onSuccess[] = callback($this, 'taxFormSubmitted');
		$form->addProtection('Time limit exceeded.'); //Prevent fr
		return $form;
	}

	public function taxFormSubmitted(Form $form) {
		$values = $form->getValues();
		try {
			$this->taxManager->updatetax($values);

			$this->flashMessage('Data byla uložena.', 'success');
			$this->redirect(':Admin:Tax:');
		} catch (Nette\Security\AuthenticationException $e) {
			$this->getPresenter()->flashMessage($e, "error");
		}
	}

}
