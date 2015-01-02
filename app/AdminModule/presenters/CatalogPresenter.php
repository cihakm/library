<?php

namespace App\AdminModule\Presenters;

use \Nette\Application\UI\Form,
    \Nette\Utils\DateTime,
    \Nette\Image,
    \DataGrid\NetteDbDataSource,
    \DataGrid\Grid,
    \DataGrid\Column,
    \DataGrid\Components\ButtonsContainer,
    \DataGrid\Components\Button,
    \DataGrid\Components\Link;

class CatalogPresenter extends BasePresenter {

	/** @var \App\Model\CatalogManager @inject */
	public $catalogManager;

	public function startup() {
		parent::startup();
	}

	public function renderDefault() {
		
	}

	public function createComponentPublishersDataGrid($name) {
		$source = new NetteDbDataSource($this->catalogManager->getPublishersSource());
		$table_id = 'id';
		$grid = new Grid($source, $this, $name);

		$grid->column(new Column\Text(array(
			Column\Text::ID => 'name',
			Column\Text::TEXT => 'name',
			Column\Text::ORDERING => FALSE
		)));

		$buttons_container = new ButtonsContainer();
		$first_button = new Button();
		$first_button->setType('btn-primary')
			->setIcon('glyphicon-pencil')
			->setTitle('Editovat')
			->addAttribute('href', new Link(array(
				Link::HREF => 'Catalog:editPublisher',
				Link::PARAMS => array(
					'id' => '{' . $table_id . '}'
				)
		)));
		$buttons_container->addButton($first_button);
		$grid->column(new Column\Button(array(
			Column\Button::TEXT => 'Actions',
			Column\Button::BUTTONS_OPTION => $buttons_container
		)));
		$second_button = new Button();
		$second_button->setType('btn-danger')
			->setIcon('glyphicon-trash')
			//->setConfirm('Realy want to delete user?')
			->setTitle('Delete')
			->addAttribute('href', new Link(array(
				Link::HREF => 'Catalog:deletePublisher',
				Link::PARAMS => array(
					'id' => '{' . $table_id . '}'
				)
		)));
		$buttons_container->addButton($second_button);


		return $grid;
	}

	public function createComponentCategoryDataGrid($name) {
		$source = new NetteDbDataSource($this->catalogManager->getCategoriesSource());
		$table_id = 'id';
		$grid = new Grid($source, $this, $name);

		$grid->column(new Column\Text(array(
			Column\Text::ID => 'name',
			Column\Text::TEXT => 'name',
			Column\Text::ORDERING => FALSE
		)));

		$buttons_container = new ButtonsContainer();
		$first_button = new Button();
		$first_button->setType('btn-primary')
			->setIcon('glyphicon-pencil')
			->setTitle('Editovat')
			->addAttribute('href', new Link(array(
				Link::HREF => 'Catalog:editCategory',
				Link::PARAMS => array(
					'id' => '{' . $table_id . '}'
				)
		)));
		$buttons_container->addButton($first_button);
		$grid->column(new Column\Button(array(
			Column\Button::TEXT => 'Actions',
			Column\Button::BUTTONS_OPTION => $buttons_container
		)));
		$second_button = new Button();
		$second_button->setType('btn-danger')
			->setIcon('glyphicon-trash')
			//->setConfirm('Realy want to delete user?')
			->setTitle('Delete')
			->addAttribute('href', new Link(array(
				Link::HREF => 'Catalog:deleteCategory',
				Link::PARAMS => array(
					'id' => '{' . $table_id . '}'
				)
		)));
		$buttons_container->addButton($second_button);


		return $grid;
	}

	public function createComponentAuthorDataGrid($name) {
		$source = new NetteDbDataSource($this->catalogManager->getAuthorsSource());

		$table_id = 'id';
		$grid = new Grid($source, $this, $name);

		$grid->column(new Column\Text(array(
			Column\Text::ID => 'name',
			Column\Text::TEXT => 'name',
			Column\Text::ORDERING => FALSE
		)));

		$buttons_container = new ButtonsContainer();
		$first_button = new Button();
		$first_button->setType('btn-primary')
			->setIcon('glyphicon-pencil')
			->setTitle('Editovat')
			->addAttribute('href', new Link(array(
				Link::HREF => 'Catalog:editAuthor',
				Link::PARAMS => array(
					'id' => '{' . $table_id . '}'
				)
		)));
		$buttons_container->addButton($first_button);
		$grid->column(new Column\Button(array(
			Column\Button::TEXT => 'Actions',
			Column\Button::BUTTONS_OPTION => $buttons_container
		)));
		$second_button = new Button();
		$second_button->setType('btn-danger')
			->setIcon('glyphicon-trash')
			//->setConfirm('Realy want to delete user?')
			->setTitle('Delete')
			->addAttribute('href', new Link(array(
				Link::HREF => 'Catalog:deleteAuthor',
				Link::PARAMS => array(
					'id' => '{' . $table_id . '}'
				)
		)));
		$buttons_container->addButton($second_button);


		return $grid;
	}

	public function createComponentBooksDataGrid($name) {
		$source = new NetteDbDataSource($this->catalogManager->getBooksSource());

		$table_id = 'id';
		$grid = new Grid($source, $this, $name);

		$grid->column(new Column\Text(array(
			Column\Text::ID => 'isbn',
			Column\Text::TEXT => 'ISBN',
			Column\Text::ORDERING => FALSE
		)));
		$grid->column(new Column\Text(array(
			Column\Text::ID => 'title',
			Column\Text::TEXT => 'Title',
			Column\Text::ORDERING => FALSE
		)));

		$grid->column(new Column\Text(array(
			Column\Text::ID => 'authorname',
			Column\Text::TEXT => 'Autor',
			Column\Text::ORDERING => FALSE
		)));
		$grid->column(new Column\Text(array(
			Column\Text::ID => 'categoryname',
			Column\Text::TEXT => 'Kategorie',
			Column\Text::ORDERING => FALSE
		)));

		$grid->column(new Column\Text(array(
			Column\Text::ID => 'borrow',
			Column\Text::TEXT => 'Vypůjčeno',
			Column\Text::CALLBACK => function($data) {
				return $data['borrow'] . 'x';
			},
			Column\Text::ORDERING => FALSE
		)));

		$grid->column(new Column\Text(array(
			Column\Text::ID => 'count',
			Column\Text::TEXT => 'Skladem',
			Column\Text::CALLBACK => function($data) {
				return $data['count'] . 'ks';
			},
			Column\Text::ORDERING => FALSE
		)));

		$buttons_container = new ButtonsContainer();
		$first_button = new Button();
		$first_button->setType('btn-primary')
			->setIcon('glyphicon-pencil')
			->setTitle('Editovat')
			->addAttribute('href', new Link(array(
				Link::HREF => 'Catalog:editBook',
				Link::PARAMS => array(
					'id' => '{' . $table_id . '}'
				)
		)));
		$buttons_container->addButton($first_button);
		$grid->column(new Column\Button(array(
			Column\Button::TEXT => 'Actions',
			Column\Button::BUTTONS_OPTION => $buttons_container
		)));
		$second_button = new Button();
		$second_button->setType('btn-danger')
			->setIcon('glyphicon-trash')
			//->setConfirm('Realy want to delete user?')
			->setTitle('Delete')
			->addAttribute('href', new Link(array(
				Link::HREF => 'Catalog:deleteBook',
				Link::PARAMS => array(
					'id' => '{' . $table_id . '}'
				)
		)));
		$buttons_container->addButton($second_button);


		return $grid;
	}

	public function renderDeletePublisher($id = 0) {
		$this->template->publisher = $this->catalogManager->findPublisherById($id);
	}

	public function renderDeleteCategory($id = 0) {
		$this->template->category = $this->catalogManager->findCategoryById($id);
	}

	public function renderDeleteAuthor($id = 0) {
		$this->template->author = $this->catalogManager->findAuthorById($id);
	}

	public function renderDeleteBook($id = 0) {
		$this->template->book = $this->catalogManager->findBookById($id);
	}

	public function createComponentDeleteCategoryForm() {
		$form = new Form();
		$presenter = $this;
		$form->addSubmit('submit', 'Smazat')
			->setAttribute('class', 'button submit');
		$form->addSubmit('cancel', 'Zrušit')
				->setAttribute('class', 'button cancel')
				->setValidationScope(FALSE)
			->onClick[] = function () use ($presenter) {
			$presenter->redirect(':Admin:Catalog:categories');
		};
		$form->onSuccess[] = callback($this, 'deleteCategoryFormSubmitted');
		$form->addProtection('Time limit exceeded.');
		return $form;
	}

	public function createComponentDeletePublisherForm() {
		$form = new Form();
		$presenter = $this;
		$form->addSubmit('submit', 'Smazat')
			->setAttribute('class', 'button submit');
		$form->addSubmit('cancel', 'Zrušit')
				->setAttribute('class', 'button cancel')
				->setValidationScope(FALSE)
			->onClick[] = function () use ($presenter) {
			$presenter->redirect(':Admin:Catalog:publishers');
		};
		$form->onSuccess[] = callback($this, 'deletePublisherFormSubmitted');
		$form->addProtection('Time limit exceeded.');
		return $form;
	}

	public function createComponentDeleteAuthorForm() {
		$form = new Form();
		$presenter = $this;
		$form->addSubmit('submit', 'Smazat')
			->setAttribute('class', 'button submit');
		$form->addSubmit('cancel', 'Zrušit')
				->setAttribute('class', 'button cancel')
				->setValidationScope(FALSE)
			->onClick[] = function () use ($presenter) {
			$presenter->redirect(':Admin:Catalog:authors');
		};
		$form->onSuccess[] = callback($this, 'deleteAuthorFormSubmitted');
		$form->addProtection('Time limit exceeded.');
		return $form;
	}

	public function createComponentDeleteBookForm() {
		$form = new Form();
		$presenter = $this;
		$form->addSubmit('submit', 'Smazat')
			->setAttribute('class', 'button submit');
		$form->addSubmit('cancel', 'Zrušit')
				->setAttribute('class', 'button cancel')
				->setValidationScope(FALSE)
			->onClick[] = function () use ($presenter) {
			$presenter->redirect(':Admin:Catalog:books');
		};
		$form->onSuccess[] = callback($this, 'deleteBookFormSubmitted');
		$form->addProtection('Time limit exceeded.');
		return $form;
	}

	public function deleteCategoryFormSubmitted(Form $form) {
		$id = (int) $this->getParameter('id');
		$values = $form->getValues();

		$bookCount = $this->catalogManager->countBooksInCategory($id);
		if ($bookCount > 0) {
			$this->flashMessage('Kategorii nelze smazat. Obsahuje jiná data.', 'danger');
			$this->redirect(':Admin:Catalog:categories');
		} else {
			$this->catalogManager->removeCategory($id);
			$this->flashMessage('Data were deleted.', 'success');
			$this->redirect(':Admin:Catalog:categories');
		}
	}

	public function deletePublisherFormSubmitted(Form $form) {
		$id = (int) $this->getParameter('id');
		$values = $form->getValues();

		$publisherCount = $this->catalogManager->countPublishersOnBook($id);
		if ($publisherCount > 0) {
			$this->flashMessage('Vydavatele nelze smazat. Je přiřazen k jiným datům.', 'danger');
			$this->redirect(':Admin:Catalog:publishers');
		} else {
			$this->catalogManager->removePublisher($id);
			$this->flashMessage('Data were deleted.', 'success');
			$this->redirect(':Admin:Catalog:publishers');
		}
	}

	public function deleteAuthorFormSubmitted(Form $form) {
		$id = (int) $this->getParameter('id');
		$values = $form->getValues();

		$authorCount = $this->catalogManager->countAuthorsOnBook($id);
		if ($authorCount > 0) {
			$this->flashMessage('Autora nelze smazat. Je přiřazen k jiným datům.', 'danger');
			$this->redirect(':Admin:Catalog:authors');
		} else {
			$this->catalogManager->removeAuthor($id);
			$this->flashMessage('Data were deleted.', 'success');
			$this->redirect(':Admin:Catalog:authors');
		}
	}

	public function deleteBookFormSubmitted(Form $form) {
		$id = (int) $this->getParameter('id');
		$values = $form->getValues();

		$this->catalogManager->removeBook($id);
		$this->flashMessage('Data were deleted.', 'success');
		$this->redirect(':Admin:Catalog:books');
	}

	public function renderEditPublisher($id = 0) {
		$form = $this['publisherForm'];
		$row = $this->catalogManager->findPublisherById(array('id' => $id));
		if (!$row) {
			$this->error('No data found');
		}
		$form->setDefaults($row);
	}

	public function renderEditCategory($id = 0) {
		$form = $this['categoryForm'];
		$row = $this->catalogManager->findCategoryById(array('id' => $id));
		if (!$row) {
			$this->error('No data found');
		}
		$form->setDefaults($row);
	}

	public function renderEditAuthor($id = 0) {
		$form = $this['authorForm'];
		$row = $this->catalogManager->findAuthorById(array('id' => $id));
		if (!$row) {
			$this->error('No data found');
		}
		$form->setDefaults($row);
	}

	public function renderEditBook($id = 0) {
		$form = $this['bookForm'];
		$row = $this->catalogManager->findBookById(array('id' => $id));
		if (!$row) {
			$this->error('No data found');
		}
		$form->setDefaults($row);
	}

	protected function createComponentPublisherForm() {
		$form = new Form();
		$form->addText('name', 'Jméno:');

		$presenter = $this;
		$form->addSubmit('submit', 'Uložit')
			->setAttribute('class', 'button submit');
		$form->addSubmit('cancel', 'Zrušit')
				->setAttribute('class', 'button cancel')
				->setValidationScope(FALSE)
			->onClick[] = function () use ($presenter) {
			$presenter->redirect(':Admin:Catalog:publishers');
		};
		$form->onSuccess[] = callback($this, 'PublisherFormSubmitted');
		$form->addProtection('Time limit exceeded.'); //Prevent fr
		return $form;
	}

	protected function createComponentCategoryForm() {
		$form = new Form();
		$form->addText('name', 'Název kategorie:');

		$presenter = $this;
		$form->addSubmit('submit', 'Uložit')
			->setAttribute('class', 'button submit');
		$form->addSubmit('cancel', 'Zrušit')
				->setAttribute('class', 'button cancel')
				->setValidationScope(FALSE)
			->onClick[] = function () use ($presenter) {
			$presenter->redirect(':Admin:Catalog:categories');
		};
		$form->onSuccess[] = callback($this, 'CategoryFormSubmitted');
		$form->addProtection('Time limit exceeded.'); //Prevent fr
		return $form;
	}

	protected function createComponentAuthorForm() {
		$form = new Form();
		$form->addText('name', 'Jméno autora:');

		$presenter = $this;
		$form->addSubmit('submit', 'Uložit')
			->setAttribute('class', 'button submit');
		$form->addSubmit('cancel', 'Zrušit')
				->setAttribute('class', 'button cancel')
				->setValidationScope(FALSE)
			->onClick[] = function () use ($presenter) {
			$presenter->redirect(':Admin:Catalog:authors');
		};
		$form->onSuccess[] = callback($this, 'AuthorFormSubmitted');
		$form->addProtection('Time limit exceeded.'); //Prevent fr
		return $form;
	}

	protected function createComponentBookForm() {
		$author = $this->catalogManager->getAuthors();
		$publisher = $this->catalogManager->getPublishers();
		$category = $this->catalogManager->getCategories();

		$form = new Form();
		$form->addText('title', 'Název knihy:');
		$form->addText('isbn', 'ISBN:');
		$form->addText('ean', 'EAN:');
		$form->addText('year', 'Datum vydání:')
			->setAttribute('placeholder', 'YYYY-MM-DD');
		$form->addSelect('author_id', 'Autor:', $author);
		$form->addSelect('publisher_id', 'Vydavatel:', $publisher);
		$form->addSelect('category_id', 'Kategorie:', $category);
		$form->addText('page_count', 'Počet stran:');
		$form->addTextArea('desc', 'Popis:')
			->setAttribute('class', 'ckeditor');
		$form->addText('count', 'Počet:');
		$form->addUpload('url', 'Obrázek:');

		$presenter = $this;
		$form->addSubmit('submit', 'Uložit')
			->setAttribute('class', 'button submit');
		$form->addSubmit('cancel', 'Zrušit')
				->setAttribute('class', 'button cancel')
				->setValidationScope(FALSE)
			->onClick[] = function () use ($presenter) {
			$presenter->redirect(':Admin:Catalog:books');
		};
		$form->onSuccess[] = callback($this, 'BookFormSubmitted');
		$form->addProtection('Time limit exceeded.'); //Prevent fr
		return $form;
	}

	public function publisherFormSubmitted(Form $form) {
		$id = (int) $this->getParameter('id');
		$values = $form->getValues();

		if ($form->isSuccess()) {
			if ($id > 0) {
				try {
					$this->catalogManager->updatePublisher($id, $values);
					$this->flashMessage('Data were successfully updated.', 'success');
					$this->redirect(':Admin:Catalog:publishers');
				} catch (Nette\Security\AuthenticationException $e) {
					$this->getPresenter()->flashMessage($e, "error");
				}
			} else {
				try {
					$this->catalogManager->insertPublisher($values);

					$this->flashMessage('Data were successfully inserted.', 'success');
					$this->redirect(':Admin:Catalog:publishers');
				} catch (Nette\Security\AuthenticationException $e) {
					$this->getPresenter()->flashMessage($e, "error");
				}
			}
		}
	}

	public function categoryFormSubmitted(Form $form) {
		$id = (int) $this->getParameter('id');
		$values = $form->getValues();

		if ($form->isSuccess()) {
			if ($id > 0) {
				try {
					$this->catalogManager->updateCategory($id, $values);
					$this->flashMessage('Data were successfully updated.', 'success');
					$this->redirect(':Admin:Catalog:categories');
				} catch (Nette\Security\AuthenticationException $e) {
					$this->getPresenter()->flashMessage($e, "error");
				}
			} else {
				try {
					$this->catalogManager->insertCategory($values);
					$this->flashMessage('Data were successfully inserted.', 'success');
					$this->redirect(':Admin:Catalog:categories');
				} catch (Nette\Security\AuthenticationException $e) {
					$this->getPresenter()->flashMessage($e, "error");
				}
			}
		}
	}

	public function authorFormSubmitted(Form $form) {
		$id = (int) $this->getParameter('id');
		$values = $form->getValues();

		if ($form->isSuccess()) {
			if ($id > 0) {
				try {
					$this->catalogManager->updateAuthor($id, $values);

					$this->flashMessage('Data were successfully updated.', 'success');
					$this->redirect(':Admin:Catalog:authors');
				} catch (Nette\Security\AuthenticationException $e) {
					$this->getPresenter()->flashMessage($e, "error");
				}
			} else {
				try {
					$this->catalogManager->insertAuthor($values);

					$this->flashMessage('Data were successfully inserted.', 'success');
					$this->redirect(':Admin:Catalog:authors');
				} catch (Nette\Security\AuthenticationException $e) {
					$this->getPresenter()->flashMessage($e, "error");
				}
			}
		}
	}

	public function bookFormSubmitted(Form $form) {
		$id = (int) $this->getParameter('id');
		$values = $form->getValues();

		if ($form->isSuccess()) {
			if ($id > 0) {
				try {
					if ($values->url == "") {
						unset($values['url']);
					} else {
						$old = $this->catalogManager->findById(array('id' => $id));
						$oldUrl = $old->url;

						if (file_exists($oldUrl)) {
							unlink($oldUrl);
						} else {
							mkdir('images/upload/' . $id);
						}

						$file = $values->url;
						$imgUrl = 'images/upload/' . $id . "/thumb.jpg";

						$tmp_file = $file->getTemporaryFile();
						$image = Image::fromFile($tmp_file);

						$image->save($imgUrl);

						$values['url'] = $imgUrl;
					}
					$this->catalogManager->updatebook($id, $values);

					$this->flashMessage('Data were successfully updated.', 'success');
					$this->redirect(':Admin:Catalog:books');
				} catch (Nette\Security\AuthenticationException $e) {
					$this->getPresenter()->flashMessage($e, "error");
				}
			} else {
				try {
					$file = $values->url;
					$lastId = $this->catalogManager->findLastId();
					$id = $lastId + 1;
					mkdir('images/upload/' . $id);
					$imgUrl = 'images/upload/' . $id . "/thumb.jpg";

					$tmp_file = $file->getTemporaryFile();
					$image = Image::fromFile($tmp_file);

					$image->save($imgUrl);

					$values['url'] = $imgUrl;
					$values['borrow'] = 0;
					$this->catalogManager->insertBook($values);
					$this->flashMessage('Data were successfully inserted.', 'success');
					$this->redirect(':Admin:Catalog:books');
				} catch (Nette\Security\AuthenticationException $e) {
					$this->getPresenter()->flashMessage($e, "error");
				}
			}
		}
	}

}
