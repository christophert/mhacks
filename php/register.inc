<?php
class register {
	private $email;
	function __construct($connect = true) {
		$this->results = array();
		$this->dbHost = "100.72.88.112";
		$this->dbPort = 3306;
		$this->dbName = "strive";
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

	private function randomSalt($len = 8) {
		$chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789`~!@#$%^&*()-=_+';
		$l = strlen($chars) - 1;
		$str = '';
		for ($i = 0; $i < $len; ++$i) {
			$str .= $chars[rand(0, $l)];
		}
		return $str;
	}

	private function create_hash($string, $created_date, $hash_method = 'sha256') {
	// the salt will be the reverse of the user's created date
	// in seconds since the epoch
		$salt = strrev(date('U', strtotime($created_date)));
		if (function_exists('hash') && in_array($hash_method, hash_algos())) {
			return hash($hash_method, $salt.$string);
		}
		return sha1($salt.$string);
	}

	function registerUser($name, $email, $password) {
		$query = $this->db->prepare('INSERT INTO users(name, email, password, salt, created_dt) VALUES (:name,:email,:password,:salt,:created_dt)');
		$currentTime =  date("Y-m-d H:i:s");
		$query->bindParam(':name', $name, PDO::PARAM_STR);
		$query->bindParam(':email', $email, PDO::PARAM_STR);
		$query->bindParam(':password', create_hash($password, $currentTime), PDO::PARAM_STR);
		$query->bindParam(':salt', randomSalt());
		$query->bindParam(':created_dt', $currentTime, PDO::PARAM_INT, 11);
		return $query->execute();
	}
}
?>