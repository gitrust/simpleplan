<?php

class Schedules extends Controller {

  public function __construct() {
    parent::__construct($needsLogin=true);
  }

  public function index() { 
     $this->render();
  }

  // FIXME only admin should do that
  public function add() {
    if (strtoupper($_SERVER['REQUEST_METHOD']) == 'POST') {
      if (!empty($_POST['activity']) && !empty($_POST['event']) && !empty($_POST['resource'])) {
        $activity = $_POST['activity'];
        $event = $_POST['event'];
        $resource = $_POST['resource'];        
        $this->_model->add($event,$activity,$resource);
        Message::set("ja");
      } else {
        Message::set($_POST['resource']);
      }
      
    }
    $this->render();
  }

  private function createtable($data) {
      $table[] = array();

      $row = 0;      
      foreach ($data['activities'] as $activity) {
         $col = 0;
         foreach ($data['events'] as $event) {
            $table[$row][$col] = array("eventid" => $event["id"], "activityid" => $activity["id"],"activityname" => $activity["name"] ,"resourceid" => 0, "resourcename" => "hello");
            $col++;
         }
         $row++;
      }

      return $table;
  }  
  
  private function render() {
    $data['title'] = I18n::tr('title.entrylist');
    
    $data["isadmin"] = $this->isAdmin();
    $data['events'] = $this->_model->events();
    $data['activities'] = $this->_model->activities();
    $data['resources'] = $this->_model->resources();

    $data['tabledata'] = $this->createtable($data);    

    $this->_view->render('header', $data);
    $this->_view->render('nav', $data);
    $this->_view->render('schedules/list', $data);      
    $this->_view->render('footer');
  } 

}
