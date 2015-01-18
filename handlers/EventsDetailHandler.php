<?php
class EventsHandler
{
  public function get($id) {
    $page = "Events";

    $dbObj = new DatabaseConnection();
    $db = $dbObj->connect();

    $event = $this->getEvent($db, $id);

    include("../pages/elements/header.tpl.html");
    include("../pages/event-detail.tpl.html");
    include("../pages/elements/footer.tpl.html");
  }

  private function getEvent($db, $id) {
    $query = $db->prepare("SELECT * FROM `events` WHERE `id`=:id");
    $query->bindParam(':id', $id, PDO::PARAM_STR);
    $query->execute();
    return $query->fetch(PDO::FETCH_ASSOC);
  }
}
