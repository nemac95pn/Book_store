
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8"> 
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
	<!-- Latest compiled JavaScript -->
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	<title>Ponuda</title>
	<link href='https://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="css/menu.css">
	<link rel="stylesheet" href="css/style.css">
  </head>
<body>
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-6 logo">
				<img src="img/logo.png" />
			</div>
			<div class="col-sm-6 pretraga">
<form action="ponudapretraga.php" method="post">
<input type='text' name='termin'></input>
<input type="submit" class="btn btn-info" value="Trazi">
<form>
			</div>
			<div class="col-sm-12 mainmenu">
				<nav id="mainmenu">
					<ul>
						<li><a href="pocetna.php">Početna</a></li>
						<li class="active"><a href="ponuda.php">Ponuda</a>
						</li>
						<li><a href="kontakt.php">Kontakt</a></li>
						<li><a href="administracija.php">Administracija</a></li>
					</ul>
				</nav>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-12 col-md-9 sadrzaj clearfix">
				<h1>PONUDA</h1>
				<?php require('ponudakategorije.php') ?>
			</div>
			<div class="col-sm-12 col-md-3 sidebar clearfix">
				<aside>
					<section class="specijalna-ponuda">
						<h3>Specijalna ponuda</h3>
					<?php require('specijalnaponuda.php'); ?>
					<section class="specijalna-ponuda">
						<h3>Najnovije</h3>
						<?php require('najnovije.php'); ?>
					</section>
				</aside>
			</div>
		</div>
		<div class="row footer">
			<div class="col-sm-12">
				<footer>
				<h5><span class="glyphicon glyphicon-user"></span>Nemanja Ilic</h5>
				<h5><span class="glyphicon glyphicon-education"></span>Br. indeksa: S33/14</h5>
				<h5><span class="glyphicon glyphicon-envelope"></span>nilic14@raf.edu.rs</h5>
				</footer>
			</div>
		</div>
	</div>
</body>
</html>
