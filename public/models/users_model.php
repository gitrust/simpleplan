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
   * @param string $login user login name
   * @return array with one user
   */
  public function byLogin($login) {
    return $this->_db->select('SELECT * FROM Users 
      WHERE login = :login 
      ORDER BY id DESC 
      LIMIT 0, 1',array("login" => $login));
  }

  /**
   * get all available users but not the logged in user
   * @param int $currentUserId id of logged in user
   */
  public function users($currentUserId) {
    return $this->_db->select('SELECT id, firstname, login, email, userRole , description
      FROM Users 
      WHERE id != :id 
      ORDER BY firstname ASC 
      LIMIT 0, 100',array('id' => $currentUserId));
  }
 

  /**
   * Add a new user
   * @param string $login user login
   * @param string $name user name
   * @param string $pass user password
   * @param string $email user email
   * @param string $userRole user role
   * @param string $description user description
   */
  public function addUser($login, $name, $pass, $email, $userRole, $description) {
    if (empty($login) || empty($name) || empty($pass) || empty($userRole)) {
      return -1;
    }

    $userExists  = $this->_db->select('SELECT Count(*) as total  FROM Users  WHERE lower(login) = :login'
      , array("login" => strtolower(trim($login))));
    
    if ($userExists[0]["total"] > 0) {
        return -1;
    }

    // shorten description
    if (!empty($description)) {
      $description = substr($description,0,149);
    }
    
    return  $this->_db->insert('Users',array("login" => substr(trim($login),0,29),
      "firstname" => substr($name,0,29),
      "pass" => substr($pass,0,254),
      "userRole" => $userRole,
      "email" => substr($email,0,49),
      "description" => $description
    ));
  
  }

  /**
   * Delete a user by id
   * @param int $id id of the user
   * @param int $currentUserId id of current logged in user
   */
  public function deleteUser($id,$currentUserId) {
    if (!empty($id) && $id !== $currentUserId) {
      return $this->_db->delete('Users',array("id" => $id),$limit = 1); 
    }
    
    return 0;
  }

  

}
