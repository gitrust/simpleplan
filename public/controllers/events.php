<?php

class Events extends Controller {

  public function __construct() {
    parent::__construct($needsLogin=true);
  }

  public function index() {  	 
     $this->render();
  }

  
  /** API: Update function */
  public function update() {
  	 $keys = $this->entryKeysFromUi();
     if ($this->isPost()) {
        $this->storeKeys($keys);
     }
    
     $this->render();
  }
  
  /** API: Reset form */
  public function reset() {
     $this->render();
  }

  /** API: My Event list */
  public function mylist() {
    $this->render();
  }


  public function key($termin,$rolle) {
    return "x";
  }  
  
  private function entryKeysFromDb() {
    $userId = Session::get("userid");
    $entries = $this->_model->entries($userId);
    
    $keysFromDB = array();
    foreach ($entries as $entry) {
    	 $key = $entry["scheduleId"] . '-' . $entry["roleId"]; 
       array_push($keysFromDB,$key);
    }
    return $keysFromDB;
  }
  
  private function entryKeysFromUi() {
    $keysFromUi = array();
    if (!empty($_POST['entrykeys'])) {
      $entries = $_POST['entrykeys'];

      foreach ($entries as $entry) {
      	array_push($keysFromUi,$entry);
      }
    }
    return $keysFromUi;
  }
  
  private function storeKeys($keys) {
		$userId = Session::get("userid");
		
		$this->_model->deleteEntriesForUser($userId);
        
		foreach ($keys as $key) {
			$scheduleId = explode('-',$key,2)[0];
			$roleId = explode('-',$key,2)[1];
			$this->_model->insertEntryForUser($userId,$roleId,$scheduleId);			
		}
  }
  
  private function render() {
    $data['title'] = I18n::tr('title.entrylist');
    
    $data["isadmin"] = $this->isAdmin();
    $data["ismanager"] = $this->isManager();
    $data['schedules'] = $this->_model->schedules();
    $data['roles'] = $this->_model->roles();
    $data['entrykeys'] = $this->entryKeysFromDb();

    $this->_view->render('header', $data);
    $this->_view->render('container_start', $data);
    $this->_view->render('nav', $data);
    $this->_view->render('events/list', $data);
    $this->_view->render('container_end', $data);   
    $this->_view->render('footer');
  }

  /**
   * returns an array with user names
   * (key)scheduleId-roleId : (value)array with usernames
   */
  private function entryUsers() {
    $teamEntries = $this->_model->teamEntries();
    $entryUsers = array();
    foreach ($teamEntries as $te) {
      $key =  $te['scheduleId'] . '-' . $te['roleId'];
      $userName = $te['firstname'];
      if (array_key_exists($key,$entryUsers)) {
         array_push($entryUsers[$key], $userName);
      } else {
         $entryUsers[$key] = array($userName);
      }
    }
    return $entryUsers;
  }

}
