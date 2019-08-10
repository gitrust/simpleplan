<?php

class ActivityResources_Model extends Model {


  public function __construct(){
    parent::__construct();
  }

  /**
   * get current events 
   */
  public function events() {
    return $this->_db->select('SELECT id, targetDate, description 
      FROM Events 
      WHERE inactive = FALSE AND targetDate >= (NOW() - INTERVAL 5 DAY ) 
      ORDER BY targetDate ASC');
  }


  public function activity($id) {
    $activity =  $this->_db->select('SELECT a.id as id, 
     a.name as activityname,
     a.description as activitydescription,
     a.categoryId as categoryId, 
     ac.name as categoryname
     FROM Activities as a 
     JOIN ActivityCategories as ac 
     on a.categoryId = ac.id
     WHERE a.id = :aid
     ORDER BY ac.name ASC, a.name ASC',
     array('aid' => $id));

     if (empty($activity)) {
       return array();
     }
     return $activity[0];
  }

  public function resourceAssignments($activityId) {
    return $this->_db->select('SELECT ra.id, ra.eventId as eventId, ra.resourceId, r.name as resourcename
      FROM ResourceAssignment as ra
      JOIN Resources as r on r.id = ra.resourceId 
      WHERE ra.activityId = :activityId ', array('activityId' => $activityId));
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
    return $this->_db->select('SELECT id, name, description FROM Resources ORDER BY name ASC LIMIT 0, 500');
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
