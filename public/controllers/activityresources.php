<?php

class ActivityResources extends Controller {

  public function __construct() {
    parent::__construct($needsLogin=true);
  }


  public function index() {
    $this->render();
  }
  
  private function render() {
    $data['title'] = I18n::tr('title.activityresources');
    $data["isadmin"] = $this->isAdmin();
    $data["ismanager"] = $this->isManager();
    $data["readonly"] = !($this->isAdmin() || $this->isManager());
    $data['events'] = $this->_model->events();

    // Render
    $this->_view->render('header', $data);
    $this->_view->render('container_start', $data);
    $this->_view->render('nav', $data);
    $this->_view->render('activityresources/modal', $data);
    $this->_view->render('activityresources/list', $data);
    $this->_view->render('container_end', $data);
    $this->_view->render('footer');
  } 

}
