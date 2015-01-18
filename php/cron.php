<?php

require("../../dbcreds.inc");
require('database.inc');

$dbObj = new DatabaseConnection();
$db = $dbObj->connect();

// Get all teams
$teams_query = $db->prepare("SELECT `id`, `name` FROM `teams`");
$teams_query->execute();
$teams = $teams_query->fetchAll(PDO::FETCH_ASSOC);

foreach($teams as $team) {
  // Get the total sum of hours for that team
  $tid = $team['id'];
  $sum_query = $db->prepare("SELECT SUM(`total_hrs`) AS aggregate FROM `users` WHERE `team`=:tid");
  $query->bindParam(':tid', $tid, PDO::PARAM_STR);
  $sum_query->execute();
  $sum_raw = $sum_query->fetch(PDO::FETCH_ASSOC);

  if(isset($sum_raw['aggregate'])) {
    //Save the total to the table
    $sum = $sum_raw['aggregate'];
    $query = $db->prepare("UPDATE `teams` SET `hrs`=:sum WHERE `id`=:tid");
    $query->bindParam(':sum', $sum, PDO::PARAM_STR);
    $query->bindParam(':tid', $tid, PDO::PARAM_STR);
    $query->execute();
  }
}
?>
