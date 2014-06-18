<?php
	
	function spojiSe(){
	
		$baza 	= mysqli_connect("localhost","root","root","ljekarna") or die("Nisam se mogao spojiti na bazu!!!");
		mysqli_set_charset($baza,"utf8");
		return $baza;
	}
	/*class Baza extends mysqli {
		
		var $host;
		var $username;
		var $password;
		var $dataBase;
		
		function _construct(){
		
			$this->host		= 'localhost';
			$this->username	= 'root';
			$this->password	= 'root';
			$this->dataBase	= 'ljekarna';
			parent::__construct($this->host, $this->username, $this->password, $this->dataBase);
		}
		
		function spojiSe(){
			$con		= parent::__construct($this->host, $this->username, $this->password, $this->dataBase) or die ("Nisam se moogao spojiti na bazu!");
			mysqli_set_charset($con,"utf8");
			return $con;
		}
	}*/
?>