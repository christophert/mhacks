<?php
class RegisterHandler {
	public function get() {
		$page = "Register";
		include("../pages/elements/header.tpl.html");
		include("../pages/register.tpl.html");
		include("../pages/elements/footer.tpl.html");
	}

	public function post() {
		include('../php/register.inc');
		//TODO: register
		$workable = new register();
		$result = $workable->registerUser($_POST['fname']." ".$_POST['lname'], $_POST['email'], $_POST['password']);
		if($result)
			header('Location: /login?regSuccess');
		else
			header('Location: /register?failure');
	}
}