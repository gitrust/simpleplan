<?php

class Resources extends Controller {

  public function __construct() {
    parent::__construct($needsLogin=true);
  }

  public function index() { 
    
    $this->render();
  }

  /**  API: Add resource */
  public function add() {
    $this->addResource();
    
    $this->render(); 
  }

  /** API: Delete resource */
  public function del($resourceId) {
    if (!empty($resourceId)) {
      $this->_model->deleteResource($resourceId);
    }
    
    $this->render();    
  }

     // Helper Function
  private function addResource() {
    if (!empty($_POST['name'])) {
        $this->_model->addResource(trim($_POST['name']),trim($_POST['desc']));
    }
  }

  private function render() {
    $data["isadmin"] = $this->isAdmin();
    $data["ismanager"] = $this->isManager();
    $data['resources'] = $this->_model->resources();
    $data['title'] = I18n::tr('title.resourcesite') ;
    $data['form_header'] = I18n::tr('form.login');

    $this->_view->render('header', $data);
    $this->_view->render('container_start', $data);
    $this->_view->render('nav', $data);
    $this->_view->render('partials/admin/head', $data);
    $this->_view->render('partials/admin/nav', $data);
    $this->_view->render('resources/form', $data);
    $this->_view->render('resources/list', $data);
    $this->_view->render('partials/admin/footer', $data);
    $this->_view->render('container_end', $data);
    $this->_view->render('footer');
  }
}
