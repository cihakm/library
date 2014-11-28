<?php

namespace DataGrid;

/**
 * @author mesour <matous.nemec@mesour.com>
 * @package Mesour DataGrid
 */
abstract class Setting {

	/**
	 * Option for this column
	 *
	 * @var Array
	 */
	protected $option = array();

	/**
	 * @param array $option
	 * @throws Grid_Exception
	 */
	public function __construct(array $option = array()) {
		$defaults = $this->setDefaults();
		if(!is_array($defaults)) {
			throw new Grid_Exception('Protected function setDefaults must return an array.');
		}
		$this->option = $defaults;
		if(!empty($option)) {
			$this->option = array_merge($defaults, $option);
		}
	}

	protected function setDefaults() {
		return array();
	}

}