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
    $response = $workable->precheckUser($_POST['password']);
    if($response['status'] == "OK") {
    	$_SESSION['userId'] = $response['userId'];
    	$_SESSION['name'] = $response['name'];
    	$_SESSION['email'] = $response['email'];
    	header('Location: /');
    }
    else
    	header('Location: /login?failure');
  }
}
