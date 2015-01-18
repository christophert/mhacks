<?php
class LoginHandler
{
  public function get() {
    $page = "Login";
    include("../pages/elements/header.tpl.html");
    include("../pages/login.tpl.html");
    include("../pages/elements/footer.tpl.html");
  }

  public function post() {
  	include("../php/login.inc");
    $workable = new login();
    $workable->setId($_POST['email']);
    if($workable->precheckUser($_POST['email'], $_POST['password']))
    	header('Location: /');
    else
    	header('Location: /login?failure');
  }
}
