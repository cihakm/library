<?php

namespace App\Model;

use Nette,
    Nette\Security\Passwords;

/**
 * AdminUser management.
 */
class AdminUserManager {

	const
		TABLE_USER = 'a_user',
		COLUMN_ID = 'id',
		COLUMN_PASSWORD_HASH = 'password',
		COLUMN_ROLE = 'role',
		COLUMN_USERNAME = 'username';

	/** @var Nette\Database\Context */
	private $database;

	/** @var Nette\Security\User */
	private $user;

	public function __construct(Nette\Database\Context $database, Nette\Security\User $user) {
		$this->database = $database;
		$this->user = $user;
	}

	public function login($username, $password) {
		$row = $this->database->table(self::TABLE_USER)->where(self::COLUMN_USERNAME, $username)->fetch();
		
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
		$this->user->login(new Nette\Security\Identity($row[self::COLUMN_ID],$row[self::COLUMN_ROLE], $arr));
	}
	
	public function isAllowed($param, $name) {
		var_dump($param, $name);
	}

}
