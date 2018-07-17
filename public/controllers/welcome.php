<?php

class Welcome extends Controller {

  public function __construct() {
    parent::__construct();
  }

  public function index() {
    $data['title'] = 'Welcome';
    $data['login'] = 'Anmelden';

    $this->_view->render('header', $data);
    $this->_view->render('welcome/page', $data);
    $this->_view->render('footer');
  }

}
