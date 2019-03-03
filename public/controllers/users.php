<?php

class Users extends Controller {

  public function __construct() {
    parent::__construct($needsLogin=true);
  }

  public function index() { 
    $this->users();
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
public function del($id) {
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
public function add() {
  $this->addUser();

  $data["isadmin"] = $this->isAdmin();
  $data['users'] = $this->_model->users(Session::get('userid'));
  $data['title'] = I18n::tr('title.users') ;
  $data['form_header'] = I18n::tr('form.login');
  
  $this->renderUsers($data); 
}

 // Helper Function
 private function addUser() {
  if (!empty($_POST['login']) && !empty($_POST['firstname']) && !empty($_POST['pass']) && !empty($_POST['userrole'])) {
      $genpass = Pass::generate($_POST['pass']);
      $email = $_POST['email'];
      $userRole = $_POST['userrole'];
      $this->_model->addUser(trim($_POST['login']),trim($_POST['firstname']),$genpass,$email,$userRole);
  }
} 


private function renderUsers($data) {
  $this->_view->render('header', $data);
  $this->_view->render('nav', $data);
  $this->_view->render('partials/admin/head', $data);
  $this->_view->render('partials/admin/nav', $data);
  $this->_view->render('users/edit', $data);
  $this->_view->render('users/table', $data);
  $this->_view->render('partials/admin/footer', $data);
  $this->_view->render('footer');
} 

}
