<?php
class UserInfoHandler
{
  public function get() {
    $page = "User Info";

    $dbObj = new DatabaseConnection();
    $db = $dbObj->connect();

    $teams = $this->getTeams($db);

    include("../pages/elements/header.tpl.html");
    include("../pages/user-info.tpl.html");
    include("../pages/elements/footer.tpl.html");
  }

  private function getTeams($db) {
    $query = $db->prepare("SELECT entries.hrs, entries.confirm, events.name FROM `entries` INNER JOIN `events` on entries.event = events.id WHERE `uid`=:uid");
    $query->bindParam(':uid', $_SESSION['userId'], PDO::PARAM_STR);
    $query->execute();
    return $query->fetchAll(PDO::FETCH_ASSOC);
  }
}
