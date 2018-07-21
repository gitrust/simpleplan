<?php

ob_start();

// include config data
require('config.php');

if (defined('ENVIRONMENT')) {
   switch (ENVIRONMENT) {
      case 'development':
         error_reporting(E_ALL);
         break;
      case 'production':
         error_reporting(0);
         break;
      default:
         exit('The application environment is not set correctly.');
   }
}

function autoloadsystem($class) {
   $filename = DOCROOT . "/core/" . strtolower($class) . ".php";
   if (file_exists($filename)) {
      require $filename;
   }

   $filename = DOCROOT . "/helpers/" . strtolower($class) . ".php";
   if (file_exists($filename)) {
      require $filename;
   }
}
spl_autoload_register("autoloadsystem");

set_exception_handler('logger::exception_handler');
set_error_handler('logger::error_handler');

$app = new Bootstrap();
$app->setController('page');
$app->init();

ob_flush();
