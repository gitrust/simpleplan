<?php

class Events_Model extends Model {

  public function __construct(){
    parent::__construct();
  }

  /**
   * get all schedules
   */
  public function schedules() {
    return $this->_db->select('SELECT id, targetDate FROM Events ORDER BY id ASC LIMIT 0, 500');
  }

  /**
   * get all available schedules
   */
  public function available_schedules() {
    return $this->_db->select('SELECT id, targetDate FROM Events WHERE targetDate >= CURDATE() ORDER BY id ASC LIMIT 0, 500');
  }

  /**
   * get all available roles
   */
  public function roles() {
    return $this->_db->select('SELECT id, name, categoryId, description FROM Activities ORDER BY name DESC LIMIT 0, 100');
  }


}
