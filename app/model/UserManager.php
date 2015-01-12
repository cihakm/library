<?php

namespace App\Model;

use Nette,
    Nette\Utils\Strings,
    Nette\Security\Passwords;

/**
 * Users management.
 */
class UserManager {

	const
		TABLE_USER = 'user',
		COLUMN_ID = 'id',
		COLUMN_PASSWORD_HASH = 'password',
		COLUMN_ROLE = 'role',
		COLUMN_FB = 'fb_id',
		COLUMN_TOKEN = 'fb_access_token',
		COLUMN_NAME = 'name',
		COLUMN_SURNAME = 'surname',
		COLUMN_MAIL = 'email';

	/** @var Nette\Database\Context */
	private $database;

	/** @var Nette\Security\User */
	private $user;

	public function __construct(Nette\Database\Context $database, Nette\Security\User $user) {
		$this->database = $database;
		$this->user = $user;
	}

	public function login($email, $password) {
		$row = $this->database->table(self::TABLE_USER)->where(self::COLUMN_MAIL, $email)->fetch();

		if (!$row) {
			throw new Nette\Security\AuthenticationException('Uživatelské heslo je nesprávné.');
		} elseif (!Passwords::verify($password, $row[self::COLUMN_PASSWORD_HASH])) {
			throw new Nette\Security\AuthenticationException('Heslo je nesprávné.');
		} elseif (Passwords::needsRehash($row[self::COLUMN_PASSWORD_HASH])) {
			$row->update(array(
				self::COLUMN_PASSWORD_HASH => Passwords::hash($password),
			));
		}

		$arr = $row->toArray();
		unset($arr[self::COLUMN_PASSWORD_HASH]);
		$this->user->login(new Nette\Security\Identity($row[self::COLUMN_ID], $row[self::COLUMN_ROLE], $arr));
	}

	public function registerFromFacebook($fbId, $token, $fbData) {
		$this->database->table(self::TABLE_USER)->insert(array(
			self::COLUMN_ROLE => "user",
			self::COLUMN_FB => $fbId,
			self::COLUMN_TOKEN => $token,
			self::COLUMN_NAME => $fbData['first_name'],
			self::COLUMN_SURNAME => $fbData['last_name'],
			self::COLUMN_MAIL => $fbData['email']
		));
	}

	public function registerUser($name, $surname, $email, $password) {
		$this->database->table(self::TABLE_USER)->insert(array(
			self::COLUMN_ROLE => "user",
			self::COLUMN_NAME => $name,
			self::COLUMN_SURNAME => $surname,
			self::COLUMN_MAIL => $email,
			self::COLUMN_PASSWORD_HASH => Passwords::hash($password)
		));
	}

	public function updateFacebookAccess($fbId, $token, $email) {
		$this->database->table(self::TABLE_USER)->where(self::COLUMN_MAIL, $email)->update(array(
			self::COLUMN_FB => $fbId,
			self::COLUMN_TOKEN => $token
		));
	}

	public function changePassword($email, $password) {
		$this->database->table(self::TABLE_USER)->where(self::COLUMN_MAIL, $email)->update(array(
			self::COLUMN_PASSWORD_HASH => Passwords::hash($password),
		));
	}

	public function findByEmail($email) {
		$row = $this->database->table(self::TABLE_USER)->where(self::COLUMN_MAIL, $email)->fetch();
		return $row;
	}

	public function findUserMail($mail) {
		return $this->database->table('user')->select('email')->where('email', $mail)->fetch();
	}

	public function findUserById($id) {
		return $this->database->table('user')->wherePrimary($id)->fetch();
	}

	public function updateUser($id, $values) {
		return $this->database->table('user')->wherePrimary($id)->update($values);
	}

	public function updateUserPassword($id, $pass) {
		return $this->database->table('user')->wherePrimary($id)->update(array(
			'password' => Passwords::hash($pass)
		));
	}

	public function getUsersData($user_id) {
		return $this->database->table('user')->wherePrimary($user_id)->fetchAll();
	}


}
