<?php

class Users_Model extends Model {

    public function __construct(){
        parent::__construct();
    }

    /**
    * Gibt die letzten 20 Einträge im Archiv zurück.
    * @return array Liste aus Produkten mit id, timestamp, name, url, image und price
    */
    public function all() {
        return $this->_db->select('SELECT * FROM Users ORDER BY id DESC LIMIT 0, 20');
    }

    public function byLogin($login) {
        return $this->_db->select('SELECT * FROM Users WHERE login = :login ORDER BY id DESC LIMIT 0, 20',array("login" => $login));
    }

}