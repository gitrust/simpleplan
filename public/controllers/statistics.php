<?php

class Statistics extends Controller {

    public function __construct() {
        parent::__construct($needsLogin=true);
    }

    public function index() {
        $stats = array();
        $stats['all activities'] = $this->_model->count_activities()[0]['cnt'];
        $stats['all inactive activities'] = $this->_model->count_inactive_activities()[0]['cnt'];
        $stats['all users'] = $this->_model->count_users()[0]['cnt'];
        $stats['all events'] = $this->_model->count_events()[0]['cnt'];
        $stats['current events'] = $this->_model->count_current_events()[0]['cnt'];
        $stats['old events'] = $this->_model->count_old_events()[0]['cnt'];
        $stats['all resources'] = $this->_model->count_resources()[0]['cnt'];
        
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
