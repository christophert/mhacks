<?php
class progDB {
  function __construct($connect = true) {
    $this->results = array();
    $this->dbHost = "100.72.88.112";
    $this->dbPort = 3306;
    $this->dbName = "strive";
    $this->dbUser = $_ENV['STRIVE_DBUSER'];
    $this->dbPass = $_ENV['STRIVE_DBPASS'];

  }

  function connect() {
    //TODO: Connect to DB
  }
}
?>
