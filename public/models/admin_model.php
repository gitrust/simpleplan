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
    return $this->_db->select('SELECT id, name, description, categoryId FROM Activities ORDER BY name ASC LIMIT 0, 500');
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

}
