<?php

	session_start();
	
	function getUsername(){
	
		echo $_SESSION["username"];
	}
	
	function jelLogiran(){
	
		if(!isset($_SESSION["username"])){
			
			header("Location: ../html/login.html");
		}
	}
	
	function logout(){
	
		session_unset();
		session_destroy();
		header('Location: ../html/login.html');
	}
	
	if($_GET["f"] == "getUsername"){
		
		getUsername();
	}
	
	if($_GET["f"] == "jelLogiran"){
		
		jelLogiran();
	}
	
	if($_GET["f"] == "logout"){
		
		logout();
	}
?>