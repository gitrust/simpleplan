<?php

class Login_Model extends Model {

  public function __construct(){
    parent::__construct();
  }

  public function usersByLogin($login,$pass) {    
    return  $this->_db->select('SELECT * FROM Users WHERE login = :login ORDER BY id DESC LIMIT 0, 1',array("login" => $login));       
  }

}
