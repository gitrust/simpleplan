<?php

class Statistics extends Controller {

    public function __construct() {
        parent::__construct($needsLogin=true);
    }

    public function index() {
        $stats = array();
        $stats['count activities'] = $this->_model->count_activities()[0]['cnt'];
        $stats['count users'] = $this->_model->count_users()[0]['cnt'];
        $stats['count events'] = $this->_model->count_events()[0]['cnt'];
        $stats['count resources'] = $this->_model->count_resources()[0]['cnt'];
        
        $data['statistics'] = $stats;
        $data['title'] = I18n::tr('title.statisticssite');
        $data['form_header'] = I18n::tr('form.login');

        $this->render($data);
    }

    
    private function render($data) {
        $data["isadmin"] = $this->isAdmin();

        $this->_view->render('header', $data);
        $this->_view->render('container_start', $data);
        $this->_view->render('nav', $data);
        $this->_view->render('partials/admin/head', $data);
        $this->_view->render('partials/admin/nav', $data);
        $this->_view->render('statistics/list', $data);
        $this->_view->render('partials/admin/footer', $data);
        $this->_view->render('container_end', $data);
        $this->_view->render('footer');
    }
}
