<?php

class I18n {
    
    $MSG = array('de' => array(
        'header.login' => 'Anmelden',
        'button.login' => 'Anmelden',
        'label.login' => "Login",
        'label.password' => 'Passwort',
        'header.schedulelist' => "Termin Uebersicht"
        )    
    );

   public static function tr($txt = false, $lang = "de") {
      return "X";
      #return $MSG[$lang][$s];
   }

   
}