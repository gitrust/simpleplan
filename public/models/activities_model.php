<?php

class Activities_Model extends Model {

  public function __construct(){
    parent::__construct();
  }

  /**
   * Get all available activitie
   */
  public function activities() {
    return $this->_db->select('SELECT a.id, a.name as name, a.description,a.categoryId, ac.name as categoryname
     FROM Activities as a JOIN ActivityCategories as ac WHERE a.categoryId = ac.id  ORDER BY a.id DESC LIMIT 0, 100');
  }


   /**
   * Delete an Activity
   */
  public function delete($id) {
    return $this->_db->delete('Activities',array("id" => $id),$limit = 1); 
  }

  /**
   * Get all available Activity names
   */
  public function activityNames() {
    $result  = array_values($this->_db->select('SELECT name FROM Activities ORDER BY name DESC LIMIT 0, 20'));
    $names = array();
    foreach ($result as $ar) {
        array_push($names,$ar["name"]);
    }
    return $names;
  }
  
  public function getActivity($id) {
    return $this->_db->select('SELECT id, name, categoryId, description FROM Activities WHERE id = :id',array("id" => $id));
  }


  /**
   * Add new Activity
   */
  public function add($name,$description="") {
    if (!empty($name)) {
      return  $this->_db->insert('Activities',array("name" => substr($name,0,29),"description" => substr($description,0,149),"categoryId" => 1));
    }
    return -1;
  }

}
