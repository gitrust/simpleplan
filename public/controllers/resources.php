<?php

class Resources extends Controller {

  public function __construct() {
    parent::__construct($needsLogin=true);
  }

  public function index() {  	 
    $data["isadmin"] = $this->isAdmin();
    $data['resources'] = $this->_model->resources();
    $data['title'] = I18n::tr('title.resourcesite');
    $data['form_header'] = I18n::tr('form.login');
    
    $this->render($data);
  }

  /**  API: Add resource */
  public function add() {
    $this->addResource();

    $data['resources'] = $this->_model->resources();
    $data['title'] = I18n::tr('title.resourcesite') ;
    $data['form_header'] = I18n::tr('form.login');
    
    $this->render($data); 
  }

  /** API: Delete resource */
  public function del($resourceId) {
    if (!empty($resourceId)) {
      $this->_model->deleteResource($resourceId);
    }

    $data["isadmin"] = $this->isAdmin();
    $data['resources'] = $this->_model->resources();
    $data['title'] = I18n::tr('title.resourcesite') ;
    $data['form_header'] = I18n::tr('form.login');
    $this->render($data);    
  }

     // Helper Function
  private function addResource() {
    if (!empty($_POST['name'])) {
        $this->_model->addResource(trim($_POST['name']),trim($_POST['desc']));
    }
  }

  private function render($data) {
    $this->_view->render('header', $data);
    $this->_view->render('nav', $data);
    $this->_view->render('partials/admin/head', $data);
    $this->_view->render('partials/admin/nav', $data);
    $this->_view->render('resources/form', $data);
    $this->_view->render('resources/list', $data);
    $this->_view->render('partials/admin/footer', $data);
    $this->_view->render('footer');
  }
}
