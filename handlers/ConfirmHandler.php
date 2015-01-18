<?php
class ConfirmHandler {
	public function get($event) {
		$page = "Confirm Attendees";
		$workable = new DatabaseConnection();
		$db = $workable->connect();
		$query = $db->prepare("SELECT u.id,u.name FROM users AS u INNER JOIN rsvp AS rs on u.id=rs.uid AND rs.event = :event");
		$query->bindParam(':event', $event)
		$query->execute();
		$result = $query->fetchAll();
		var_dump($result);
		include("../pages/elements/header.tpl.html");
		include("../pages/confirm.tpl.html");
		include("../pages/elements/footer.tpl.html");
	}

	public function post() {
		if($_POST['action'] == "update") {	
			include("../php/database.inc");
			$workable = new DatabaseConnection();
			$db = $workable->connect();
			$query = $db->prepare("UPDATE entries SET confirm=1 WHERE id=:uid AND event=:event");
		}
	}
}