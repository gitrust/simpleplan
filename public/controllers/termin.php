<?php

class Termin extends Controller {

  public function __construct() {
    parent::__construct($needsLogin=true);
  }

  public function index() {  	 
     $this->render();
  }

  public function key($termin,$rolle) {
    return "x";
  }  
  
  public function update() {
  	 $keys = $this->entryKeysFromUi();
     $this->storeKeys($keys);
    
     $this->render();
  }
  
  public function reset() {
     $this->render();
  }

  public function mylist() {
    $this->render();
  }

  public function teamlist() {    
    $this->renderTeamlist();
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
    $data['schedules'] = $this->_model->schedules();
    $data['roles'] = $this->_model->roles();
    $data['entrykeys'] = $this->entryKeysFromDb();

    $this->_view->render('header', $data);
    $this->_view->render('nav', $data);
    $this->_view->render('termin/list', $data);      
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

  private function renderTeamlist() {
    $entryUsers = $this->entryUsers();

    $data['title'] = I18n::tr('title.teamlist');
    $data['entryUsers'] = $entryUsers;
    $data["isadmin"] = $this->isAdmin();
    $data['schedules'] = $this->_model->schedules();
    $data['roles'] = $this->_model->roles();
    $data['entrykeys'] = $this->entryKeysFromDb();

    $this->_view->render('header', $data);
    $this->_view->render('nav', $data);
    $this->_view->render('termin/teamlist', $data);      
    $this->_view->render('footer');
  }  

}
