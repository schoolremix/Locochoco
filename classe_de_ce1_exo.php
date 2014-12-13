<?PHP	
	/* --- LOCOCHOCO : LA PIEUVRE DES MATHS ---
	 
	   Licence	: CC BY International 4.0
	   Auteur	: School(Re)mix
	   Date	: 2014
	
	---------------------------------------- */
?>

<?PHP 
	// Activation de la Session
	// session_name ('');
	session_start(); 
	
	/*
	
	$_SESSION["qte"]
	$_SESSION["num"][$i]
	$_SESSION["domaine"][$i]
	$_SESSION["label"][$i]
	$_SESSION["exercice"][$i]
	$_SESSION["resultat"][$i]
	$_SESSION["score"][$i]
	
	*/
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>locochoco : exercices</title>
    
    <link rel="stylesheet" media="screen" type="text/css" title="locochoco" href="css/locochoco.css" />
    	<?PHP 
    		include "func/fonctions.php";
	?>
       
</head>

<body>
	<?PHP
       	if ($_GET["verif"] == 1) { echo '<div id="page2">'; }
		else { echo '<div id="page">'; }
	?>
       
    	<div id="ariane">calcul mental &raquo; <a href="index.php" target="_self">choix des exercices</a> &raquo; <a href="classe_de_ce1.php" target="_self">séries</a> &raquo; exercices</div>
		<div id="param">
              <?PHP
		
		if (isset($_GET["exo"])) {
			if ($_GET["exo"] == "bilan") { // bilan de la session
				// (domaine) (type) (correct) (faux) (% réussite)
				echo	'<table cellspacing="5px" cellpadding="0">';
				echo	'<tr>';
					echo		'<td class="bilan_titre">domaine</td>';
					echo		'<td class="bilan_titre">exercice</td>';
					echo		'<td class="bilan_titre">correct</td>'; 
					echo		'<td class="bilan_titre">erreur</td>';
					echo		'<td class="bilan_titre">réussite</td>';
					echo	'</tr>';
				$i=0; $correct=0; $total = count($_SESSION["num"]); $total_correct=0;
				while ($i<count($_SESSION["num"])) {
					for ($j=0;$j<$_SESSION["qte"];$j++) {
						if ($_SESSION["score"][$i] == 1) { $correct++; }
						$i++;
					}
					// Affichage
					echo	'<tr>';
					echo		'<td class="bilan_domaine">'.$_SESSION["domaine"][($i-1)].'</td>';
					echo		'<td class="bilan_type">'.$_SESSION["label"][($i-1)].'</td>';
					echo		'<td class="bilan_correct">'.$correct.'</td>'; // 3 / 5 => 3 * 100 / 5
					echo		'<td class="bilan_faux">'.($_SESSION["qte"]-$correct).'</td>';
					$percent_reussite = round ((($correct*100)/$_SESSION["qte"]), 0);
						if ($percent_reussite > 74) { $couleur_reussite = "vert"; }
						if (($percent_reussite > 39) && ($percent_reussite < 75)) { $couleur_reussite = "orange"; }
						if ($percent_reussite < 40) { $couleur_reussite = "rouge"; }
					echo		'<td class="bilan_reussite_'.$couleur_reussite.'">'.$percent_reussite.'%</td>';
					echo	'</tr>';
					$total_correct = $total_correct + $correct;
					$correct=0;
				}
				echo	'<tr>';
					echo		'<td colspan="2" style="text-align:right;">bilan &rArr;</td>';
					echo		'<td class="bilan_correct_total">'.$total_correct.'</td>';
					echo		'<td class="bilan_faux_total">'.(count($_SESSION["num"]) - $total_correct).'</td>';
					$percent_total_reussite = round (($total_correct*100)/count($_SESSION["num"]), 0);
						if ($percent_total_reussite > 74) { $couleur_reussite = "vert"; }
						if (($percent_total_reussite > 39) && ($percent_reussite < 75)) { $couleur_reussite = "orange"; }
						if ($percent_total_reussite < 40) { $couleur_reussite = "rouge"; }
					echo		'<td class="bilan_reussite_total_'.$couleur_reussite.'">'.$percent_total_reussite.'%</td>';
					echo	'</tr>';
				echo	'</table>';
				
				// Sauvegarde des scores
				//$xml_file = "xml/save.xml";
				//$xml_parseur = @xml_parser_create(); 
				
				// Destruction des variables de session
				$_SESSION = array();
				if (ini_get("session.use_cookies")) { @setcookie(""); }
				@session_destroy();
			}
			else { // exos
				if ($_GET["verif"] == 0) { // afficher l'exo
					$id = $_GET["exo"] - 1;
					$action = 'classe_de_ce1_exo.php?exo='.$_GET["exo"].'&verif=1';
					echo	'<div id="exercice"><form name="session" action="'.$action.'" method="post">';
						echo	'<div id="exo_titre">';
							echo	'<div id="exo_titre_complet">'.$_SESSION["label"][$id].'</div> '; // complément à 10
							echo	'<div id="exo_titre_compteur">'.$_GET["exo"].' / '.end($_SESSION["num"]).'</div>'; // 3/15
						echo	'</div>';
						echo	'<div id="exo_texte">';
							echo	'<span class="exo_texte_complet">'.$_SESSION["exercice"][$id].'</span> '; // complément à 10 de 2 = ?
							echo	'<span class="exo_texte_input"><input type="text" class="reponse" name="reponse" title="écris ici ta réponse" maxlength="4"></span>'; // input pour la réponse
						echo	'</div>';
						echo	'<div id="exo_bouton">';
							echo	'<div id="exo_bouton_resultat">&nbsp;</div>';
							echo	'<div id="exo_bouton_left"><input type="submit" value="&rArr;" class="submit_exo"></div>'; // vérifier
						echo	'</div>';
					echo	'</form></div>';				
					
				}
				elseif ($_GET["verif"] == 1) { // afficher le résultat
					if ($_GET["exo"] == end($_SESSION["num"])) { 
						$suite = 'bilan &raquo;'; 
						$exo_nom = 'bilan'; 
					} else { 
						$suite = 'suivant &raquo;';
						$exo_nom = ($_GET["exo"]+1);
					}
					// suite // bilan
					$id = $_GET["exo"] - 1;
					$action = 'classe_de_ce1_exo.php?exo='.$exo_nom.'&verif=0';
					if ($_POST["reponse"] == $_SESSION["resultat"][$id]) { 
						$class = 'correct'; 
						$image = 'robot_correct.png';
						$resultat = '<span class="couleur_'.$class.'"> bravo :) </span>';
						$_SESSION["score"][$id] = 1;
					} else { 
						$class = 'faux'; 
						$image = 'robot_faux.png';
						$resultat = '<span class="couleur_'.$class.'"> dommage :( </span><br>la réponse correcte était <b>'.$_SESSION["resultat"][$id].'</b>';
						$_SESSION["score"][$id] = 0;
					}
					echo	'<div id="exercice"><form name="session" action="'.$action.'" method="post">';
						echo	'<div id="exo_titre">';
							echo	'<div id="exo_titre_complet">'.$_SESSION["label"][$id].'</div> '; // complément à 10
							echo	'<div id="exo_titre_compteur">'.$_GET["exo"].' / '.end($_SESSION["num"]).'</div>'; // 3/15
						echo	'</div>';
						echo	'<div id="exo_texte">';
							echo	'<span class="exo_texte_complet">'.$_SESSION["exercice"][$id].'</span> '; // complément à 10 de 2 = ?
							echo	'<span class="exo_texte_input"><input disabled type="text" class="'.$class.'" maxlength="3" value="'.$_POST["reponse"].'"></span>'; // input pour la réponse
						echo	'</div>';
						echo	'<div id="exo_bouton">';
							echo	'<div id="exo_bouton_resultat"><img src="img/'.$image.'" class ="resultat_image"> '.$resultat.'</div>';
							echo	'<div id="exo_bouton_right"><input type="submit" value="'.$suite.'" class="submit_exo"></div>'; // vérifier
						echo	'</div>';
					echo	'</form></div>';	
				}
			}
		}
		else {
			echo	'l\'<h1>erreur</h1> est humaine...';
		}

		?>
              </div>
    </div>
    <div id="pied"></div>
</body>
</html>
