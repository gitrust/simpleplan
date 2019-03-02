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
      }       
    }
    $this->render();
  }

  public function del($assignmentid) {
    if (!empty($assignmentid)) {
      $this->_model->delete($assignmentid);
    }
    $this->render();
  }

  private function createtable($data) {
      $table[] = array();

      $assignments = $this->_model->assignments();

      $row = 0;      
      foreach ($data['activities'] as $activity) {
         $col = 0;
         foreach ($data['events'] as $event) {

            // FIXME improve performance
            // search for existing assignments
            $assignment = array();
            foreach ($assignments as $a) {
                $key = $event["id"] . '-' . $activity["id"];
                if ($a["combkey"] == $key) {
                  $assignment = array("resourcename" => $a["resourcename"],"id" => $a["id"]);
                  break;
                }
            }

            // generate assignment table
            $table[$row][$col] = array("eventid" => $event["id"], 
              "activityid" => $activity["id"],
              "activityname" => $activity["name"] ,
              "assignmentid" => $assignment["id"], 
              "resourceexists" => count($assignment) > 0,
              "resourcename" => $assignment["resourcename"]);
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
