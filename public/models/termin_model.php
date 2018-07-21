<?php

class Termin_Model extends Model {

  public function __construct(){
    parent::__construct();
  }

  /**
   * get all available schedules
   */
  public function schedules() {
    return $this->_db->select('SELECT id, targetDate FROM Schedule ORDER BY id ASC LIMIT 0, 100');
    //return array("01.02.2018","10.07.2018","13.08.2018");
  }

  /**
   * get all available roles
   */
  public function roles() {
    return $this->_db->select('SELECT id, role FROM Roles ORDER BY role DESC LIMIT 0, 20');
    //return array("hh","e-guitar","drummer","leader","singer1","singer2","singer3","piano","e-bass");
  }
  
  /**
   * get all entries for a user
   */
  public function entries($userId) {
  	 return $this->_db->select('SELECT id, roleId,userId,scheduleId FROM Entries WHERE userId = :userId LIMIT 0, 200',array("userId" => $userId));
  }

  /**
   * get all entries for all user
   */
  public function teamEntries() {
     return $this->_db->select('SELECT id, roleId,userId,scheduleId FROM Entries  LIMIT 0, 500');
  }
  
  /**
   * delete all entries for a user
   */
  public function deleteEntriesForUser($userId) {
	 return $this->_db->delete('Entries',array("userId" => $userId),$limit = 100);  
  }
  
  public function insertEntryForUser($userId,$roleId,$scheduleId) {
  		return $this->_db->insert("Entries",array("userId" => $userId,"roleId" => $roleId,"scheduleId" => $scheduleId));
  }

}
