<?php
class EventsHandler
{
  public function get() {
    require($_SERVER['DOCUMENT_ROOT']."/../php/priv_level.php");
    if($usr_priv_level < 0) {
      header("Location: /login");
      exit();
    }
    $page = "Events";

    $dbObj = new DatabaseConnection();
    $db = $dbObj->connect();

    $events = $this->getEvents($db);

    include("../pages/elements/header.tpl.html");
    include("../pages/events.tpl.html");
    include("../pages/elements/footer.tpl.html");
  }

  private function getEvents($db) {
    $query = $db->prepare("SELECT `id`, `name`, `city`, `state`, `start`, `end` FROM `events`");
    $query->execute();
    return $query->fetchAll(PDO::FETCH_ASSOC);
  }
}
