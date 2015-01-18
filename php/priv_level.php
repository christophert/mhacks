<?php
	//check
	$obj = new DatabaseConnection();
	$db = $obj->connect();

	if(isset($_SESSION['userId'])) {
		$query = $db->prepare("SELECT usr_type FROM users WHERE id=:id");
		$query->bindParam(":id", $_SESSION['userId'], PDO::PARAM_INT);
		$query->execute();
		$result = $query->fetch(PDO::FETCH_ASSOC);
		$db = null;
		$obj = null;
		return $result['usr_type'];
	}
	else {
		$db = null;
		$obj = null;
		header('Location: /logout');
	}
?>