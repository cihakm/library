<?php

namespace App\AdminModule\Presenters;

use \Nette\Application\UI\Form,
    \Nette\Utils\DateTime,
    \DataGrid\NetteDbDataSource,
    \DataGrid\Grid,
    \DataGrid\Column,
    \DataGrid\Components\ButtonsContainer,
    \DataGrid\Components\Button,
    \DataGrid\Components\Link;

class TextsPresenter extends BasePresenter {

	/** @var \App\Model\TextManager @inject */
	public $textManager;

	public function startup() {
		parent::startup();
	}

	public function renderDefault() {
		
	}

	public function createComponentTextDataGrid($name) {
		$source = new NetteDbDataSource($this->textManager->getTextsSource());
		$table_id = 'id';
		$grid = new Grid($source, $this, $name);

		$grid->column(new Column\Text(array(
			Column\Text::ID => 'text',
			Column\Text::TEXT => 'text',
			Column\Text::CALLBACK => function($data) {
				return strlen($data['text']) > 100 ? (substr($data['text'], 0, 100) . '...') : $data['text'];
			},
			Column\Text::ORDERING => FALSE
		)));
		$grid->column(new Column\Text(array(
			Column\Text::ID => 'key',
			Column\Text::TEXT => 'key',
			Column\Text::ORDERING => FALSE
		)));


		$buttons_container = new ButtonsContainer();
		$first_button = new Button();
		$first_button->setType('btn-primary')
			->setIcon('glyphicon-pencil')
			->setTitle('Editovat')
			->addAttribute('href', new Link(array(
				Link::HREF => 'Texts:edit',
				Link::PARAMS => array(
					'id' => '{' . $table_id . '}'
				)
		)));
		$buttons_container->addButton($first_button);
		$grid->column(new Column\Button(array(
			Column\Button::TEXT => 'Actions',
			Column\Button::BUTTONS_OPTION => $buttons_container
		)));

		return $grid;
	}

	public function renderEdit($id = 0) {
		$form = $this['textForm'];
		$row = $this->textManager->findById(array('id' => $id))->fetch();
		if (!$row) {
			$this->error('No data found');
		}
		$form->setDefaults($row);
	}

	protected function createComponentTextForm() {
		$form = new Form();
		$form->addTextarea('text', 'Text:')
			->setAttribute("class", "ckeditor");

		$presenter = $this;
		$form->addSubmit('submit', 'Uložit')
			->setAttribute('class', 'button submit');
		$form->addSubmit('cancel', 'Zrušit')
				->setAttribute('class', 'button cancel')
				->setValidationScope(FALSE)
			->onClick[] = function () use ($presenter) {
			$presenter->redirect(':Admin:Texts:');
		};
		$form->onSuccess[] = callback($this, 'textFormSubmitted');
		$form->addProtection('Time limit exceeded.'); //Prevent fr
		return $form;
	}

	public function textFormSubmitted(Form $form) {
		$id = (int) $this->getParameter('id');
		$values = $form->getValues();

		if ($form->isSuccess()) {
			try {
				$this->textManager->updateText($id, $values);

				$this->flashMessage('Data were successfully updated.', 'success');
				$this->redirect(':Admin:Texts:');
			} catch (Nette\Security\AuthenticationException $e) {
				$this->getPresenter()->flashMessage($e, "error");
			}
		}
	}

}
