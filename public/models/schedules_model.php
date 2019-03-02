<?php

class Schedules_Model extends Model {

  public function __construct(){
    parent::__construct();
  }

  /**
   * get all available assignments
   */
  public function events() {
    return $this->_db->select('SELECT id, targetDate, description FROM Events ORDER BY id ASC LIMIT 0, 200');
  }

  public function activities() {
    return $this->_db->select('SELECT a.id, a.name as name, a.description,a.categoryId, ac.name as categoryname
     FROM Activities as a JOIN ActivityCategories as ac WHERE a.categoryId = ac.id  ORDER BY a.id DESC LIMIT 0, 200');
  }

  public function assignments() {
    return $this->_db->select('SELECT ra.id, ra.eventId, ra.activityId, ra.resourceId, r.name 
    FROM ResourceAssignment as ra 
    RIGHT JOIN Resources as r ON r.id = ra.resourceId   
    ORDER BY a.id DESC LIMIT 0, 200');
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
