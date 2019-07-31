<?php

class ActivityResources extends Controller {

  public function __construct() {
    parent::__construct($needsLogin=true);
  }

  public function index($parameters) {
    $data['activityId'] = $parameters[0];

    $this->render($data);
  }

  public function list($parameters) {
    $data['activityId'] = $parameters[0];

    $this->render($data);
  }

  public function add($parameters) {
    // TODO Verhindern dass mehrere gleiche ressourcen am gleichen tag angelegt werden können?
    // gleiches gilt bei terminen?
    $data['activityId'] = $parameters[0];
    $activity =  $parameters[0];

    if ($this->isPost()){
      $event = $this->getParamPost('event');
      $resource = $this->getParamPost('resource');

      if (!empty($activity) && !empty($event) && !empty($resource)) {
        $this->_model->add($event,$activity,$resource);
      }
    }
    $this->render($data);
  }

  public function del($activityId,$assignmentId) {
    $data['activityId'] = $activityId;

    if (!empty($assignmentId)) {
      $this->_model->delete($assignmentId);
    }
    $this->render($data);
  }

  /**
   * Build a custom table for the view
   */
  private function createTable($data) {
    $table[] = array();

    $activityId = $data['activityId'];

    $resourceAssignments = $this->_model->resourceAssignments($activityId);

    $row = 0;
    foreach ($data['events'] as $event) {
      
      $assignmentId = 0;
      $resourceName = '';

      // FIXME improve search
      foreach ($resourceAssignments as $ra) {
        if ($ra['eventId'] == $event['id']) {
          $assignmentId = $ra['id'];
          $resourceName = $ra['resourcename'];
        }
      }

      $table[$row] = array('eventId' => $event['id'],
         'targetDate' => UiHelper::formatDate($event['targetDate']),
         'description' => $event['description'],
         'resourcename' => $resourceName,
         'activityId' => $activityId,
         'assignmentId' => $assignmentId,
         'entryExists' => $assignmentId > 0);
      $row++;
    }
    return $table;
  }
  
  private function render($data) {
    $activities = $this->_model->activity($data['activityId']);
    
    // FIXME
    $activityname = $activities[0]['activityname'];

    $data['title'] = I18n::tr('title.activityresources');
    $data["isadmin"] = $this->isAdmin();
    $data["ismanager"] = $this->isManager();
    $data["readonly"] = !($this->isAdmin() || $this->isManager());
    $data['events'] = $this->_model->events();
    $data['resources'] = $this->_model->resources();
    $data['activityname'] = $activityname;

    $table = $this->createTable($data);
    $data['table'] = $table;

    // Render
    $this->_view->render('header', $data);
    $this->_view->render('container_start', $data);
    $this->_view->render('nav', $data);
    $this->_view->render('activityresources/modal', $data);
    $this->_view->render('activityresources/list', $data);
    $this->_view->render('activityresources/scripts', $data);
    $this->_view->render('container_end', $data);
    $this->_view->render('footer');
  } 

}
