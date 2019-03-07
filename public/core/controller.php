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

	private function getControllerName() {
		return strtolower(get_class($this));
	}

	private function checkAccess() {
	  	if (!Session::get("userid")) {
	  	  // location to go if user is not logged in
		  	$data['location'] = 'login/';
	      
	      // redirect and die
	      $this->_view->render('redirect', $data);
	  	} 
	}
	
	protected function isPost() {
		return (strtoupper($_SERVER['REQUEST_METHOD']) == 'POST');
	}

	protected function isAdmin() {
    	return $this->_model->isUserAdmin(Session::get("userid"));
	}

	protected function isManager() {
		return $this->_model->isUserManager(Session::get("userid"));
	}

	protected function isUser() {
		return $this->_model->isUser(Session::get("userid"));
	}

	protected function getParamGet($name,$default=null) {
		if (isset($_GET[$name])){
			return filter_input(INPUT_GET, $name, FILTER_SANITIZE_SPECIAL_CHARS);
		}
		return $default;
	}

	protected function getParamPost($name,$default=null) {
		if (isset($_POST[$name])){
			return filter_input(INPUT_POST, $name, FILTER_SANITIZE_SPECIAL_CHARS);
		}
		return $default;
	}

}
