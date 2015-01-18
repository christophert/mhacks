<?php
class UserInfoHandler
{
  public function get() {
    $page = "User Info";

    $dbObj = new DatabaseConnection();
    $db = $dbObj->connect();

    $teams = $this->getTeams($db);
    $userData = $this->getUserData($db);
    $teamStatus = $this->getTeamVerifyStatus($db);

    include("../pages/elements/header.tpl.html");
    include("../pages/user-info.tpl.html");
    include("../pages/elements/footer.tpl.html");
  }

  public function post() {
    if(isset($_POST['team'])) {
      $team = $_POST['team'];
      if(is_numeric($team)) {
        $dbObj = new DatabaseConnection();
        $db = $dbObj->connect();
        $this->saveTeam($db, $team);
        $db = null;
      }
    }
    header('Location: /userinfo');
  }

  private function saveTeam($db, $tid) {
    $query = $db->prepare("UPDATE `users` SET `team`=:tid WHERE `id`=:id");
    $query->bindParam(':tid', $tid, PDO::PARAM_STR);
    $query->bindParam(':id', $_SESSION['userId'], PDO::PARAM_INT);
    $query->execute();
  }

  private function getTeams($db) {
    $query = $db->prepare("SELECT `id`, `name` FROM `teams`");
    $query->execute();
    return $query->fetchAll(PDO::FETCH_ASSOC);
  }

  private function getUserData($db) {
    $query = $db->prepare("SELECT `total_hrs`, `team` FROM `users` WHERE `id`=:id");
    $query->bindParam(':id', $_SESSION['userId'], PDO::PARAM_INT);
    $query->execute();
    return $query->fetch(PDO::FETCH_ASSOC);
  }

  private function getTeamVerifyStatus($db) {
    $query = $db->prepare("SELECT trusted_domain FROM teams WHERE id=:teamId");
    $query->bindParam(":teamId", $_SESSION['team'], PDO::PARAM_INT);
    $query->execute();
    $result = $query->fetch(PDO::FETCH_ASSOC);
    $trustedDomain = $result['trusted_domain'];
    $emailDomain = substr($_SESSION['email'], strpos($_SESSION['email'], '@')+1);
    return $emailDomain == $trustedDomain;
  }
}
