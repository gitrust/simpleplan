<?php

class Login extends Controller {

  public function __construct() {
    parent::__construct();
  }

  public function index() {
    $data['title'] = I18n::tr('title.login');
    $data['form_header'] = I18n::tr('form.login');

    $this->render($data);
  }

  public function login() {
    $loggedIn = $this->doLogin();

    $data['title'] = I18n::tr('title.login') ;
    $data['form_header'] = I18n::tr('form.login');

    if ($loggedIn) {
      $data['location'] = 'schedules/';
      // redirect and die
      $this->_view->render('redirect', $data);
    } else {
      $this->render($data);
    }
  }

  public function doLogin() {

    if (!isset($_POST['login']) || !isset($_POST['pass'])) {
      return false;
    }

    $login = trim($_POST['login']);
    $pass = $_POST['pass'];

    $users = $this->_model->usersByLogin($login,$pass);

    if ($users !== false && count($users) > 0 && Pass::validate($pass,$users[0]["pass"])) {
      Session::set("userid",$users[0]['id']);
      Session::set("username",$users[0]['firstname']);
      return true;
    }
    Message::set(I18n::tr('message.loginfailed'));
    return false;
  }

  public function logout() {
    Session::destroy();

    $data['title'] = I18n::tr('title.login');
    $data['form_header'] = I18n::tr('form.login');

    $this->render($data);
  }
  
  private function render($data) {
    $this->_view->render('header', $data);
    $this->_view->render('login/form', $data);
    $this->_view->render('footer');
  }

}
