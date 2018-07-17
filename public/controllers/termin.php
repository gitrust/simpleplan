<?php

class Termin extends Controller {

  public function __construct() {
    parent::__construct();
  }

  public function index() {
    $data['title'] = 'Termin Uebersicht';
    $data['entries'] = $this->_model->termine();
    $data['roles'] = $this->_model->rollen();

    $this->_view->render('header', $data);
    $this->_view->render('nav', $data);
    $this->_view->render('termin/list', $data);      
    $this->_view->render('footer');
  }

  public function genKey($termin,$rolle) {
    return "x";
  }

  public function store() {

    $data['title'] = 'Termin Uebersicht';
    $data['entries'] = $this->_model->termine();
    $data['roles'] = $this->_model->rollen();

    $this->_view->render('header', $data);
    $this->_view->render('nav', $data);
    $this->_view->render('termin/list', $data);      
    $this->_view->render('footer');
  }

}
