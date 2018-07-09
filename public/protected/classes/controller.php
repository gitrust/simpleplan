<?php
class UserController {
	private $user = null;
	
	public function __construct() {
	}
	
	public function registerNewUser($email, $password) {
	//Entsprechende Überprüfungen und SQL Queries zum Registrieren des Nutzers
	//Gibt z.B. true zurück, falls die Registrierung funktioniert hat
	}
}

class AppController {

	private $view = null;
	
	public function invoke() {
		
		$this->view = new View();
		$this->view->setView($this->getPage());
	}
	
	private function getRequest() {
		switch($_SERVER['REQUEST_METHOD'])
		{
		case 'GET': $request = &$_GET; break;
		case 'POST': $request = &$_POST; break;
		default: $request = &$_GET; break;
		}
		return $request;
	}
	
	private function getPage() {
		$request = $this->getRequest();
		if (isset($request["page"])) {
			return $request["page"];
		} else {
			return "404";
		}
	}
	
	public function renderView() {
		return $this->view->render();
	}
}
?>