<?php

class Termin extends Controller {

  public function __construct() {
    parent::__construct();
  }

  public function index() {
    $this->render();
  }

  public function genKey($termin,$rolle) {
    return "x";
  }

  public function store() {
  	 if (!empty($_POST['entrykey'])) {
      $entries = $_POST['entrykey'];
    	
    	//echo $entries;
    	
    	foreach ($entries as $entry) {
			//echo $entry . "<br>" ;   	
    	}
    }

    
    $this->render();
  }
  
  private function render() {
    $data['title'] = I18n::tr('title.schedulelist');
    
    $data['entries'] = $this->_model->termine();
    $data['roles'] = $this->_model->rollen();

    $this->_view->render('header', $data);
    $this->_view->render('nav', $data);
    $this->_view->render('termin/list', $data);      
    $this->_view->render('footer');
  }

}
