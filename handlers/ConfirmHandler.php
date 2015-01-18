<?php
class ConfirmHandler {
	public function get() {
		$page = "Confirm Attendees"
		include("../pages/header.tpl.html");
		include("../pages/confirm.tpl.html");
		include("../pages/footer.tpl.html");
	}

	public function post() {
		die();
	}
}