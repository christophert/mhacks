<?php

class ConfirmHandler {
	public function get($event) {
		//1+ priv level
		require($_SERVER['DOCUMENT_ROOT']."/../php/priv_level.php");
		if($usr_priv_level < 1) {
			header("Location: /nocando");
			exit();
		}
		$page = "Volunteer Confirmation";
		$workable = new DatabaseConnection();
		$db = $workable->connect();

		$result = $this->getAllRSVP($event, $db);

		include("../pages/elements/header.tpl.html");
		include("../pages/confirm.tpl.html");
		include("../pages/elements/footer.tpl.html");
	}

	public function post($event) {
		if($_GET['action'] == "update") {
			$attend = $_POST['attend'];	
			if(!empty($attend)) {
				$workable = new DatabaseConnection();
				$db = $workable->connect();
				$count = count($attend);
				for($i=0;$i < $count; $i++) {
					$this->setConfirm($attend[$i], $event, $db);
				}
			}
		}
		header("Location: /events/".$event);
	}

	public function getAllRSVP($event, $db) {
		$query = $db->prepare("SELECT u.id,u.name FROM users AS u INNER JOIN rsvp AS rs on u.id=rs.uid AND rs.event = :event");
		$query->bindParam(':event', $event, PDO::PARAM_INT);
		$query->execute();
		$result = $query->fetchAll();
		return $result;
	}

	public function setConfirm($uid, $event, $db) {
		$query = $db->prepare("UPDATE entries SET confirm=1 WHERE uid=:uid AND event=:event");
		$query->bindParam(':uid', $uid, PDO::PARAM_INT);
		$query->bindParam(':event', $event, PDO::PARAM_INT);
		return $query->execute();
	}
}