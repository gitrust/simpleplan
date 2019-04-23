<?php

class Page extends Controller {

  public function __construct() {
    parent::__construct();
  }

  public function index() {
    $data['title'] = I18n::tr('title.welcome');
    $data['login'] = I18n::tr('button.login');

    $this->_view->render('header', $data);
    $this->_view->render('page/welcome', $data);
    $this->_view->render('footer');
  }
  
  public function imprint() {
    $data['title'] = I18n::tr('title.imprint');

    $this->_view->render('header', $data);
    $this->_view->render('container_start', $data);
    $this->_view->render('page/imprint', $data);
    $this->_view->render('container_end', $data);
    $this->_view->render('footer');
  }
  
  public function privacy() {
    $data['title'] = I18n::tr('title.privacy');

    $this->_view->render('header', $data);
    $this->_view->render('container_start', $data);
    $this->_view->render('page/privacy', $data);
    $this->_view->render('container_end', $data);
    $this->_view->render('footer');
  }

}
