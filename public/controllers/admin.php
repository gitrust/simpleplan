<?php

class Admin extends Controller {

  public function __construct() {
    parent::__construct($needsLogin=true);
  }

  public function index() {
    $data["isadmin"] = $this->isAdmin();
    $data['title'] = I18n::tr('title.rolesite');
    $data['form_header'] = I18n::tr('form.login');
    $this->render($data);
  }


  public function roles() {
    $data["isadmin"] = $this->isAdmin();
    $data['roles'] = $this->_model->roles();
    $data['title'] = I18n::tr('title.rolesite');
    $data['form_header'] = I18n::tr('form.login');
    $this->render($data);
  }

  public function roleadd() {
    $this->addRole();

    $data["isadmin"] = $this->isAdmin();
    $data['roles'] = $this->_model->roles();
    $data['title'] = I18n::tr('title.rolesite') ;
    $data['form_header'] = I18n::tr('form.login');
    
    $this->render($data); 
  }

  public function roledel($roleId) {
    if (!empty($roleId)) {
      $this->_model->deleteRole($roleId);
    }

    $data["isadmin"] = $this->isAdmin();
    $data['roles'] = $this->_model->roles();
    $data['title'] = I18n::tr('title.rolesite') ;
    $data['form_header'] = I18n::tr('form.login');
    $this->render($data);    
  }

  public function schedules() {
    $data["isadmin"] = $this->isAdmin();
    $data['schedules'] = $this->_model->schedules();
    $data['title'] = I18n::tr('title.schedules') ;
    $data['form_header'] = I18n::tr('form.login');
    $this->renderSchedules($data);    
  }

  public function scheddel($id) {
    if (!empty($id)) {
      $this->_model->deleteSchedule($id);
    }

    $data["isadmin"] = $this->isAdmin();
    $data['schedules'] = $this->_model->schedules();
    $data['title'] = I18n::tr('title.schedules') ;
    $data['form_header'] = I18n::tr('form.login');
    $this->renderSchedules($data);    
  }


  public function schedadd() {
    $this->addSchedule();

    $data['schedules'] = $this->_model->schedules();
    $data['title'] = I18n::tr('title.schedules') ;
    $data['form_header'] = I18n::tr('form.login');
    
    $this->renderSchedules($data); 
  }

  private function addSchedule() {
    if (!empty($_POST['targetDate'])) {
        $this->_model->addSchedule(trim($_POST['targetDate']),trim($_POST['desc']));
    }
  }

  private function addRole() {
    if (!empty($_POST['role'])) {
        $this->_model->addRole(trim($_POST['role']),trim($_POST['desc']));
    }
  }

  private function getRoles() {
    $roles = array();
  }

  public function users() {
    $data["isadmin"] = $this->isAdmin();
    $data['users'] = $this->_model->users();
    $data['title'] = I18n::tr('title.users') ;
    $data['form_header'] = I18n::tr('form.login');
    $this->renderUsers($data);    
  }

  public function userdel($id) {
    if (!empty($id)) {
      $this->_model->deleteUser($id);
    }

    $data["isadmin"] = $this->isAdmin();
    $data['users'] = $this->_model->users();
    $data['title'] = I18n::tr('title.users') ;
    $data['form_header'] = I18n::tr('form.login');
    $this->renderUsers($data);    
  }


  public function useradd() {
    $this->addUser();

    $data["isadmin"] = $this->isAdmin();
    $data['users'] = $this->_model->users();
    $data['title'] = I18n::tr('title.users') ;
    $data['form_header'] = I18n::tr('form.login');
    
    $this->renderUsers($data); 
  }


  private function addUser() {
    if (!empty($_POST['login']) && !empty($_POST['firstname']) && !empty($_POST['pass'])) {
        $genpass = Pass::generate($_POST['pass']);
        $this->_model->addUser(trim($_POST['login']),trim($_POST['firstname']),$genpass);
    }
  }  
  
  private function render($data) {
    $this->_view->render('header', $data);
    $this->_view->render('nav', $data);
    $this->_view->render('admin/head', $data);
    $this->_view->render('admin/nav', $data);
    $this->_view->render('admin/roleedit', $data);
    $this->_view->render('admin/roletable', $data);
    $this->_view->render('admin/footer', $data);
    $this->_view->render('footer');
  }

  private function renderSchedules($data) {
    $this->_view->render('header', $data);
    $this->_view->render('nav', $data);
    $this->_view->render('admin/head', $data);
    $this->_view->render('admin/nav', $data);
    $this->_view->render('admin/schededit', $data);
    $this->_view->render('admin/schedtable', $data);
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

}
