<?php

class Error extends Controller {

	private $_error = null;

	public function __construct($error){
		parent::__construct();
		$this->_error = $error;
	}

	public function index(){
		//display the error and stop
		$data['error'] = $this->_error;
		$this->_view->render('error/404',$data);
	}

}