<?php
class EntriesHandler
{
  public function get() {
    // die(var_dump($_SESSION));
    $page = "Entries";

    $dbObj = new DatabaseConnection();
    $db = $dbObj->connect();

    $entries = $this->getEntries($db);

    include("../pages/elements/header.tpl.html");
    include("../pages/entries.tpl.html");
    include("../pages/elements/footer.tpl.html");
  }

  private function getEntries($db) {
    $query = $db->prepare("SELECT entries.hrs, entries.confirm, events.name FROM `entries` INNER JOIN `events` on entries.event = events.id WHERE `uid`=:uid");
    $query->bindParam(':uid', 1, PDO::PARAM_STR);
    $query->execute();
    return $query->fetchAll(PDO::FETCH_ASSOC);
  }
}