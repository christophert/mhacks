<?php
class ConfirmHandler {
	public function get() {
		$page = "Confirm Attendees";
		$workable = new DatabaseConnection();
		$db = $workable->connect();
		$query = $db->prepare("SELECT u.id,u.name FROM users AS u INNER JOIN rsvp AS rs on u.id=rs.uid");
		$query->execute();
		$result = $query->fetch(PDO::FETCH_ASSOC);
		include("../pages/header.tpl.html");
		include("../pages/confirm.tpl.html");
		include("../pages/footer.tpl.html");
	}

	public function post() {
		if($_POST['action'] == "update") {	
			include("../php/database.inc");
			$workable = new DatabaseConnection();
			$db = $workable->connect();
			$query = $db->prepare("UPDATE entries SET confirm=1");
		}
	}
}