<?php

class Admin extends Controller {

  public function __construct() {
    parent::__construct($needsLogin=true);
  }

  public function index() {
    $data["isadmin"] = $this->isAdmin();
    $data['title'] = I18n::tr('title.activitysite');
    $data['form_header'] = I18n::tr('form.login');
    $this->renderActivities($data);
  }


  /** API: Get Roles */
  public function activities() {
    $data["isadmin"] = $this->isAdmin();
    $data['activities'] = $this->_model->activities();
    $data['title'] = I18n::tr('title.activitysite');
    $data['form_header'] = I18n::tr('form.login');
    $this->renderActivities($data);
  }

  /** API: Add New Activity */
  public function activityadd() {
    $this->addActivity();

    $data["isadmin"] = $this->isAdmin();
    $data['activities'] = $this->_model->activities();
    $data['title'] = I18n::tr('title.activitysite') ;
    $data['form_header'] = I18n::tr('form.login');
    
    $this->renderActivities($data); 
  }

  /** API: Delete Activity */
  public function activitydel($activityId) {
    if (!empty($activityId)) {
      $this->_model->deleteActivity($activityId);
    }

    $data["isadmin"] = $this->isAdmin();
    $data['activities'] = $this->_model->activities();
    $data['title'] = I18n::tr('title.activitysite') ;
    $data['form_header'] = I18n::tr('form.login');
    $this->renderActivities($data);    
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

  /** API: Get Users */
  public function users() {
    $data["isadmin"] = $this->isAdmin();
    $data['users'] = $this->_model->users(Session::get('userid'));
    $data['title'] = I18n::tr('title.users') ;
    $data['form_header'] = I18n::tr('form.login');
    $this->renderUsers($data);    
  }

  /** API: Delete User */
  public function userdel($id) {
    if (!empty($id)) {
      $this->_model->deleteUser($id,Session::get('userid'));
    }

    $data["isadmin"] = $this->isAdmin();
    $data['users'] = $this->_model->users(Session::get('userid'));
    $data['title'] = I18n::tr('title.users') ;
    $data['form_header'] = I18n::tr('form.login');
    $this->renderUsers($data);    
  }

  /** API: Add New User */
  public function useradd() {
    $this->addUser();

    $data["isadmin"] = $this->isAdmin();
    $data['users'] = $this->_model->users(Session::get('userid'));
    $data['title'] = I18n::tr('title.users') ;
    $data['form_header'] = I18n::tr('form.login');
    
    $this->renderUsers($data); 
  }

  /**  API: Get resources */
  public function resources() {
    $data["isadmin"] = $this->isAdmin();
    $data['resources'] = $this->_model->resources();
    $data['title'] = I18n::tr('title.resourcessite');
    $data['form_header'] = I18n::tr('form.login');
    $this->renderResources($data);
  }

  /**  API: Add resource */
  public function resourceadd() {
    $this->addResource();

    $data['resources'] = $this->_model->resources();
    $data['title'] = I18n::tr('title.resourcesite') ;
    $data['form_header'] = I18n::tr('form.login');
    
    $this->renderResources($data); 
  }

  /** API: Delete resource */
  public function resourcedel($resourceId) {
    if (!empty($resourceId)) {
      $this->_model->deleteResource($resourceId);
    }

    $data["isadmin"] = $this->isAdmin();
    $data['resources'] = $this->_model->resources();
    $data['title'] = I18n::tr('title.resourcessite') ;
    $data['form_header'] = I18n::tr('form.login');
    $this->renderResources($data);    
  }

  // Helper Function
  private function addEvent() {
    if (!empty($_POST['targetDate'])) {
        $this->_model->addEvent(trim($_POST['targetDate']),trim($_POST['desc']));
    }
  }

    // Helper Function
  private function addResource() {
      if (!empty($_POST['name'])) {
          $this->_model->addResource(trim($_POST['name']),trim($_POST['desc']));
      }
    }

  // Helper Function
  private function addActivity() {
    if (!empty($_POST['name'])) {
        $this->_model->addActivity(trim($_POST['name']),trim($_POST['desc']));
    }
  }

  // Helper Function
  private function addUser() {
    if (!empty($_POST['login']) && !empty($_POST['firstname']) && !empty($_POST['pass'])) {
        $genpass = Pass::generate($_POST['pass']);
        $email = $_POST['email'];
        $admin = !empty($_POST['isadmin']);
        $this->_model->addUser(trim($_POST['login']),trim($_POST['firstname']),$genpass,$email,$admin);
    }
  }  
  
  // RENDER TEMPLATES

  private function renderActivities($data) {
    $this->_view->render('header', $data);
    $this->_view->render('nav', $data);
    $this->_view->render('admin/head', $data);
    $this->_view->render('admin/nav', $data);
    $this->_view->render('admin/activityedit', $data);
    $this->_view->render('admin/activitytable', $data);
    $this->_view->render('admin/footer', $data);
    $this->_view->render('footer');
  }

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

  private function renderUsers($data) {
    $this->_view->render('header', $data);
    $this->_view->render('nav', $data);
    $this->_view->render('admin/head', $data);
    $this->_view->render('admin/nav', $data);
    $this->_view->render('admin/useredit', $data);
    $this->_view->render('admin/usertable', $data);
    $this->_view->render('admin/footer', $data);
    $this->_view->render('footer');
  } 

  private function renderResources($data) {
    $this->_view->render('header', $data);
    $this->_view->render('nav', $data);
    $this->_view->render('admin/head', $data);
    $this->_view->render('admin/nav', $data);
    $this->_view->render('admin/resourceedit', $data);
    $this->_view->render('admin/resourcelist', $data);
    $this->_view->render('admin/footer', $data);
    $this->_view->render('footer');
  }

}
