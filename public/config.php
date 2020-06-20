<?php

//set timezone
date_default_timezone_set('Europe/Berlin');

//site address
// define('ENVIRONMENT', 'production');
define('ENVIRONMENT', 'development');


define('DOCROOT', dirname(__FILE__));

// Credentials for the local server
define('DIR','http://localhost:8080/');
define('DB_TYPE','mysql');
define('DB_HOST','db');
define('DB_NAME','resourceplanner');
define('DB_USER','resourceplanner');
define('DB_PASS','resourceplanner');

//define('DB_SQL_SECRET_KEY','hdsfiiDsdfLkk27');

//set prefix for sessions
define('SESSION_PREFIX','rplan_');

//optionall create a constant for the name of the site
define('SITETITLE','Simpleplan');

// App Version
define('APPVERSION','1.6');

// site language
// put new translation to static/i18n/*
define('SITELANGUAGE','en-us');

// session timeout in minutes
define('SESSION_TIMEOUT',10);
