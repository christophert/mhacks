<?php
class UserInfoHandler
{
  public function get() {
    $page = "User Info";

    $dbObj = new DatabaseConnection();
    $db = $dbObj->connect();

    $teams = $this->getTeams($db);
    $hours = $this->getHours($db)['total_hrs'];

    include("../pages/elements/header.tpl.html");
    include("../pages/user-info.tpl.html");
    include("../pages/elements/footer.tpl.html");
  }

  public function post() {
    die(var_dump($_POST));
    header('Location: /userinfo');
  }

  private function saveTeam($db, $tid) {

  }

  private function getTeams($db) {
    $query = $db->prepare("SELECT `id`, `name` FROM `teams`");
    $query->execute();
    return $query->fetchAll(PDO::FETCH_ASSOC);
  }

  private function getHours($db) {
    $query = $db->prepare("SELECT `total_hrs` FROM `users` WHERE `id`=:id");
    $query->bindParam(':id', $_SESSION['userId'], PDO::PARAM_STR);
    $query->execute();
    return $query->fetch(PDO::FETCH_ASSOC);
  }
}
