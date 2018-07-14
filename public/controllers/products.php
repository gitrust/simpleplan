<?php

class Products extends Controller {

   public function __construct() {
      parent::__construct();
   }

   public function index() {
      $data['title'] = 'Übersicht';
      $data['products'] = $this->_model->all();

      $this->_view->render('header', $data);
      $this->_view->render('products/list', $data);
      $this->_view->render('footer');
   }

   public function add() {
      $data['title'] = 'Neues Produkt';
      $data['form_header'] = 'Neues Produkt anlegen';

      $this->_view->render('header', $data);
	  $this->_view->render('nav', $data);
      $this->_view->render('products/form', $data);
      $this->_view->render('footer');
   }

}