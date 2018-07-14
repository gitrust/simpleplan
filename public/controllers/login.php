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
      $data['title'] = 'After Login';
      $data['form_header'] = 'Benutzer angemeldet';

      $this->_view->render('header', $data);
      $this->_view->render('login/form', $data);
      $this->_view->render('footer');
   }
   
   public function logout() {
	  $data['title'] = 'Login';
	   
	  $this->_view->render('header', $data);
      $this->_view->render('login/form', $data);
      $this->_view->render('footer');
   }

}