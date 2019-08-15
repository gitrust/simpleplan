<?php

class Login_Model extends Model {

    public function __construct(){
        parent::__construct();
    }

    public function usersByLogin($login,$pass) {
        return  $this->_db->select('SELECT id,firstname,pass FROM Users WHERE login = :login ORDER BY id DESC LIMIT 0, 1',
            array("login" => $login));       
    }

    public function updateLastLogin($login) {
        $timestamp = date('Y-m-d G:i:s');
        return  $this->_db->update('Users',array('lastlogin' => $timestamp),array('login' => $login));
    }

}
