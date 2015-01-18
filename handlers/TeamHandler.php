<?php
class TeamHandler {
	public function get() {
		require($_SERVER['DOCUMENT_ROOT']."/../php/priv_level.php");
		if($usr_priv_level < 0) {
			header("Location: /login");
			exit();
		}
		$page = "Your Team";
		$obj = new DatabaseConnection();
		$db = $obj->connect();

		$companyInfo = $this->getCompanyInfo($db);
		$db = NULL;
		include('../pages/elements/header.tpl.html');
		include('../pages/team.tpl.html');
		include('../pages/elements/footer.tpl.html');

	}
	public function post() {

	}

	private function getCompanyInfo($db) {
		$query = $db->prepare("SELECT * FROM teams WHERE id=:team");
		$query->bindParam(":team", $_SESSION['team'], PDO::PARAM_INT);
		$query->execute();
		return $query->fetch(PDO::FETCH_ASSOC);
	}
}
?>