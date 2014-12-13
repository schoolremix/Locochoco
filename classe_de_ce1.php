<?PHP	
	/* --- LOCOCHOCO : LA PIEUVRE DES MATHS ---
	 
	   Licence	: CC BY International 4.0
	   Auteur	: School(Re)mix
	   Date	: 2014
	
	---------------------------------------- */
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>locochoco : session</title>
    
    <link rel="stylesheet" media="screen" type="text/css" title="locochoco" href="css/locochoco.css" />
    	<?PHP 
    		include "func/fonctions.php";
		
	?>

</head>

<body>
	<div id="page2">
    	<div id="ariane">calcul mental &raquo; <a href="index.php" target="_self">choix des exercices</a></div>
		<div id="param">
              <?PHP
		echo	'<form name="session" action="classe_de_ce1_check.php" method="get">';
		
		echo	'<div id="test"><div class="select-style">';
		echo	'<select name="qte">'.
				'<option value="1">1 série par exercice</option>'.
				'<option value="2">2 séries par exercice</option>'.
				'<option value="2">3 séries par exercice</option>'.
				'<option value="2">4 séries par exercice</option>'.
				'<option value="5" selected>5 séries par exercice</option>'.
				'<option value="10">10 séries par exercice</option>'.
			'</select>';
		echo	'</div></div>';
		
		echo	'<div id="tableau">';
			echo	'<table cellspacing="0" cellpadding="0">';
				for ($i=0;$i<count($tab_domaines);$i++) {
					echo	'<tr><td class="tableau_texte_gauche" width="30%">';
					echo	'<span class="couleur">'.$tab_domaines[$i]["label"].'</span>'; // domaine
					echo	'</td><td class="tableau_texte_droite" width="70%">';
					$tab_infos = $tab_domaines[$i]["infos"];
					for ($t=0;$t<count($tab_infos);$t++) { 
	  					echo	'<input type="checkbox" id="'.$tab_domaines[$i]["label"].$t.'" name="'.$tab_domaines[$i]["url"].$t.'" />';
						echo	'<label for="'.$tab_domaines[$i]["label"].$t.'"><span></span> '.$tab_infos[$t]["label"].'</label><br />';
					}
					echo	'</td></tr>';
				}
			echo	'</table>';
			echo	'<div id="input"><input type="submit" value="commencer :)" class="submit"></div>'; // classe_de_ce1_check.php?qte=5&ajouter3=on&complément1=on&doubles0=on
		echo	'</form>';
		echo	'</div>'; // FIN Tableau

		?>
              </div>
    </div>
    <div id="pied"></div>
</body>
</html>
