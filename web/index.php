<?php
session_save_path("/tmp/session");
session_start();
//require($_SERVER['DOCUMENT_ROOT']."/../php/authcheck.php");
require($_SERVER['DOCUMENT_ROOT']."/../../dbcreds.inc");
//####################################################################
// UNCOMMENT BELOW LINE TO PUT STRIVE INTO MAINTENANCE MODE
//####################################################################
//die("Strive is currently undergoing maintenance and will be back up soon.");
date_default_timezone_set('America/New_York');
//require($_SERVER['DOCUMENT_ROOT']."/../php/authcheck.php");
require('../vendor/autoload.php');

require('../php/database.inc');
require('../handlers/HomeHandler.php');
require('../handlers/LoginHandler.php');
require('../handlers/RegisterHandler.php');
require('../handlers/EventsHandler.php');
require('../handlers/EventsDetailHandler.php');
require('../handlers/EntriesHandler.php');
require('../handlers/LogoutHandler.php');
require('../handlers/UserInfoHandler.php');
require('../handlers/ConfirmHandler.php');
require('../handlers/CreateEventHandler.php');
require('../handlers/LeaderboardHandler.php');
require('../handlers/TeamHandler.php');

Toro::serve(array(
  '/'               => 'HomeHandler',
  '/login'          => 'LoginHandler',
  '/register'       => 'RegisterHandler',
  '/events/:number' => 'EventsDetailHandler',
  '/events/:number/confirm' => 'ConfirmHandler',
  '/events/create'		=>	'CreateEventHandler',
  '/events'         => 'EventsHandler',
  '/entries'        => 'EntriesHandler',
  '/logout'		     	=> 'LogoutHandler',
  '/userinfo'		  	=> 'UserInfoHandler',
  '/team/leaderboard'	=>	'LeaderboardHandler',
  '/team'				=>	'TeamHandler',
));
