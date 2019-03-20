<?php

class Resources_Model extends Model {

  public function __construct(){
    parent::__construct();
  }

  /**
   * Get all available resources
   */
  public function resources() {
    return $this->_db->select('SELECT id, name, description FROM Resources ORDER BY name ASC');
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
