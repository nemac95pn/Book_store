
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
  <?php

require_once('funkcije.php');

$poljeNaslov = '';
$poljeAutor = '';
$poljeOpis = '';
$poljeCena = '';
$poljeObjavljena='';
$poljeSpecijalnaponuda='';
$poljeKategorija='';

$editing = false;
$saved = false;

if(isset($_GET['editID']))
{
    $editID = $_GET['editID'];
    $knjige = ucitajKnjige('knjige.txt');
    if(isset($knjige[$editID]))
    {
        $i = $knjige[$editID];
        
        $poljeNaslov = $i['naslov'];
        //echo $poljeNaslov;
        $poljeAutor = $i['autor'];
        $poljeOpis = $i['opis'];
        $poljeCena = $i['cena'];
        $poljeKategorija=$i['kategorija'];
        $poljeObjavljena=$i['objavljena'];
    		$poljeSpecijalnaponuda=$i['specijalnaponuda'];
        
        $editing = true;
    }
}
?>
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
	<div class='page-header'>
	<?php
                    if($editing)
                        echo('<h1>Uređivanje podataka</h1>');
                    else
                        echo('<h1>Nova knjiga</h1>');
                        
                    ?>
	</div>	
	<?php
require_once('funkcije.php');
if(isset($_POST['novi']))
{
	$greska='';
	if(validirajPodatke())
	{
		novaKnjigaIzForme();
		?>
		<div class='alert alert-success'>
		<a href='#' class='close' data-dismiss='alert'>&times;</a>
		<strong>Obavestenje:</strong>
		Knjiga uspesno sacuvana u bazu.
		</div>
		<?php
	}
	else
	{
		$poljeNaslov=$_POST['naslov'];
		$poljeAutor=$_POST['autor'];
		$poljeOpis=$_POST['opis'];
		$poljeCena=$_POST['cena'];
		?>
		<div class='alert alert-danger'>
		<a href='#' class='close' data-dismiss='alert'>&times;</a>
		<strong>Obavestenje:</strong>
		<?php echo($greska); ?>
		</div>
		<?php
	}
		
}
?>
<?php
        if(isset($_POST['saveID']))
                {
                    $saveID = $_POST['saveID'];
                    
                    $knjige = ucitajKnjige('knjige.txt');
                   	
                    if(isset($knjige[$editID]))
                    {
                    	
                        $poljeNaslov=$_POST['naslov'];
								$poljeAutor=$_POST['autor'];
								$poljeOpis=$_POST['opis'];
								$poljeCena=$_POST['cena'];
								$poljeKategorija=$_POST['kategorija'];
								$poljeObjavljena=$_POST['objavljena'];
    							$poljeSpecijalnaponuda=$_POST['specijalnaponuda'];
                        $greska = '';
                        if(validirajPodatke())
                        {
                            $i = knjigaIzForme(); 
                            $knjige[$editID] = $i;
                            
                            snimiKnjige('knjige.txt', $knjige);
                            ?>
                            <div class="alert alert-success">
                                <a href="#" class="close" data-dismiss="alert">&times;</a>
                                <strong>Obaveštenje: </strong> Podaci uspešno ažurirani.
                            </div>
                            <?php    
                        }
                        else
                        {
                            ?>
                            <div class="alert alert-danger">
                                <a href="#" class="close" data-dismiss="alert">&times;</a>
                                <strong>Greška: </strong> <?php echo($greska); ?>
                            </div>
                            <?php
                        }
                    }
                }
                
                ?>        
       

<form action='#' method='POST'>
 <table>
 <tr>
  <td><b>Naslov:</b></td><td><input class="form-control" type="text" name="naslov" value="<?php echo $poljeNaslov ?>" ></td>
  </tr>
  <tr>
  <td><b>Autor:</b></td><td><input class="form-control" type="text" name="autor" value="<?php echo $poljeAutor ?>"></td>
  </tr>
  <tr>
  <td><b>Opis:</b></td><td><input class="form-control" type="text" name="opis" value="<?php echo $poljeOpis ?>"></td>
  </tr>
  <tr>
  <td><b>Cena:</b></td><td><input class="form-control" type="text" name="cena" value="<?php echo $poljeCena ?>"></td>
  </tr>
  <tr>
  <td>
  <b>Kategorija</b>
  <select name="kategorija">
  <option selected="selected"><?php if(!empty($poljeKategorija)) echo $poljeKategorija;  ?></option>
  <?php
require_once('funkcije.php');
$kategorije=ucitajKategorije("kategorije.txt");
$prikaz1=$kategorije;
foreach($prikaz1 as $id=>$kategorija)
{
	
	
	echo('<option value="'.$kategorija.'" >'.$kategorija.'</option>');


}

?>

</select>
</td>
  </tr>
  <tr>
  <td>
  <b>Objavljena:</b>
  <?php
  $objavljena = "da";
  if(isset($_POST['objavljena'])) $objavljena = $_POST['objavljena'];
  ?>
  <input type="radio" name="objavljena" value="da" <?php if($objavljena == "da") echo('checked="checked" '); else if($poljeObjavljena=="da") echo('checked="checked" '); ?> > <b>Da</b> 
  <input type="radio" name="objavljena" value="ne" <?php if($objavljena == "ne") echo('checked="checked" '); else if($poljeObjavljena=="ne") echo('checked="checked" '); ?> > <b>Ne</b>
  </td>
  </tr>
    <tr>
  <td>
  <b>Specijalna ponuda:</b>
  <?php
  $specijalnaponuda = "da";
  if(isset($_POST['specijalnaponuda'])) $specijalnaponuda = $_POST['specijalnaponuda'];
  ?>
  <input type="radio" name="specijalnaponuda" value="da" <?php if($specijalnaponuda == "da") echo('checked="checked" '); else if($poljeSpecijalnaponuda=="da") echo('checked="checked" '); ?>> <b>Da</b>
  <input type="radio" name="specijalnaponuda" value="ne" <?php if($specijalnaponuda == "ne") echo('checked="checked" '); else if($poljeSpecijalnaponuda=="ne") echo('checked="checked" '); ?>> <b>Ne</b> 
  </td>
  </tr>
  <?php
                        if($editing)
                        {
                            ?>
                            <tr>
                           <td><input type="hidden" name="saveID" value="<?php echo($editID); ?>"></td>
                           <td><button type="submit" class="btn btn-success">Sačuvaj</button></td>
                           </tr>
                            <?php
                        }
                      else
                      {
                        ?>
  <tr>
  
  <td><input type="submit" class="btn btn-success" name="Submit" value="Unesi"></td>
  </tr>
  <tr>
  <td><input type="hidden" name="novi" value='1'></td>
  </tr>
 <?php } ?>
  </table>
  
</form>
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
