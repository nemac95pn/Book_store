
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
	<title>Administracija</title>
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

<form action="ponudapretraga.php" method="POST">
<input type='text' name='termin'></input>
<input type="submit" class="btn btn-info" value="Trazi">
<input type="hidden" name="novi2" value='1'></td>
</form>

			</div>
			<div class="col-sm-12 mainmenu">
				<nav id="mainmenu">
					<ul>
						<li><a href="pocetna.php">Početna</a></li>
						<li><a href="ponuda.php">Ponuda</a>
						</li>
						<li><a href="kontakt.php">Kontakt</a></li>
						<li class="active"><a href="administracija.php">Administracija</a></li>
					</ul>
				</nav>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-12 col-md-12 sadrzaj">
				  <table class="table table-striped table-hover" >
  <thead>
      <tr>
      <th>Naslov </th>
      <th>Cena</th>
      <th>Objavljeno</th>
		<th>Specijalna ponuda</th>
		<th>Autor</th>
		<th>Kategorija</th>
		<th>Akcije</th>
      </tr>
    </thead>
	<tbody>
	
<?php
require_once('funkcije.php');
$knjige=ucitajKnjige("knjige.txt");
$prikaz=$knjige;
foreach($prikaz as $id=>$knjiga)
{
	echo('<tr>');
	echo('<td>'.$knjiga['naslov'].'</td>');
	echo('<td>'.$knjiga['cena'].'</td>');
	if($knjiga['objavljena']=="da")
	{
	echo('<td> <span class="glyphicon glyphicon-ok"></span></td>');
	}
	if($knjiga['objavljena']=="ne")
	{
		echo('<td> <span class="glyphicon glyphicon-remove"></span></td>');
	}
	if($knjiga['specijalnaponuda']=="da")
	{
	echo('<td> <span class="glyphicon glyphicon-ok"></span></td>');
	}
	if($knjiga['specijalnaponuda']=="ne")
	{
	echo('<td> <span class="glyphicon glyphicon-remove"></span></td>');
	}
	echo('<td>'.$knjiga['autor'].'</td>');
	echo('<td>'.$knjiga['kategorija'].'</td>');
	echo('<td><a href="novaknjiga.php?editID=' . $id . '" data-toogle="tooltip" title="Uredi podatke"><span class="glyphicon glyphicon-wrench"></span></a>&nbsp;&nbsp;&nbsp;&nbsp;');
	echo('<a href="administracija.php?obrisi='.$id.'" data-toogle="tooltip" title="Brisanje"><span class="glyphicon glyphicon-trash"></span></a></td>');
	echo('</tr>');
}
  ?>
  
</tbody>
<?php
require_once('funkcije.php');
$studenti=ucitajKnjige("knjige.txt");
$brisanje=false;
if(isset($_GET['obrisi']))
{
	$id=$_GET['obrisi'];
	if(isset($knjige[$id]))
	{
		$imeKnjige=$knjige[$id]['naslov'];
		unset($knjige[$id]);
		snimiKnjige("knjige.txt",$knjige);
		$brisanje=true;
	}
	
}

                if($brisanje)
                {
                    ?>
                    <div class="alert alert-warning">
                        <a href="#" class="close" data-dismiss="alert">&times;</a>
                        <strong>Obaveštenje: </strong> Knjiga <strong><?php echo ($imeKnjige); ?></strong> izbrisana iz baze.
                    </div>
                    <?php
                }
 ?>
</table>
<div  class="col-sm-6">
<a href="novaknjiga.php"><button type="button" class="btn btn-primary" name="novaknjiga" >Nova knjiga</button><a/>
</div>
<div  class="col-sm-3">
<form action="administracija.php" method="POST">
<label><h3>Nova kategorija</h3></label>
<?php
require_once('funkcije.php');  
$kategorije=ucitajKategorije("kategorije.txt");
if(isset($_POST['novi1']))
{
if(novaKategorija())
{
?>
		<div class='alert alert-success'>
		<a href='#' class='close' data-dismiss='alert'>&times;</a>
		<strong>Obavestenje:</strong>
		Kategorija uspesno sacuvana.
		</div>
		<?php
	}
	else
	{
		
		?>
		<div class='alert alert-danger'>
		<a href='#' class='close' data-dismiss='alert'>&times;</a>
		<strong>Obavestenje:</strong>
		<?php echo("Greska, upis kategorije nije uspeo"); ?>
		</div>
		<?php
	}
		
}
?>
<input class="form-control" type="text" name="novakategorija" ><br/>
<button type="Submit" class="btn btn-primary" >Dodaj kategoriju</button>
<input type="hidden" name="novi1" value='1'>
</form>


</form>
</div>
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
