<?php

class Controller {

	protected $_view;
	protected $_model;

	function __construct($needsLogin = false) {
		$this->_view = new View();

		if ($needsLogin) {
			$this->checkAccess();
		}

		$name = get_class($this);
		$modelpath = 'models/' . strtolower($name) . '_model.php';

		
		if (file_exists($modelpath)) {
			require $modelpath;

			$modelName = $name . '_Model';
			$this->_model = new $modelName();
			
		}
	}

	private function checkAccess() {
	  	if (!Session::get("userid")) {
	  	  // location to go if user is not logged in
		  $data['location'] = 'login/';
	      
	      // redirect and die
	      $this->_view->render('redirect', $data);
	  	} 
  	}

	protected function isAdmin() {
    	return $this->_model->isUserAdmin(Session::get("userid"));
  	}

}
