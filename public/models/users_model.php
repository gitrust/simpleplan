<?php

class Users_Model extends Model {

  public function __construct(){
    parent::__construct();
  }

  /**
   * get the first 100 entries from users table
   * @return array with users
   */
  public function all() {
    return $this->_db->select('SELECT * FROM Users ORDER BY id DESC LIMIT 0, 100');
  }

  /**
   * get the first entry from users table matching login
   * @return array with one user
   */
  public function byLogin($login) {
    return $this->_db->select('SELECT * FROM Users WHERE login = :login ORDER BY id DESC LIMIT 0, 1',array("login" => $login));
  }

}
