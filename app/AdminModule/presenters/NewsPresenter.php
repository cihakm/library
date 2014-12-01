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

class NewsPresenter extends BasePresenter {

	/** @var \App\Model\NewsManager @inject */
	public $newsManager;

	public function startup() {
		parent::startup();
	}

	public function renderDefault() {
		
	}

	public function createComponentNewsDataGrid($name) {
		$source = new NetteDbDataSource($this->newsManager->getNewsSource());
		$table_id = 'id';
		$grid = new Grid($source, $this, $name);

		$grid->column(new Column\Date(array(
			Column\Date::ID => 'date',
			Column\Date::TEXT => 'Datum zveřejnění',
			Column\Date::FORMAT => 'j.n.Y H:i:s' // php date format 
		)));

		$grid->column(new Column\Text(array(
			Column\Text::ID => 'title',
			Column\Text::TEXT => 'Nadpis'
		)));

		$grid->column(new Column\Text(array(
			Column\Text::ID => 'content',
			Column\Text::TEXT => 'text',
			Column\Text::CALLBACK => function($data) {
				return strlen($data['content']) > 80 ? (substr($data['content'], 0, 80) . '...') : $data['content'];
			}
		)));


		$buttons_container = new ButtonsContainer();
		$first_button = new Button();
		$first_button->setType('btn-primary')
			->setIcon('glyphicon-pencil')
			->setTitle('Editovat')
			->addAttribute('href', new Link(array(
				Link::HREF => 'News:edit',
				Link::PARAMS => array(
					'id' => '{' . $table_id . '}'
				)
		)));
		$buttons_container->addButton($first_button);

		$second_button = new Button();
		$second_button->setType('btn-danger')
			->setIcon('glyphicon-trash')
			//->setConfirm('Realy want to delete user?')
			->setTitle('Delete')
			->addAttribute('href', new Link(array(
				Link::HREF => 'deleteNew!',
				Link::PARAMS => array(
					'id' => '{' . $table_id . '}'
				)
			)))
			->addAttribute('data-confirm', 'Realy want to delete this item?');
		$buttons_container->addButton($second_button);


		$grid->column(new Column\Button(array(
			Column\Button::TEXT => 'Actions',
			Column\Button::BUTTONS_OPTION => $buttons_container
		)));

		return $grid;
	}

	public function handleDeleteNew($id) {
		$this->newsManager->removeNew($id);
		$this->flashMessage('Data were deleted.', 'success');
		$this->redrawControl();
	}

	public function renderEdit($id = 0) {
		$form = $this['newForm'];
		$row = $this->newsManager->findById(array('id' => $id))->fetch();
		if (!$row) {
			$this->error('No data found');
		}
		$form->setDefaults($row);
	}

	protected function createComponentNewForm() {
		$form = new Form();
		$form->addText('title', 'Nadpis:');
		$form->addTextarea('content', 'Text:');

		$presenter = $this;
		$form->addSubmit('submit', 'Uložit')
			->setAttribute('class', 'button submit');
		$form->addSubmit('cancel', 'Zrušit')
				->setAttribute('class', 'button cancel')
				->setValidationScope(FALSE)
			->onClick[] = function () use ($presenter) {
			$presenter->redirect(':Admin:News:');
		};
		$form->onSuccess[] = callback($this, 'newFormSubmitted');
		$form->addProtection('Time limit exceeded.'); //Prevent fr
		return $form;
	}

	public function newFormSubmitted(Form $form) {
		$id = (int) $this->getParameter('id');
		$values = $form->getValues();

		if ($form->isSuccess()) {
			if ($id > 0) {
				try {
					$this->newsManager->updateNew($id, $values);

					$this->flashMessage('Data were successfully updated.', 'success');
					$this->redirect(':Admin:News:');
				} catch (Nette\Security\AuthenticationException $e) {
					$this->getPresenter()->flashMessage($e, "error");
				}
			} else {
				try {
					$values['date'] = new DateTime();
					$this->newsManager->insertNew($values);

					$this->flashMessage('Data were successfully inserted.', 'success');
					$this->redirect(':Admin:News:');
				} catch (Nette\Security\AuthenticationException $e) {
					$this->getPresenter()->flashMessage($e, "error");
				}
			}
		}
	}

}
