<?php

namespace App\FrontModule\Presenters;

use Nette\Application\UI\Form,
    Nette\Mail\Message,
    Nette\Mail\SendmailMailer,
    Nette\Mail\SmtpMailer;

class PasswordPresenter extends BasePresenter
{

	/** @var \App\Model\UserManager @inject */
	public $person;

	protected function startup()
	{
		parent::startup();
	}

	public function renderDefault()
	{

	}

	protected function createComponentPasswordForm()
	{
		$form = new Form();

		$form->addText('email', "Seu e-mail *")
		    ->setAttribute("placeholder", "Seu e-mail *")
		    ->setAttribute("class", "form-control")
		    ->addRule(Form::EMAIL, "Špatný formát e-mailu.");

		$form->addSubmit('submit', "Odeslat")->setAttribute('class', 'btn orange');

		$form->onSuccess[] = callback($this, 'passwordFormSubmitted');
		return $form;
	}

	public function passwordFormSubmitted(Form $form)
	{
		$mail = new Message;
		$mailer = new SendmailMailer;
		$values = $form->getValues();

		$fromDb = $this->person->findUserMail($values->email);

		if (!$fromDb) {
			$this->flashMessage("Zadaný e-mail se nenachází v databázi.", 'error');
		} else {
			$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
			$newPass = substr(str_shuffle($chars), 0, 8);

			$template = new \Nette\Templating\FileTemplate('../app/FrontModule/email/forgot_password.latte');
			$template->registerFilter(new \Nette\Latte\Engine);
			$template->registerHelperLoader('Nette\Templating\Helpers::loader');

			$template->newPass = $newPass;

			$this->person->changePassword($fromDb->email, $newPass);

			$mailer = new \Nette\Mail\SendmailMailer();
			$mail->setFrom("cihak.mar@gmail.com", "Podpora knihovny Hradec Králové")
			    ->addTo($values->email)
			    ->setSubject("Nové heslo")
			    ->setBody($template);

			//$mailer->send($mail);

			$this->flashMessage("Nové heslo bylo zasláno na Váš e-mail.", 'success');
			$this->redirect(':Front:Homepage:default');
		}
	}

}