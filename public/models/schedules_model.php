<?php

class Schedules_Model extends Model {


  public function __construct(){
    parent::__construct();
  }

  /**
   * get all available assignments
   */
  public function events() {
    return $this->_db->select('SELECT id, targetDate, description FROM Events ORDER BY id ASC');
  }

  /**
   * get all available assignments
   */
  public function eventsLimited($page=1) {
    // FIXME Need to use .bindParam(...) in database
    return $this->_db->select('SELECT id, targetDate, description 
      FROM Events 
      ORDER BY id ASC 
       ');
  }

  public function activities() {
    return $this->_db->select('SELECT a.id, a.name as name, a.description,a.categoryId, ac.name as categoryname
     FROM Activities as a JOIN ActivityCategories as ac WHERE a.categoryId = ac.id  ORDER BY a.id DESC LIMIT 0, 200');
  }

  /**
   * Returns assignments limited
   */
  public function assignmentsLimited($page) {
    $eventIds = $this->eventIdsLimited($page);
    $eventIds_string = implode(',', $eventIds); // WITHOUT WHITESPACES BEFORE AND AFTER THE COMMA
    $stmt->bindParam('eventIdArray', $eventIds_string);

  

    // FIXME only fetch items for one specific date?
    return $this->_db->select('SELECT ra.id as id, ra.eventId, ra.activityId, 
      CONCAT(ra.eventId, "-" , ra.activityId) as combkey, ra.resourceId, r.name as resourcename 
      FROM ResourceAssignment as ra 
      JOIN Resources as r ON r.id = ra.resourceId
      ORDER BY r.name ASC'
      );
  }

  /**
   * Returns all resource assignments
   */
  public function assignments() {
    // FIXME only fetch items for one specific date?
    return $this->_db->select('SELECT 
        ra.id as id, 
        ra.eventId, 
        ra.activityId, 
        CONCAT(ra.eventId, "-" , ra.activityId) as combkey, 
        ra.resourceId, 
        r.name as resourcename 
      FROM ResourceAssignment as ra 
      JOIN Resources as r ON r.id = ra.resourceId
      ORDER BY r.name ASC');
  }

  private function eventIdsLimited($page) {
    $count =  $this->_db->select('SELECT count(id) FROM Events');
    $offset = $this->_db->getOffset($page);
    return $this->_db->select('SELECT id FROM Events  ',array());
  }

  public function delete($id) {
    if (!empty($id)) {
      return $this->_db->delete('ResourceAssignment',array("id" => $id),$limit = 1);
    }
  }

  /**
   * Get all available resources
   */
  public function resources() {
    return $this->_db->select('SELECT id, name, description FROM Resources ORDER BY name ASC LIMIT 0, 150');
  }

  /**
   * Store a resource assignment
   */
  public function add($eventId,$activityId,$resourceId) {
    if (!empty($eventId) && !empty($activityId) && !empty($resourceId)) {
      return  $this->_db->insert('ResourceAssignment',array("eventId" => intval($eventId),"activityId" => intval($activityId),"resourceId" => intval($resourceId)));
    }
    return -1;
  }


}