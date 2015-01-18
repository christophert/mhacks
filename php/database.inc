<?php
class DatabaseConnection { 

  function __construct() {
    $this->results = array();
    $this->dbHost = "100.72.88.112";
    $this->dbPort = 3306;
    $this->dbName = DBNAME;
    $this->dbUser = DBUSER;
    $this->dbPass = DBPASS;
  }

  function __destruct() {
    $this->db = NULL;
  }

  function connect() {
    try {
      $db = new PDO('mysql:host='.$this->dbHost.';dbname='.$this->dbName, $this->dbUser, $this->dbPass);
      $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      return $db;
    }
    catch (PDOException $e) {
      throw new Exception('SQL Error: '.$e->getMessage());
    }
  }

}
?>
