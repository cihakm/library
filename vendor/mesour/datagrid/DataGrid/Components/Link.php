<?php

namespace DataGrid\Components;

use DataGrid\Setting;

/**
 * @author mesour <matous.nemec@mesour.com>
 * @package Mesour DataGrid
 */
class Link extends Setting {

	/**
	 * Possible option key
	 */
	const HREF = 'href',
	    	PARAMS = 'parameters',
	    	NAME = 'name',
	        USE_NETTE_LINK = 'use_nette';

	/**
	 * Valid permission callback
	 *
	 * @var Mixed
	 */
	static public $checkPermissionCallback;

	public function setName($name) {
		$this->option[self::NAME] = $name;
		return $this;
	}

	public function setHref($href) {
		$this->option[self::HREF] = $href;
		return $this;
	}

	public function setParameters(array $parameters) {
		$this->option[self::PARAMS] = $parameters;
		return $this;
	}

	public function setUseNetteLink($nette = TRUE) {
		$this->option[self::USE_NETTE_LINK] = $nette;
		return $this;
	}

	public function addParameter($name, $value) {
		$this->option[self::PARAMS][$name] = $value;
		return $this;
	}

	/**
	 * Check permissions for link
	 *
	 * @param String $link
	 * @return String|FALSE
	 */
	static public function checkLinkPermission($link) {
		if (is_callable(self::$checkPermissionCallback)) {
			return call_user_func_array(self::$checkPermissionCallback, array($link));
		}
		return $link;
	}

	/**
	 * Returns true or array($href, $params) for $presenter->link()
	 *
	 * @param $link
	 * @param array $arguments
	 * @param null $data
	 * @return array|bool
	 */
	static public function getLink($link, array $arguments = array(), $data = NULL) {
		if (!empty($arguments)) {
			foreach ($arguments as $key => $value) {
				$params[$key] = self::parseValue($value, is_null($data) ? array() : $data);
			}
		} else {
			$params = array();
		}
		$to_href = self::checkLinkPermission($link);
		if ($to_href === FALSE) {
			return FALSE;
		}
		return array($to_href, $params);
	}

	/**
	 * Parse value with {identifier}
	 *
	 * @param String $value
	 * @param Array $data
	 * @return Array
	 */
	static public function parseValue($value, $data) {
		if ((is_array($data) || $data instanceof \ArrayAccess) && substr($value, 0, 1) === '{' && substr($value, -1) === '}') {
			$key = substr($value, 1, strlen($value) - 2);
			if (array_key_exists($key, $data)) {
				return $data[$key];
			} else {
				return $value;
			}
		} else {
			return $value;
		}
	}

	protected function setDefaults() {
		return array(
		    self::USE_NETTE_LINK => TRUE,
		    self::PARAMS => array()
		);
	}

	public function hasUseNetteLink() {
		return $this->option[self::USE_NETTE_LINK];
	}

	/**
	 * Create link
	 *
	 * @param null $data
	 * @return false|array list($to_href, $params, $name)
	 * @throws Grid_Exception
	 */
	public function create($data = NULL) {
		if (array_key_exists(self::HREF, $this->option) === FALSE) {
			throw new Grid_Exception('Option \DataGrid\DropdownColumn::HREF is required.');
		}
		if($this->hasUseNetteLink()) {
			$link = self::getLink($this->option[self::HREF], $this->option[self::PARAMS], $data);
			if(!$link) {
				return FALSE;
			}
		} else {
			$link = array($this->option[self::HREF], $this->option[self::PARAMS]);
		}
		$link[] = isset($this->option[self::NAME]) ? $this->option[self::NAME] : NULL;
		return $link;
	}

}