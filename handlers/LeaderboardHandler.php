<?php
class LeaderboardHandler {
	public function get() {
		$page = "Leaderboard";

		$obj = new DatabaseConnection();
		$db = $obj->connect();

		$leaderboardData = getLeaderboard($db);
		$db = NULL;
		include("../pages/elements/header.tpl.html");
		include("../pages/leaderboard.tpl.html");
		include("../pages/elements/footer.tpl.html");
	}

	public function post() {}

	private function getLeaderboard($db) {
		$query = $db->prepare("SELECT name, avghrs FROM teams ORDER BY avghrs");
		$query->execute();
		return $query->fetchAll();
	}
}
?>