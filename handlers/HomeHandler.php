<?php
class HomeHandler
{
  public function get() {
  	require($_SERVER['DOCUMENT_ROOT']."/../php/priv_level.php");
	if($usr_priv_level < 0) {
		header("Location: /login");
		exit();
	}
    $page = "Home";
    include("../pages/elements/header.tpl.html");
    include("../pages/index.tpl.html");
    include("../pages/elements/footer.tpl.html");
  }
}
