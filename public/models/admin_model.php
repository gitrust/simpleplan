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
    $this->_db->delete('ResourceAssignment',array("eventId" => $id),$limit = 'no'); 
    return $this->_db->delete('Events',array("id" => $id),$limit = 1);
  }

  /**
   * Add new Event
   */
  public function addEvent($targetDate,$description="") {
    if (!empty($targetDate)) {
      // FIXME optimize
      // comes from date_parse_from_str
      $s = $targetDate["year"] . '-' . $targetDate["month"] . '-' .  $targetDate["day"];
      return  $this->_db->insert('Events',array("targetDate" => $s,"description" => substr($description,0,149)));
    }
    return -1;
  }

}
