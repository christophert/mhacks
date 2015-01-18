<?php
	//Start session
	
	//Check whether the session variable SESS_ID is present or not
	if(!strpos($_SERVER['REQUEST_URI'],"login")) {
		session_start();
		if(!isset($_SESSION['userId']) || (trim($_SESSION['userId']) == '')) 
		{
			$errMsg_arr[] = 'Access Denied - Please login';
			$_SESSION['ERRMSG_ARR'] = $errMsg_arr;
			header("location: /login?redir=".htmlspecialchars($_SERVER['REQUEST_URI']));
			exit();
		}
	}
?>