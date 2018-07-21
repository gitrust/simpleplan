<?php

class Model {

	protected $_db;

	public function __construct() {
		//connect to PDO here.
		$this->_db = new Database();
	}

	public function isUserAdmin($id) {
    	$a = $this->_db->select('SELECT * FROM Users WHERE id = :id AND roleflag = :roleflag',array("id" => $id,"roleflag" => "A"));
    	return count($a[0]) > 0;
  }
}
