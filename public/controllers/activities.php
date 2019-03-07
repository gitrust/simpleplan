<?php

class Activities extends Controller {

  public function __construct() {
    parent::__construct($needsLogin=true);
  }

  public function index() {  	 
    $data["isadmin"] = $this->isAdmin();
    $data['activities'] = $this->_model->activities();
    $data['categories'] = $this->_model->categories();
    $data['title'] = I18n::tr('title.activitysite');
    $data['form_header'] = I18n::tr('form.login');
    
    $this->render($data);
  }

  /**  API: Add Activity */
  public function add() {
    $this->addActivity();

    $data['activities'] = $this->_model->activities();
    $data['categories'] = $this->_model->categories();
    $data['title'] = I18n::tr('title.activitysite') ;
    $data['form_header'] = I18n::tr('form.login');
    
    $this->render($data); 
  }

  /** API: Delete resource */
  public function del($id) {
    if (!empty($id)) {
      $this->_model->delete($id);
    }

    $data["isadmin"] = $this->isAdmin();
    $data['activities'] = $this->_model->activities();
    $data['categories'] = $this->_model->categories();
    $data['title'] = I18n::tr('title.activitysite') ;
    $data['form_header'] = I18n::tr('form.login');
    $this->render($data);    
  }

     // Helper Function
  private function addActivity() {
    if (!empty($_POST['name']) && !empty($_POST['category'])) {
        $name = trim($_POST['name']);
        $category = intval($_POST['category']);
        $desc =  trim($_POST['desc']);
        $this->_model->add($name,$category,$desc);
    }
  }

  private function render($data) {
    $this->_view->render('header', $data);
    $this->_view->render('nav', $data);
    $this->_view->render('partials/admin/head', $data);
    $this->_view->render('partials/admin/nav', $data);
    $this->_view->render('activities/form', $data);
    $this->_view->render('activities/list', $data);
    $this->_view->render('partials/admin/footer', $data);
    $this->_view->render('footer');
  }
}