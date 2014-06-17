<?php
	if (!isset($_SESSION) {
		session_start();
		}
	function getUsername(){
		
		
		echo $_SESSION['username'];	
	}
?>