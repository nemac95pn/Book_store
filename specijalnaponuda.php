<?php
require_once('funkcije.php');
$knjige=ucitajKnjige("knjige.txt");
$prikaz=$knjige;
foreach($prikaz as $id=>$knjiga)
	{
		if($knjiga['objavljena']=="da")
			{
				if($knjiga['specijalnaponuda']=="da")
					{
						echo '<div>';
							if($knjiga['kategorija']=="Administracija") 
								{
									echo '<img src="kategorije/admin.jpg" />';
								}
									if($knjiga['kategorija']=="HTML-CSS") 
										{
											echo '<img src="kategorije/html-css.jpg" />';
										}
									if($knjiga['kategorija']=="Joomla") 
										{
											echo '<img src="kategorije/joomla.jpg" />';
										}
									if($knjiga['kategorija']=="Javascript") 
										{
											echo '<img src="kategorije/js.jpg" />';
										}
									if($knjiga['kategorija']=="PHP programiranje") 
										{
											echo '<img src="kategorije/php.jpg" />';
										}
									if($knjiga['kategorija']=="WEB development") 
										{
											echo '<img src="kategorije/web.jpg" />';
										}
									echo('<h4>'.$knjiga['naslov'].'</h4></br>');
									echo('<div class="cena">'.$knjiga['cena'].' din</div>');
									echo '</div>';
						}
			}
	}
?>