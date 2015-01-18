<?php
class EventsHandler
{
  public function get() {
    $page = "Events";

    $dbObj = new DatabaseConnection(true);
    $db = $dbObj->connect();
    $this->getEvents($db);

    include("../pages/elements/header.tpl.html");
    include("../pages/events.tpl.html");
    include("../pages/elements/footer.tpl.html");
  }

  private function getEvents($db) {
    $query = $db->prepare("SELECT `name`, `city`, `state`, `start`, `end` FROM `events`");
    $query->execute();
    $response = $query->fetchAll(PDO::FETCH_ASSOC);
    die(var_dump($response));
  }
}
