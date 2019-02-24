<?php

class Admin_Model extends Model {

  public function __construct(){
    parent::__construct();
  }

  /**
   * Get all available events
   */
  public function events() {
    return $this->_db->select('SELECT id, targetDate,description FROM Events ORDER BY id DESC LIMIT 0, 100');
  }

  /**
   * Get all available Activites
   */
  public function activities() {
    return $this->_db->select('SELECT id, name, description FROM Activities ORDER BY name ASC LIMIT 0, 500');
  }

  /**
   * Get all available Activity names
   */
  public function activityNames() {
    $result  = array_values($this->_db->select('SELECT name FROM Activities ORDER BY name DESC LIMIT 0, 20'));
    $names = array();
    foreach ($result as $ar) {
        array_push($names,$ar["name"]);
    }
    return $names;
  }

   /**
   * Delete a Activity
   */
  public function deleteActivity($id) {
    return $this->_db->delete('Activities',array("id" => $id),$limit = 1); 
  }
  
  public function getActivity($id) {
    return $this->_db->select('SELECT id, name, departmentId, description FROM Activities WHERE id = :id',array("id" => $id));
  }

  /**
   * Update existing Activity
   */
  public function updateActivity($id,$name) {
    return $this->_db->update('Activities',array("name" => $name),array("id" => $id));
  }

  /**
   * Add new Activity
   */
  public function addActivity($name,$description="") {
    if (!empty($name)) {
      return  $this->_db->insert('Activities',array("name" => substr($name,0,29),"description" => substr($description,0,149),"departmentId" => 1));
    }
    return -1;
  }

  /**
   * Delete an Event
   */
  public function deleteEvent($id) {
    return $this->_db->delete('Events',array("id" => $id),$limit = 1); 
  }

  /**
   * Add new Event
   */
  public function addEvent($targetDate,$description="") {
    if (!empty($targetDate)) {
      return  $this->_db->insert('Events',array("targetDate" => substr($targetDate,0,29),"description" => substr($description,0,149)));
    }
    return -1;
  }

  /**
   * get all available users
   */
  public function users($currentUserId) {
    return $this->_db->select('SELECT id, firstname, login, email, roleflag FROM Users WHERE id != :id ORDER BY firstname ASC LIMIT 0, 100',array('id' => $currentUserId));
  }
 

  public function addUser($login,$name,$pass,$email,$admin) {
    if (!empty($login) && !empty($name) && !empty($pass)) {
      $result  = $this->_db->select('SELECT Count(*) as total FROM Users WHERE login = :login',array("login" => $login));
      
      if ($result[0]["total"] > 0) {
          return -1;
      }
      
      $roleflag = $admin ? 'A' : 'U';
      return  $this->_db->insert('Users',array("login" => substr($login,0,29)
         ,"firstname" => substr($name,0,29)
        ,"pass" => substr($pass,0,254),"roleflag" => $roleflag,"email" => substr($email,0,49)));
    }
    return -1;
  }

  public function deleteUser($id,$currentUserId) {
    if (!empty($id) && $id !== $currentUserId) {
      return $this->_db->delete('Users',array("id" => $id),$limit = 1); 
    }
    
    return 0;
  }

  /**
   * Get all available resources
   */
  public function resources() {
    return $this->_db->select('SELECT id, name, description FROM Resources ORDER BY id DESC LIMIT 0, 100');
  }
}
