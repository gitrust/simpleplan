<?php

class Termin extends Controller {

   public function __construct() {
      parent::__construct();
   }

   public function index() {
      $data['title'] = 'Termin Übersicht';
      $data['termine'] = $this->_model->all();

      $this->_view->render('header', $data);
      $this->_view->render('termin/list', $data);
      $this->_view->render('footer');
   }

   public function save() {
      $data['title'] = 'Neues Produkt';
      $data['form_header'] = 'Neues Produkt anlegen';

      $this->_view->render('header', $data);
	  $this->_view->render('nav', $data);
      $this->_view->render('termin/form', $data);
      $this->_view->render('footer');
   }

}