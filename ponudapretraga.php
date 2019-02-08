
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
<?php $termin=$_POST['termin']; ?>
<input type='text' name='termin' value="<?php echo $termin ?>"></input>
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
				
<?php
require_once('funkcije.php');
$knjige=ucitajKnjige("knjige.txt");
$pretraga=false;
global $termin;
$termin='';
if(!empty($_POST['termin']))
{
	$pretraga=true;
	$termin=$_POST['termin'];
	$prikaz=pretrazi($knjige,$termin);
}
else
{
	$prikaz=$knjige;
}
?>
<div class='page-header'>
<?php if($pretraga)
	echo('<h1>Rezultati pretrage za <strong> "'.$termin.'"</strong></h1>');
else
	echo('<h1>Rezulati pretrage</h1>');
?>
</div>
<?php 
		if(count($prikaz)==0)
		echo ('<h3>Nema rezultata</h3>');
		else
		{
 ?>
				<?php
foreach($prikaz as $id=>$knjiga)
{
	if($knjiga['objavljena']=="da")
			{
				echo('<article>');
				echo('<h3>'.$knjiga['naslov'].'</h3>');
				echo('<p>'.$knjiga['autor'].'</p>');
				echo('<div>');
							if($knjiga['kategorija']=="Administracija") 
								{
									echo '<img src="kategorije/admin.jpg" />';
									$kategorija="Programiranje";
								}
									if($knjiga['kategorija']=="HTML-CSS") 
										{
											echo '<img src="kategorije/html-css.jpg" />';
											$kategorija="Web";
										}
									if($knjiga['kategorija']=="Joomla") 
										{
											echo '<img src="kategorije/joomla.jpg" />';
											$kategorija="Web";
										}
									if($knjiga['kategorija']=="Javascript") 
										{
											echo '<img src="kategorije/js.jpg" />';
											$kategorija="Programiranje";
										}
									if($knjiga['kategorija']=="PHP programiranje") 
										{
											echo '<img src="kategorije/php.jpg" />';
											$kategorija="Programiranje";
										}
									if($knjiga['kategorija']=="WEB development") 
										{
											echo '<img src="kategorije/web.jpg" />';
											$kategorija="Web";
										}
										echo('<p>'.$knjiga['opis'].'</p>');
										echo('<b>Kategorija: </b>'.$kategorija);
										echo('<div class="cena">'.$knjiga['cena'].' din</div>');
										echo('</div>');
										echo('</article>');
									
						
			}
}
  ?>
				<?php } ?>
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
				<h5><span class="glyphicon glyphicon-user"></span>Lazar Nikolic</h5>
				<h5><span class="glyphicon glyphicon-education"></span>Br. indeksa: S31/14</h5>
				<h5><span class="glyphicon glyphicon-envelope"></span>lnikolic14@raf.edu.rs</h5>
				</footer>
			</div>
		</div>
	</div>
</body>
</html>