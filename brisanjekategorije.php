<?php
require_once('funkcije.php');
$knjige=ucitajKnjige("knjige.txt");
$kategorije=ucitajKategorije("kategorije.txt");
$prikaz=$knjige;

//global $kategorija;
/*foreach($prikaz as $id=>$knjiga)
	{
	
										echo('<select name="kategorija">');
										echo('<option value="'.$kategorija.'" >'.$kategorija.'</option>');
										//echo('<b>Kategorija: </b>'.$knjiga['kategorija'].'<br>');
										
										
									
	} */
$kategorije=ucitajKategorije("kategorije.txt");
$prikaz1=$kategorije;
echo('<select name="kategorija">');

foreach($prikaz1 as $id=>$kategorija)
{
	
	
	echo('<option value="'.$kategorija.'" >'.$kategorija.'</option>');


}
?>