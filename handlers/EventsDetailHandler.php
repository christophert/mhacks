<?php
class EventsDetailHandler
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

  public function post($id) {
    if(isset($_POST['hours']) && is_numeric($_POST['hours'])) {
      $query = $db->prepare("INSERT INTO `entries`(`uid`, `hrs`, `event`) VALUES (:uid, :hrs, :event)");
      $query->bindParam(':uid', $_SESSION['userId'], PDO::PARAM_STR);
      $query->bindParam(':hrs', $_POST['hours'], PDO::PARAM_STR);
      $query->bindParam(':event', $id, PDO::PARAM_STR);
      $query->execute();
    }
    header('Location: /entries');
  }

  private function getEvent($db, $id) {
    $query = $db->prepare("SELECT * FROM `events` WHERE `id`=:id");
    $query->bindParam(':id', $id, PDO::PARAM_STR);
    $query->execute();
    return $query->fetch(PDO::FETCH_ASSOC);
  }
}
