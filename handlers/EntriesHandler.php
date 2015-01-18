<?php
class EntriesHandler
{
  public function get() {
    $page = "Entries";

    $dbObj = new DatabaseConnection();
    $db = $dbObj->connect();

    $entries = $this->getEntries($db);

    include("../pages/elements/header.tpl.html");
    include("../pages/entries.tpl.html");
    include("../pages/elements/footer.tpl.html");
  }

  private function getEntries($db) {
    $chriswaiting = 1;
    $query = $db->prepare("SELECT entries.hrs, entries.confirm, events.name FROM `entries` INNER JOIN `events` on entries.event = events.id WHERE `uid`=:uid");
    $query->bindParam(':uid', $chriswaiting, PDO::PARAM_STR);
    $query->execute();
    return $query->fetchAll(PDO::FETCH_ASSOC);
  }
}
