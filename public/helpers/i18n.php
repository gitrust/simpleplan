<?php

class I18n {
    
	private static  $msg = null;
	
   public static function tr($msgid, $lang = "de-de") {
     // currently only first requested language is set
     if (self::$msg == null) {
        self::$msg = parse_ini_file("static/i18n/" . $lang . ".ini");
     }
     
     if (array_key_exists($msgid, self::$msg)){
       return self::$msg[$msgid];
     }
     return $msgid;
   }

   
}
