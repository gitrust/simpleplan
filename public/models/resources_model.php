<?php

class Resources_Model extends Model {

  public function __construct(){
    parent::__construct();
  }

  /**
   * Get all available resources
   */
  public function resources() {
    return $this->_db->select('SELECT r.id as id, r.name as name, r.description as description, COUNT(ra.id) as usagecount 
      FROM Resources r
      LEFT JOIN ResourceAssignment ra ON ra.resourceid = r.id
      GROUP BY name, description, id
      ORDER BY r.name ASC');
  }

  /** Add new resource */
  public function addResource($name,$description="") {
    if (!empty($name)) {
      return  $this->_db->insert('Resources',array("name" => substr($name,0,29),"description" => substr($description,0,149)));
    }
    return -1;
  }

   /**
   * Delete an Resource
   */
  public function deleteResource($id) {
    $this->_db->delete('ResourceAssignment',array("resourceId" => $id),$limit = 'no'); 
    return $this->_db->delete('Resources',array("id" => $id),$limit = 1); 
  }

}
