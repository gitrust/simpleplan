<?php

class Controller {

	protected $_view;
	protected $_model;

	function __construct() {
		$this->_view = new View();

		$name = get_class($this);
		$modelpath = 'models/' . strtolower($name) . '_model.php';

		
		if (file_exists($modelpath)) {
			require $modelpath;

			$modelName = $name . '_Model';
			$this->_model = new $modelName();
			
		}
	}

	protected function isAdmin() {
    	return $this->_model->isUserAdmin(Session::get("userid"));
  	}

}
