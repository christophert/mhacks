<?php
class TeamHandler {
	public function get() {
		$page = "Team";

		include('../pages/elements/header.tpl.html');
		include('../pages/team.tpl.html');
		include('../pages/elements/footer.tpl.html');

	}
	public function post() {

	}
}
?>