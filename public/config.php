<?php

//set timezone
date_default_timezone_set('Europe/Berlin');

//site address
define('ENVIRONMENT', 'production');

define('DOCROOT', dirname(__FILE__));

// Credentials for the local server
//define('DIR','http://localhost:8080/');
//define('DB_TYPE','mysql');
//define('DB_HOST','db');
//define('DB_NAME','wteamplaner');
//define('DB_USER','wteamplaner');
//define('DB_PASS','wteamplaner');

// all-inkl
 define('DIR','https://wtplaner.immanuel-kf.de/');
 define('DB_TYPE','mysql');
 define('DB_HOST','localhost');
 define('DB_NAME','d02b38d7');
 define('DB_USER','d02b38d7');
 define('DB_PASS','f6prfA8woUbcW3u6');
//define('DB_SQL_SECRET_KEY','hdsfiiDsdfLkk27');

//set prefix for sessions
define('SESSION_PREFIX','wteam_');

//optionall create a constant for the name of the site
define('SITETITLE','WTeamPlaner');

// session timeout in minutes
define('SESSION_TIMEOUT',10);
