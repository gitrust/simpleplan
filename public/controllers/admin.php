<?php

class Admin extends Controller {

  public function __construct() {
    parent::__construct($needsLogin=true);
  }

  public function index() {
    $data["isadmin"] = $this->isAdmin();
    $data['schedules'] = $this->_model->events();
    $data['title'] = I18n::tr('title.schedules') ;
    $data['form_header'] = I18n::tr('form.login');
    $this->renderEvents($data);   
  }

  /** API: Get Events */
  public function events() {
    $data["isadmin"] = $this->isAdmin();
    $data['schedules'] = $this->_model->events();
    $data['title'] = I18n::tr('title.schedules') ;
    $data['form_header'] = I18n::tr('form.login');
    $this->renderEvents($data);    
  }

  /** API: Delete Event */
  public function eventdel($id) {
    if (!empty($id)) {
      $this->_model->deleteEvent($id);
    }

    $data["isadmin"] = $this->isAdmin();
    $data['schedules'] = $this->_model->events();
    $data['title'] = I18n::tr('title.schedules') ;
    $data['form_header'] = I18n::tr('form.login');
    $this->renderEvents($data);    
  }

  /** API: Add Event */
  public function eventadd() {
    $this->addEvent();

    $data['schedules'] = $this->_model->events();
    $data['title'] = I18n::tr('title.schedules') ;
    $data['form_header'] = I18n::tr('form.login');
    
    $this->renderEvents($data); 
  }

  

  // Helper Function
  private function addEvent() {
    if (!empty($_POST['targetDate'])) {
        $this->_model->addEvent(trim($_POST['targetDate']),trim($_POST['desc']));
    }
  }

  
  
  // RENDER TEMPLATES

  private function renderEvents($data) {
    $this->_view->render('header', $data);
    $this->_view->render('nav', $data);
    $this->_view->render('admin/head', $data);
    $this->_view->render('admin/nav', $data);
    $this->_view->render('admin/eventedit', $data);
    $this->_view->render('admin/eventtable', $data);
    $this->_view->render('admin/footer', $data);
    $this->_view->render('footer');
  } 


}
