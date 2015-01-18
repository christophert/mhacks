<?php
require($_SERVER['DOCUMENT_ROOT']."/../php/authcheck.php");
require($_SERVER['DOCUMENT_ROOT']."/../../dbcreds.inc");
//####################################################################
// UNCOMMENT BELOW LINE TO PUT STRIVE INTO MAINTENANCE MODE
//####################################################################
//die("Strive is currently undergoing maintenance and will be back up soon.");
date_default_timezone_set('America/New_York');

require('../vendor/autoload.php');

require('../php/database.inc');
require('../handlers/HomeHandler.php');
require('../handlers/LoginHandler.php');
require('../handlers/RegisterHandler.php');
require('../handlers/EventsHandler.php');
require('../handlers/EventsDetailHandler.php');
require('../handlers/EntriesHandler.php');

Toro::serve(array(
  '/'               => 'HomeHandler',
  '/login'          => 'LoginHandler',
  '/register'       => 'RegisterHandler',
  '/events/:number' => 'EventsDetailHandler',
  '/events'         => 'EventsHandler',
  '/entries'        => 'EntriesHandler',
));
