<?php

class Activities_Model extends Model {

  public function __construct(){
    parent::__construct();
  }

  /**
   * Get all available activities
   */
  public function activities() {
    return $this->_db->select('SELECT a.id, a.name as name, a.inactive as inactive, a.description,a.categoryId, ac.name as categoryname
     FROM Activities as a JOIN ActivityCategories as ac WHERE a.categoryId = ac.id  ORDER BY ac.name ASC, a.name ASC LIMIT 0, 100');
  }

  /**
   * Get all available activity categories
   */
  public function categories() {
    return $this->_db->select('SELECT id, name, description
     FROM  ActivityCategories   ORDER BY name ASC LIMIT 0, 100');
  }


   /**
   * Delete an Activity
   */
  public function delete($id) {
    return $this->_db->delete('Activities',array("id" => $id),$limit = 1); 
  }

  /**
   * Activate an Activity
   */
  public function activate($id) {
    return $this->_db->update('Activities',array('inactive' => 0), array('id' => $id)); 
  }

  /**
   * Deactivate an Activity
   */
  public function deactivate($id) {
    return $this->_db->update('Activities',array('inactive' => TRUE), array('id' => $id)); 
  }

  /**
   * Get all available Activity names
   */
  public function activityNames() {
    $result  = array_values($this->_db->select('SELECT name 
    FROM Activities ORDER BY name DESC LIMIT 0, 200'));

    $names = array();
    foreach ($result as $ar) {
        array_push($names,$ar["name"]);
    }
    return $names;
  }
  
  /**
   * Get an activity by id
   */
  public function getActivity($id) {
    return $this->_db->select('SELECT id, name, categoryId, description 
    FROM Activities WHERE id = :id',array("id" => $id));
  }


  /**
   * Add new Activity
   */
  public function add($name,$categoryid,$description="") {
    if (!empty($name) && !empty($categoryid)) {
      return  $this->_db->insert('Activities',
        array("name" => substr($name,0,29),"description" => substr($description,0,149),"categoryId" => $categoryid)
      );
    }
    return -1;
  }

}
