<?php
//####################################################################
// UNCOMMENT BELOW LINE TO PUT STRIVE INTO MAINTENANCE MODE
//####################################################################
//die("Strive is currently undergoing maintenance and will be back up soon.");

require('../vendor/autoload.php');

require('../php/func.php');
require('../handlers/HomeHandler.php');
require('../handlers/LoginHandler.php');

Toro::serve(array(
  '/'            => 'HomeHandler',
  '/login'       => 'LoginHandler',
));
