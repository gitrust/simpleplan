<?php

class Termin extends Controller {

  public function __construct() {
    parent::__construct();
  }

  public function index() {
  	 $this->checkAccess();
  	 
    $this->render();
  }

  public function genKey($termin,$rolle) {
    return "x";
  }
  
  private function checkAccess() {  	
  	  if (!Session::get("userid")) {
		 $data['location'] = 'login/logout/';
      	// redirect and die
       $this->_view->render('redirect', $data); 	  
  	  } 
  }

  public function store() {
  	 $this->checkAccess();
  	 
  	 $keys = $this->entryKeysFromUi();
    $this->storeKeys($keys);
    
    $this->render();
  }
  
  public function reset() {
  	 $this->checkAccess();
    
    $this->render();
  }
  
  private function entryKeysFromDb() {
    $userId = Session::get("userid");
    $schedules = $this->_model->entries($userId);
    
    $keysFromDB = array();
    foreach ($schedules as $schedule) {
    	 $key = $schedule["scheduleId"] . '-' . $schedule["roleId"]; 
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
    $data['title'] = I18n::tr('title.schedulelist');
    
    $data['schedules'] = $this->_model->schedules();
    $data['roles'] = $this->_model->roles();
    $data['entrykeys'] = $this->entryKeysFromDb();

    $this->_view->render('header', $data);
    $this->_view->render('nav', $data);
    $this->_view->render('termin/list', $data);      
    $this->_view->render('footer');
  }

}
