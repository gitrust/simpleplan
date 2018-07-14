<?php

class Controller {

	protected $_view;
	protected $_model;

	function __construct() {
		$this->_view = new View();

		$name = get_class($this);
		$modelpath = 'models/' . $name . '_model.php';

		if (file_exists($modelpath)) {
			require $modelpath;

			$modelName = $name . '_Model';
			$this->_model = new $modelName();
		}
	}

}
