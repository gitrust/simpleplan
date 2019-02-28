<?php

class Schedules_Model extends Model {

  public function __construct(){
    parent::__construct();
  }

  /**
   * get all available assignments
   */
  public function events() {
    return $this->_db->select('SELECT id, targetDate, description FROM Events ORDER BY id ASC LIMIT 0, 100');
  }

  public function activities() {
    return $this->_db->select('SELECT a.id, a.name as name, a.description,a.categoryId, ac.name as categoryname
     FROM Activities as a JOIN ActivityCategories as ac WHERE a.categoryId = ac.id  ORDER BY a.id DESC LIMIT 0, 100');
  }

}
