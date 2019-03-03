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
    return $this->_db->select('SELECT * FROM Users 
      WHERE login = :login 
      ORDER BY id DESC 
      LIMIT 0, 1',array("login" => $login));
  }

  /**
   * get all available users
   */
  public function users($currentUserId) {
    return $this->_db->select('SELECT id, firstname, login, email, userRole 
      FROM Users 
      WHERE id != :id 
      ORDER BY firstname ASC 
      LIMIT 0, 100',array('id' => $currentUserId));
  }
 

  public function addUser($login,$name,$pass,$email,$userRole) {
    if (!empty($login) && !empty($name) && !empty($pass) && !empty($userRole)) {
      $result  = $this->_db->select('SELECT Count(*) as total FROM Users WHERE login = :login',array("login" => $login));
      
      if ($result[0]["total"] > 0) {
          return -1;
      }
      
      return  $this->_db->insert('Users',array("login" => substr($login,0,29),
        "firstname" => substr($name,0,29),
        "pass" => substr($pass,0,254),
        "userRole" => $userRole,
        "email" => substr($email,0,49)));
    }
    return -1;
  }

  public function deleteUser($id,$currentUserId) {
    if (!empty($id) && $id !== $currentUserId) {
      return $this->_db->delete('Users',array("id" => $id),$limit = 1); 
    }
    
    return 0;
  }

}
