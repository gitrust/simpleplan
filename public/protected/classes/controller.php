<?php
class UserController {
	private $user = null;
	
	public function __construct($request) {
	}
	
	public function registerNewUser($email, $password) {
	//Entsprechende �berpr�fungen und SQL Queries zum Registrieren des Nutzers
	//Gibt z.B. true zur�ck, falls die Registrierung funktioniert hat
	}
}

class AppController {

	private $view = null;
	
	public function invoke() {
		$this->view = new View();
	}
	
	public function renderView() {
		return $this->view->render();
	}
}
?>