<?php

class Schedules_Model extends Model {


  public function __construct(){
    parent::__construct();
  }

  /**
   * get all available assignments
   */
  public function events() {
    return $this->_db->select('SELECT id, targetDate, description FROM Events WHERE inactive = FALSE ORDER BY id ASC');
  }

  public function eventsAllCount() {
    $result = $this->_db->select('SELECT COUNT(id) as eventCount FROM Events WHERE inactive = FALSE');
    return $result[0]["eventCount"];
  }

  public function eventCount() {
    $result = $this->_db->select('SELECT COUNT(id) as eventCount FROM Events WHERE inactive = FALSE AND targetDate >= NOW() - INTERVAL 7 DAY');
    return $result[0]["eventCount"];
  }

  /**
   * get all available events (paginated)
   * with a date range starting from now - 7 days
   */
  public function eventsLimited($offset,$limit) {
    $data = array('offset' => array("value" => intval($offset), "type" => PDO::PARAM_INT),
    'limit' => array('value' => intval($limit), "type" => PDO::PARAM_INT));

    return $this->_db->selectWithTypeBinding('SELECT id, targetDate, description 
      FROM Events 
      WHERE inactive = FALSE AND targetDate >= NOW() - INTERVAL 7 DAY
      ORDER BY targetDate ASC limit :offset, :limit ',
        $data
      );
  }

  public function activities() {
    return $this->_db->select('SELECT a.id, a.name as name, a.description,a.categoryId, ac.name as categoryname
     FROM Activities as a 
     JOIN ActivityCategories as ac 
     WHERE a.categoryId = ac.id  
     ORDER BY categoryname ASC, name ASC');
  }

  /**
   * Returns assignments limited
   */
  public function assignmentsLimited($page) {
    $eventIds = $this->eventIdsLimited($page);
    $eventIds_string = implode(',', $eventIds); // WITHOUT WHITESPACES BEFORE AND AFTER THE COMMA
    //$stmt->bindParam('eventIdArray', $eventIds_string);

  

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
    return $this->_db->select('SELECT id FROM Events');
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
