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
    //TODO: Handle POST for login/auth and set session var
    $workable = new login();
    if($workable->precheckUser($_POST['email'], $_POST['password']))
    	header('Location: /');
    else
    	header('Location: /login?failure');
  }
}
