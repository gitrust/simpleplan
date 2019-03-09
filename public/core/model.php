<?php

class Model {

	protected $_db;

	public function __construct() {
		//connect to PDO here.
		$this->_db = new Database();
	}

	public function isUserAdmin($id) {
		return $this->checkRole($id,"admin");
	}
	  
	public function isUserManager($id) {
    	return $this->checkRole($id,"manager");
	}
	  
	public function isUser($id) {
		return $this->checkRole($id,"user");
	}

	private function checkRole($id, $role) {
		$a = $this->_db->select('SELECT count(id) as usersCount FROM Users WHERE id = :id AND userRole = :userRole',array("id" => $id,"userRole" => $role));
    	return count($a[0]["usersCount"]) > 0;
	}
	  
}
