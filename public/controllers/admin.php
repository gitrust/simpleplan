<?php

class Admin extends Controller {

    public function __construct() {
        parent::__construct($needsLogin=true);
    }

    public function index() {
        $this->render($data);   
    }

    /** API: Get Events */
    public function events() {
        $this->render($data);    
    }

    /** API: Delete Event */
    public function eventdel($id) {
        if (!empty($id)) {
                $this->_model->inactivateEvent($id);
        }

        $this->render($data);    
    }

    /** API: Add Event */
    public function eventadd() {
        $this->addEvent();

        $this->render($data); 
    }


    // Helper Function
    private function addEvent() {
        if (!empty($_POST['targetDate'])) {
                $date = date_parse_from_format('d.m.Y',$_POST['targetDate']);

                // TODO only allow events in future?

                $this->_model->addEvent($date,trim($_POST['desc']));
        }
    }

    // RENDER TEMPLATES

    private function render($data) {
        $isadmin = $this->isAdmin();
        $data["isadmin"] = $isadmin;
        $data["ismanager"] = $this->isManager();    
        $data['title'] = I18n::tr('title.schedules') ;
        $data['form_header'] = I18n::tr('form.login');

        // render events dependent on users role
        if ($isadmin) {
                $data['schedules'] = $this->_model->events();
        } else {
                $data['schedules'] = $this->_model->current_events();
        }

        $this->_view->render('header', $data);
        $this->_view->render('container_start', $data);
        $this->_view->render('nav', $data);
        $this->_view->render('admin/head', $data);
        $this->_view->render('admin/nav', $data);
        $this->_view->render('admin/eventedit', $data);
        $this->_view->render('admin/eventtable', $data);
        $this->_view->render('admin/footer', $data);
        $this->_view->render('container_end', $data);
        $this->_view->render('footer');
    } 

}
