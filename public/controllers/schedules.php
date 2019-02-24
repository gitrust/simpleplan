<?php

class Schedules extends Controller {

  public function __construct() {
    parent::__construct($needsLogin=true);
  }

  public function index() {  	 
     $this->render();
  }
  
  
  private function render() {
    $data['title'] = I18n::tr('title.entrylist');
    
    $data["isadmin"] = $this->isAdmin();
    $data['schedules'] = $this->_model->events();

    $this->_view->render('header', $data);
    $this->_view->render('nav', $data);
    $this->_view->render('schedules/list', $data);      
    $this->_view->render('footer');
  } 

}
