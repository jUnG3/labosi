<?php
	include 'baza.php';
	
	
		if (!isset($_SESSION)) { session_start(); }
		
		$baza		=spojiSe();
		
		
		$userName	= $_POST["username"];
		$password	= md5($_POST["password"]);
		
		$stmt		= $baza->prepare("SELECT COUNT(*) AS broj FROM korisnici WHERE username = ? AND password = ?;");
		$stmt->bind_param('ss', $userName, $password);
		$stmt->execute();
		$stmt->bind_result($broj);
		
	
		$result		= $stmt->fetch();
		
		if($broj == 1){
		
			$_SESSION['username'] 	= $_POST["username"];
			
		}
		else{
			
			session_unset();
			session_destroy();
			echo 2;
		}
		
		$stmt->close();
		mysqli_close($baza);
?>