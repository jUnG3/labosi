<!doctype html>
	<head>
		<title>Podaci</title>
		<script src="../js/jquery.js"></script>
		<link href="../css/bootstrap.min.css" rel="stylesheet"></link>
		<link href="../css/dashboard.css" rel="stylesheet"></link>
		<?php

$ime=$_GET["ime"];
$prezime=$_GET["prezime"];



//  Initiate curl

$url = "http://stajp.vtszg.hr/~spredanic/DWA2/lab5/podaci.php?ime=".$ime."&prezime=".$prezime;

$ch = curl_init();
// Disable SSL verification
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
// Will return the response, if false it print the response
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
// Set the url
curl_setopt($ch, CURLOPT_URL,$url);
// Execute
$result=curl_exec($ch);

// Will dump a beauty json :3
//var_dump(json_decode($result, true));

?>
	</head>
	<body onload="jelLogiran();">
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
					<li class="active"><a href="../html/pretraga.html">Slika</a></li>										
				</ul>
			</div>   
		</div>
	</div>
			<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main" id="ispis">		
			</div>

	</body>
	    <script type="text/javascript">

    var arrayPodataka = <?php echo $result; ?>

    	for (var i=0; i<arrayPodataka.length; i++){
    		$("#ispis").append("<p>Id:"+arrayPodataka[i].id+"</p>")
    		$("#ispis").append("<p>Podrucni ured:"+arrayPodataka[i].podrucni_ured+"</p>")
    		$("#ispis").append("<p>Prezime:"+arrayPodataka[i].prezime+"</p>")
    		$("#ispis").append("<p>Ime:"+arrayPodataka[i].ime+"</p>")
    		$("#ispis").append("<p>###########</p>")
    	}




    </script>
	<script src="../js/bootstrap.min.js"></script>
	<script src="../js/docs.js"></script>
	<script src="../js/podaci.js"></script>
</!doctype>