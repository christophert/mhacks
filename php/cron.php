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
  $sum_query->bindParam(':tid', $tid, PDO::PARAM_STR);
  $sum_query->execute();
  $sum_raw = $sum_query->fetch(PDO::FETCH_ASSOC);

  if(isset($sum_raw['aggregate'])) {
    $sum = $sum_raw['aggregate'];

    // Calculate number of employees in team
    $users_query = $db->prepare("SELECT COUNT(`id`) AS count FROM `users` WHERE `team`=:tid");
    $users_query->bindParam(':tid', $tid, PDO::PARAM_STR);
    $users_query->execute();
    $count_raw = $users_query->fetch(PDO::FETCH_ASSOC);

    if(isset($count_raw['count'])) {
      $count = $count_raw['count'];
      $average = $sum / $count;

      $save_query = $db->prepare("UPDATE `teams` SET `hrs`=:sum, `avghrs`=:avg WHERE `id`=:tid");
      $save_query->bindParam(':sum', $sum, PDO::PARAM_STR);
      $save_query->bindParam(':avg', $average, PDO::PARAM_STR);
      $save_query->bindParam(':tid', $tid, PDO::PARAM_STR);
      $save_query->execute();
    }
  }
}
?>
