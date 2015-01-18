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
    	$_SESSION['userId'] = $response['data']['userId'];
    	$_SESSION['name'] = $response['data']['name'];
    	$_SESSION['email'] = $response['data']['email'];
    	session_write_close();
    	die(var_dump($_SESSION));
    	header('Location: /?success');
    }
    else
    	header('Location: /login?failure');
  }
}
