<?php
class NewEventHandler {
	public function get() {
		require($_SERVER['DOCUMENT_ROOT']."/../php/priv_level.php");
		if($usr_priv_level < 1) {
			header("Location: /nocando");
			exit();
		}

	$page = "New Event";
	include("../pages/elements/header.tpl.html");
	include("../pages/event-new.tpl.html");
	include("../pages/elements/footer.tpl.html");
	}

	public function post() {
		$obj = new DatabaseConnection();
		$db = $obj->connect();
		if($this->registerEvent($_POST['name'],$_POST['addr'],$_POST['city'],$_POST['state'],$_POST['zip'],$_POST['start'],$_POST['end'],$db)) {
			header("Location: /done_with_things");
		} else {
			header("Location: /maybenot");
		}


	}

	public function registerEvent($name, $addr, $city, $state, $zip, $start, $end, $db) {
		$query = $db->prepare("INSERT INTO events(name, addr, city, state, zip, start, end, descr) VALUES (:name,:addr,:city,:state,:zip,:start,:end,:descr)");
		$query->bindParam(":name", $name, PDO::PARAM_STR);
		$query->bindParam(":addr", $addr, PDO::PARAM_STR);
		$query->bindParam(":city", $city, PDO::PARAM_STR);
		$query->bindParam(":state", $state, PDO::PARAM_STR);
		$query->bindParam(":zip", $zip, PDO::PARAM_INT, 5);
		$query->bindParam(":start", $start, PDO::PARAM_STR);
		$query->bindParam(":end", $end, PDO::PARAM_STR);
		return $query->execute();
	}
}