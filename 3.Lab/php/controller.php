<?php

	session_start();
	include 'baza.php';
	
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
	
	function noviPacijent($ime, $prezime, $datumR, $mobitel, $adresa, $mjesto, $spol){
	
		$baza		= spojiSe();
		$query		= "INSERT INTO pacijenti(ime, prezime, spol, datumRodenja, mobitel, adresa, mjesto) VALUES (?, ?, ?, ?, ?, ?, ?)";
		if(!$baza->query("INSERT INTO pacijenti(ime, prezime, spol, datumRodenja, mobitel, adresa, mjesto) VALUES (?, ?, ?, ?, ?, ?, ?)")){
			
			echo "(" . $baza->errno . ")" . $baza->error;
		}
		if(!($stmt		= $baza->prepare($query))){
			echo "Prepare failed: (" . $baza->errno . ") " . $baza->error;
		}
		if(!$stmt->bind_param('isssssss', $id, $ime, $prezime, $spol, $datumR, $mobitel, $adresa, $mjesto)){
			echo "Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error;
		}
		$stmt->execute();
		$stmt->close();
		mysqli_close($baza);
		header("Location: ../html/noviPacijent.html");
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
	
	if($_GET["f"] == "noviPacijent"){
		
		$ime		= $_POST["ime"];
		$prezime	= $_POST["prezime"];
		$datumR		= $_POST["datumR"];
		$mobitel	= $_POST["mobitel"];
		$adresa		= $_POST["adresa"];
		$mjesto		= $_POST["mjesto"];
		$spol		= $_POST["spol"];
		
		noviPacijent($ime, $prezime, $datumR, $mobitel, $adresa, $mjesto, $spol);
	}
?>