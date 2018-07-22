<?php

class Admin_Model extends Model {

  public function __construct(){
    parent::__construct();
  }

  /**
   * get all available schedules
   */
  public function schedules() {
    return $this->_db->select('SELECT id, targetDate,description FROM Schedule ORDER BY id DESC LIMIT 0, 100');
    //return array("01.02.2018","10.07.2018","13.08.2018");
  }

  /**
   * get all available roles
   */
  public function roles() {
    return $this->_db->select('SELECT id, role, description FROM Roles ORDER BY role ASC LIMIT 0, 20');
    //return array("hh","e-guitar","drummer","leader","singer1","singer2","singer3","piano","e-bass");
  }

    /**
   * get all available roles
   */
  public function rolenames() {
    $result  = array_values($this->_db->select('SELECT role FROM Roles ORDER BY role DESC LIMIT 0, 20'));
    $names = array();
    foreach ($result as $ar) {
        array_push($names,$ar["role"]);
    }
    return $names;
    //return array("hh","e-guitar","drummer","leader","singer1","singer2","singer3","piano","e-bass");
  }

   /**
   * delete a role
   */
  public function deleteRole($id) {
   return $this->_db->delete('Roles',array("id" => $id),$limit = 1); 
  }

  /**
   * delete a schedule
   */
  public function deleteSchedule($id) {
   return $this->_db->delete('Schedule',array("id" => $id),$limit = 1); 
  }

  public function getRole($id) {
    return $this->_db->select('SELECT id, role FROM Roles WHERE id = :id',array("id" => $id));
    //return array("hh","e-guitar","drummer","leader","singer1","singer2","singer3","piano","e-bass");
  }

  public function updateRole($id,$role) {
    return $this->_db->update('Roles',array("role" => $role),array("id" => $id));
  }

  public function addRole($role,$description="") {
    if (!empty($role)) {
      return  $this->_db->insert('Roles',array("role" => substr($role,0,29),"description" => substr($description,0,149)));
    }
    return array();
  }

  public function addSchedule($targetDate,$description="") {
    if (!empty($targetDate)) {
      return  $this->_db->insert('Schedule',array("targetDate" => substr($targetDate,0,29),"description" => substr($description,0,149)));
    }
    return array();
  }

  /**
   * get all available users
   */
  public function users() {
    return $this->_db->select('SELECT id, firstname, login,email FROM Users WHERE roleflag = :roleflag ORDER BY firstname ASC LIMIT 0, 50',array('roleflag' => 'U'));
  }
 

  public function addUser($login,$name,$pass) {
    if (!empty($login) && !empty($name) && !empty($pass)) {
      return  $this->_db->insert('Users',array("login" => substr($login,0,29)
         ,"firstname" => substr($name,0,29)
        ,"pass" => substr($pass,0,254),"roleflag" => 'U'));
    }
    return array();
  }

  public function deleteUser($id,$currentUserId) {
    if (!empty($id) && $id !== $currentUserId) {
      return $this->_db->delete('Users',array("id" => $id),$limit = 1); 
    }
  }
}
