<?php
class LogoutHandler {
	public function get() {
		global $_SESSION;
		include($_SERVER['DOCUMENT_ROOT']."/../php/authcheck.php");
		
		session_start();
		unset($_SESSION['userId']);
		unset($_SESSION['name']);
		unset($_SESSION['email']);
		header("location: index.php");
	}
}
?>