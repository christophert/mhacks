<?php
	//Start session
	session_start();
	
	//Check whether the session variable SESS_ID is present or not
	if(!$_SERVER['REQUEST_URI'] contains "login") {
		if(!isset($_SESSION['userId']) || (trim($_SESSION['userId']) == '')) 
		{
			$errMsg_arr[] = 'Access Denied - Please login';
			$_SESSION['ERRMSG_ARR'] = $errMsg_arr;
			header("location: admin_error.php");
			exit();
		}
	}
?>