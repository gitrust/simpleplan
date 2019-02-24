<?php

class Schedules_Model extends Model {

  public function __construct(){
    parent::__construct();
  }

  /**
   * get all available assignments
   */
  public function events() {
    return $this->_db->select('SELECT id, targetDate FROM Events ORDER BY id ASC LIMIT 0, 100');
  }

  public function activities() {
    return $this->_db->select('SELECT id, name FROM Activities ORDER BY id ASC LIMIT 0, 100');
  }

}
