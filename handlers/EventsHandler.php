<?php
class EventsHandler
{
  public function get() {
    $page = "Events";
    include("../pages/elements/header.tpl.html");
    include("../pages/events.tpl.html");
    include("../pages/elements/footer.tpl.html");
  }
}
