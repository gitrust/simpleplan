<?php

class Termin_Model extends Model {

  public function __construct(){
    parent::__construct();
  }

  /**
   * get all available schedules
   */
  public function schedules() {
    return $this->_db->select('SELECT id, targetDate FROM Events ORDER BY id ASC LIMIT 0, 100');
  }

  /**
   * get all available roles
   */
  public function roles() {
    return $this->_db->select('SELECT id, role, departmentId, description FROM DepartmentRoles ORDER BY role DESC LIMIT 0, 50');
  }
  
  /**
   * get all entries for a user
   */
  public function entries($userId) {
  	 return $this->_db->select('SELECT id, roleId,userId,eventId FROM UserRoleEvents WHERE userId = :userId LIMIT 0, 400',array("userId" => $userId));
  }

  /**
   * get all entries for all user
   */
  public function teamEntries() {
     return $this->_db->select('SELECT e.id as id, e.roleId as roleId,e.userId as userId, u.firstname as firstname, e.eventId as scheduleId' 
     . ' FROM UserRoleEvents e, Users u  ' 
     . ' WHERE  e.userId = u.id '
     . ' ORDER BY e.roleId, e.eventId, u.firstname '
     . ' LIMIT 0, 500');
  }
  
  /**
   * delete all entries for a user
   */
  public function deleteEntriesForUser($userId) {
	 return $this->_db->delete('UserRoleEvents',array("userId" => $userId),$limit = 100);  
  }
  
  public function insertEntryForUser($userId,$roleId,$scheduleId) {
  		return $this->_db->insert("UserRoleEvents",array("userId" => $userId,"roleId" => $roleId,"eventId" => $scheduleId));
  }

}
