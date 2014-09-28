<?php
	class DBConfig{
		// LOCAL
		// private $host = 'localhost';
		// private $user = 'a0921213351';
		// private $password = 'qwe1234';
		// private $dbname = 'a0921213351';

		// DEV
		private $host = 'localhost';
		private $user = 'root';
		private $password = '';
		private $dbname = 'test';
		function __construct(){
			//echo 'Using default construtor<br>';
		}

		
		function setHost($host){
			$this->host = $host;
		}
		function getHost(){
			return $this->host;
		}
		function setUser($user){
			$this->host = $user;
		}
		function getUser(){
			return $this->user;
		}
		function setPassword($password){
			$this->password = $password;
		}
		function getPassword(){
			return $this->password;
		}
		function setDbname($dbname){
			$this->dbname = $dbname;
		}
		function getDbname(){
			return $this->dbname;
		}


		function __toString(){
			return $this->host.":".$this->user.":".$this->password.":".$this->dbname."<br>";
		}
	}
?>