<?php

class Model {

	protected $_db;

	public function __construct() {
		//connect to PDO here.
		$this->_db = new Database();
	}

	public function isUserAdmin($id) {
    	$a = $this->_db->select('SELECT * FROM Users WHERE id = :id AND userRole = :userRole',array("id" => $id,"userRole" => "admin"));
    	return count($a[0]) > 0;
  	}
}
