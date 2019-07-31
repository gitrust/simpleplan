<?php

class Admin_Model extends Model {

  public function __construct(){
    parent::__construct();
  }

  /**
   * Get all events
   */
  public function events() {
    return $this->_db->select('SELECT id, targetDate,description FROM Events WHERE inactive = False ORDER BY targetDate ASC');
  }

  /**
   * Get all available events
   */
  public function current_events() {
    return $this->_db->select('SELECT id, targetDate,description FROM Events WHERE inactive = False AND targetDate >= NOW() ORDER BY targetDate ASC');
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
   * Inactivate an Event
   */
  public function inactivateEvent($id) {
    return $this->_db->update('Events', array('inactive' => True), array('id' => $id));
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
