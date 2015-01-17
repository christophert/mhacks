<?php
class HomeHandler
{
  public function get() {
    $page = "Home";
    include("../pages/elements/header.tpl.html");
    include("../pages/index.tpl.html");
    include("../pages/elements/footer.tpl.html");
  }
}
