<?php
class LogoutHandler {
	public function get() {
		//include($_SERVER['DOCUMENT_ROOT']."/../php/authcheck.php");
		
		//session_start();
		unset($_SESSION['userId']);
		unset($_SESSION['name']);
		unset($_SESSION['email']);
		unset($_SESSION['team']);
		header("location: /login");
	}
}
?>