<?php
//login.inc

class login {
	private $email;
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

	function setId($inputEmail) {
		$this->email = $inputEmail;
	}

	private function validateLogin($pass, $hashed_pass, $created_date, $hash_method = 'sha256') {
		$salt = strrev(date('U', $created_date));
		if (function_exists('hash') && in_array($hash_method, hash_algos())) {
			error_log($hashed_pass);
			error_log(hash($hash_method, $salt . $pass));
			return ($hashed_pass === hash($hash_method, $salt . $pass));
		}
		return ($hashed_pass === sha1($salt . $pass));
	}

	function precheckUser($email, $password) {
		$var = $this->getUserInfo();
		if($var != null) {
			if($this->validateLogin($password, $var['password'], $var['created_at'])) {
				$_SESSION['name'] = $reponse['name'];
				$_SESSION['email'] = $response['email'];
				$_SESSION['userId'] = $response['id'];
				return true;
			}
		}
		else
			return false;
	}

	public function getUserInfo() { #return response or null dependent of record exist
		$query = $this->db->prepare('SELECT * FROM users WHERE email=:email');
		$query->bindParam(':email',$this->email,PDO::PARAM_STR);
		$query->execute();
		$response = $query->fetch(PDO::FETCH_ASSOC);
		if($response['email']) {
			return $response;
		}
		else
			return NULL;
	}
}
?>