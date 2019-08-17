<?php

class Statistics_Model extends Model {

    public function __construct(){
        parent::__construct();
    }

    
    public function count_activities() {
         return $this->_db->select('SELECT Count(*) as cnt FROM Activities');
    }

    public function count_inactive_activities() {
        return $this->_db->select('SELECT Count(*) as cnt FROM Activities WHERE inactive = true');
   }

    public function count_users() {
        return $this->_db->select('SELECT Count(*) as cnt FROM Users');
    }

    public function count_events() {
        return $this->_db->select('SELECT Count(*) as cnt FROM Events');
    }

    public function count_old_events() {
        return $this->_db->select('SELECT Count(*) as cnt FROM Events WHERE targetDate < CURDATE()');
    }

    public function count_current_events() {
        return $this->_db->select('SELECT Count(*) as cnt FROM Events WHERE targetDate >= CURDATE()');
    }

    public function count_resources() {
        return $this->_db->select('SELECT Count(*) as cnt FROM Resources');
    }

}
