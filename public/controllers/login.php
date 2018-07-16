<?php

class Login extends Controller {

   public function __construct() {
      parent::__construct();
   }

   public function index() {
      $data['title'] = 'Login';
      $data['form_header'] = 'Anmelden';
      
      $this->_view->render('header', $data);
      $this->_view->render('login/form', $data);
      $this->_view->render('footer');
   }

   public function login() {
      $loggedIn = $this->doLogin();
       
      $data['title'] = 'After Login';
      $data['form_header'] = 'Benutzer angemeldet' . $loggedIn;

      $this->_view->render('header', $data);
      $this->_view->render('login/form', $data);
      $this->_view->render('footer');
   }
   
   public function doLogin() {
       
       if (!isset($_POST['login']) || !isset($_POST['pass'])) {
           return false;
       }
       
       $login = trim($_POST['login']);
       $pass = $_POST['pass'];
       
       $users = $this->_model->usersByLogin($login,$pass);
       
       if ($users !== false && Password::validate($pass,$users["pass"])) {
           Session::set("userid",$users["id"]);
           return true;
       }
       return false;
   }
   
   public function logout() {
      Session::destroy();
      
      $data['title'] = 'Login';
       
      $this->_view->render('header', $data);
      $this->_view->render('login/form', $data);
      $this->_view->render('footer');
   }

}