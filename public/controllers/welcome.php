<?php

class Welcome extends Controller {

  public function __construct() {
    parent::__construct();
  }

  public function index() {
    $data['title'] = I18n::tr('title.welcome');
    $data['login'] = I18n::tr('button.login');

    $this->_view->render('header', $data);
    $this->_view->render('welcome/page', $data);
    $this->_view->render('footer');
  }

}
