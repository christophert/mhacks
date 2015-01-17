<?php
class dbInit {
  private 
  function __construct($connect = true) {
    $this->results = array();
    $this->dbHost = "100.72.88.112";
    $this->dbPort = 3306;
    $this->dbName = DBNAME;
    $this->dbUser = DBUSER;
    $this->dbPass = DBPASS;


    if($connect) {
      $this->connect();
    }
  }
  function __destruct() {
    $this->db = NULL;
  }
  function connect() {
    try {
      $this->db = new PDO('mysql:host='.$this->dbHost.';dbname='.$this->dbName, $this->dbUser, $this->dbPass);
      $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch (PDOException $e) {
      throw new Exception('SQL Error: '.$e->getMessage());
    }
  }
}
?>
