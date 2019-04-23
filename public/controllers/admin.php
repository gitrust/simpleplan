<?php

class Admin extends Controller {

  public function __construct() {
    parent::__construct($needsLogin=true);
  }

  public function index() {
    $this->renderEvents($data);   
  }

  /** API: Get Events */
  public function events() {
    $this->renderEvents($data);    
  }

  /** API: Delete Event */
  public function eventdel($id) {
    if (!empty($id)) {
      $this->_model->deleteEvent($id);
    }

    $this->renderEvents($data);    
  }

  /** API: Add Event */
  public function eventadd() {
    $this->addEvent();
    
    $this->renderEvents($data); 
  }


  // Helper Function
  private function addEvent() {
    if (!empty($_POST['targetDate'])) {
        $date = date_parse_from_format('d.m.Y',$_POST['targetDate']);
        $this->_model->addEvent($date,trim($_POST['desc']));
    }
  }
  
  // RENDER TEMPLATES

  private function renderEvents($data) {
    $data["isadmin"] = $this->isAdmin();
    $data['schedules'] = $this->_model->events();
    $data['title'] = I18n::tr('title.schedules') ;
    $data['form_header'] = I18n::tr('form.login');

    $this->_view->render('header', $data);
    $this->_view->render('container_start', $data);
    $this->_view->render('nav', $data);
    $this->_view->render('admin/head', $data);
    $this->_view->render('admin/nav', $data);
    $this->_view->render('admin/eventedit', $data);
    $this->_view->render('admin/eventtable', $data);
    $this->_view->render('admin/footer', $data);
    $this->_view->render('container_end', $data);
    $this->_view->render('footer');
  } 


}
