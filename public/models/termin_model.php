<?php

class Termin_Model extends Model {

  public function __construct(){
    parent::__construct();
  }

  public function termine() {
    return $this->_db->select('SELECT id, targetDate FROM Entries ORDER BY id DESC LIMIT 0, 100');
    //return array("01.02.2018","10.07.2018","13.08.2018");
  }

  public function rollen() {
    return $this->_db->select('SELECT id, role FROM Roles ORDER BY role DESC LIMIT 0, 20');
    //return array("hh","e-guitar","drummer","leader","singer1","singer2","singer3","piano","e-bass");
  }

}
