<?php

class Termin_Model extends Model {

   public function __construct(){
      parent::__construct();
   }

   /**
   * Gibt die letzten 20 Einträge im Archiv zurück.
   * @return array Liste aus Produkten mit id, timestamp, name, url, image und price
   */
   public function all() {
      //return $this->_db->select('SELECT * FROM products ORDER BY id DESC LIMIT 0, 20');
	  $array = array(
    "url" => "bar",
    "name" => "foo",
	"image" => "foo",
	"name" => "foo",
	"id" => "foo",
	"price" => "foo",
	);

	return $array;
   }
   
   public function termine() {
	   return array("01.02.2018","10.07.2018","13.08.2018");
   }
   
   public function rollen() {
	   return array("singer","e-guitar","drummer","leader","singer1","singer2","singer3","piano","e-bass");
   }

}