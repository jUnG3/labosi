<!doctype html>
	<head>
		<title>Pretraga Pacijent</title>
		<script src="../js/jquery.js"></script>
		<link href="../css/bootstrap.min.css" rel="stylesheet"></link>
		<link href="../css/dashboard.css" rel="stylesheet"></link>
		
				<?php 	//require_once('baza.php');
			
			class pacijent{
			
				var $ime;
				var $prezime;
				var $spol;
				
				function __construct(){}
		
				function __destruct (){}
			}
			
			$baza	= mysqli_connect("localhost","root","root","ljekarna");
			mysqli_set_charset($baza,"utf8");
			
			$query		= "SELECT *FROM pacijenti;";
			$stmt		= $baza->prepare($query);
			$stmt->execute();
			$stmt->bind_result($id, $ime, $prezime, $spol, $datumRodenja, $mobitel, $adresa, $mjesto);
			
			$polje	= array();
			$i		= 0;
			while ($stmt->fetch()) {
				
				$pacijent			= new pacijent();
				$pacijent->ime		= $ime;
				$pacijent->prezime	= $prezime;
				$pacijent->spol		= $spol;
				array_push($polje, $pacijent);
			}
			$json				= json_encode($polje);
			
			?>
	</head>
	<body>
	<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Labosi d.o.o.</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li id="korisnik"><a href="#"></a></li>            
          </ul>
          <form class="navbar-form navbar-right">
            <input type="text" class="form-control" placeholder="Search...">
          </form>
		  <form class="navbar-form navbar-right" action="../php/controller.php?f=logout" method="POST">
            <button class="btn btn-lg btn-primary btn-block" id="bttnLogout" type="submit">Odjavi se</button>
          </form>
        </div>
      </div>
    </div>

    <div class="container-fluid">
		<div class="row">
			<div class="col-sm-3 col-md-2 sidebar">
				<ul class="nav nav-sidebar">
					<li class="active"><a href="../html/pacijenti.html">Pacijenti</a></li>
					<li class="active"><a href="../html/noviPacijent.html">Novi pacijent</a></li>					
					<li class="active"><a href="pdfCreate.php">Slika</a></li>
					<li class="active"><a href="pretragaPacijent.php">Pretraga pacijent</a></li>					
				</ul>
			</div>   
		</div>
	</div>
			<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main" id="ispis">
				<p id="ime"></p>
				<p id="prezime"></p>
				<p id="spol"></p>
				<p id="gumbSljedeci">Klikni!</p>
			</div>

	</body>
<script>
var pacijenti =<?php echo $json?>;
var i=0;

//alert(pacijenti);


$("#gumbSljedeci").click(function sljedeci(){
	
	$('p#ime').text("Ime: "+pacijenti[i].ime);
	$('p#prezime').text("Prezime: "+pacijenti[i].prezime);
	$('p#spol').text("Spol: "+pacijenti[i].spol);
	i++;
});

</script>
	<script src="../js/bootstrap.min.js"></script>
	<script src="../js/docs.js"></script>
	<script src="../js/podaci.js"></script>
</!doctype>