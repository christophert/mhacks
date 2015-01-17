<?php
class EventsHandler
{
  public function get() {
    $page = "Events";

    $dbObj = new dbInit();
    $this->getEvents($dbObj);

    include("../pages/elements/header.tpl.html");
    include("../pages/events.tpl.html");
    include("../pages/elements/footer.tpl.html");
  }

  private function getEvents($dbObj) {
    $query = $dbObj->db->prepare("SELECT `name`, `city`, `state`, `start`, `end` FROM `events`");
    $query->execute();
    $response = $query->fetch(PDO::FETCH_ASSOC);
    echo var_dump($response)
  }
}
