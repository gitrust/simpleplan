<?php

class Session {

   private static $_sessionStarted = false;

   public static function init() {
      if (self::$_sessionStarted == false) {         
         session_start();
         self::$_sessionStarted = true;

         // check timeout         
         self::checkTimeout();
      } 
   }

   private static function  checkTimeout() {
         if (SESSION_TIMEOUT <= 0) {
            return ;
         }

         // check timeout
         if (!self::get("timeout")) {
            self::resetTimeout();
         }

         if ((self::get("timeout") + SESSION_TIMEOUT * 60) < time()) {
               self::destroy();
         }
         self::resetTimeout();
   }

   private static function resetTimeout() {
      self::set("timeout",  time());
   }

   public static function set($key, $value) {
      return $_SESSION[SESSION_PREFIX . $key] = $value;
   }

   public static function get($key, $secondkey = false) {
      if ($secondkey == true) {
         if (isset($_SESSION[SESSION_PREFIX . $key][$secondkey])) {
            return $_SESSION[SESSION_PREFIX . $key][$secondkey];
         }
      } else {
         if (isset($_SESSION[SESSION_PREFIX . $key])) {
            return $_SESSION[SESSION_PREFIX . $key];
         }
      }
      return false;
   }

   public static function display() {
      return $_SESSION;
   }

   public static function clear($key) {
      unset($_SESSION[SESSION_PREFIX . $key]);
   }

   public static function destroy() {
      if (self::$_sessionStarted == true) {
         session_unset();
         session_destroy();
      }
   }

}
