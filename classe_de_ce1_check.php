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
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>locochoco : session</title>
    
    <link rel="stylesheet" media="screen" type="text/css" title="locochoco" href="css/locochoco.css" />
    	<?PHP 
    		include "func/fonctions.php";
		
	// Paramétrage des exercices ----------------------------------------------------------------------------------------
		$url = $_SERVER['REQUEST_URI'];
		$tab_url = explode ("?",$url);
		$tab_var = explode ("&", $tab_url[1]);
		$tab_qte = explode ("=",$tab_var[0]);
			$qte = $tab_qte[1];
		for ($a=1;$a<count($tab_var);$a++) {
			$tmp = explode ("=",$tab_var[$a]);
			if (is_numeric(substr($tmp[0],-2))) { $serie = substr($tmp[0],-2); $domaine = substr($tmp[0],0,-2); }
			else { $serie = substr($tmp[0],-1); $domaine = substr($tmp[0],0,-1); }
			$tab_domaine[($a-1)] = $domaine;
			$tab_serie[($a-1)] = $serie;
		}

		// Enregistrement dans la session courante
		$_SESSION["qte"] = $qte;			// quantité d'exercices de chaque
		$_SESSION["tab_domaine"] = $tab_domaine;	// tableau des domaines
		$_SESSION["tab_serie"] = $tab_serie;	// tableau de la série correspondante (au tab_domaine)

		$y=0;
		$compteur = count($_SESSION["tab_domaine"]) * $_SESSION["qte"];
		for ($b=0;$b<$compteur;$b++) {
			// $tab_serie = array ($tab_exo,$tab_resultat); 
			$type = serie_type ($_SESSION["tab_domaine"][$b], $_SESSION["tab_serie"][$b], $tab_domaines);
			$tab_exercices[$b] = creer_exo ($_SESSION["tab_domaine"][$b], $type, $_SESSION["qte"]); // 5 exos de "type" "domaine"
			$tab_exo = $tab_exercices[$b][0];
			$tab_resultat = $tab_exercices[$b][1];
			$tab_infos = $_SESSION["tab_domaine"]["infos"];
			
			for ($v=0;$v<count($tab_exo);$v++) {
				// Sauvegarde des séries d'exercices
				$_SESSION["num"][$y] = ($y+1);
				$_SESSION["domaine"][$y] = $tab_infos[$t]["label"]; //$_SESSION["tab_domaine"][$b];
				$label = serie_label ($_SESSION["tab_domaine"][$b], $_SESSION["tab_serie"][$b], $tab_domaines);
				$_SESSION["label"][$y] = $label;
				$_SESSION["exercice"][$y] = $tab_exo[$v];
				$_SESSION["resultat"][$y] = $tab_resultat[$v];
				$_SESSION["score"][$y] = '';
				$y++;
			}
		}

// Pour vérification -------------------------
/*for ($t=0;$t<count($_SESSION["num"]);$t++) {
	echo	'{'.$_SESSION["num"][$t].'} '.$_SESSION["domaine"][$t].' "'.$_SESSION["label"][$t].'" => '.$_SESSION["exercice"][$t].' ['.$_SESSION["resultat"][$t].']<br>';
}*/

		
		// Lancement des exercices
		echo	'<meta http-equiv="refresh" content="0; URL=classe_de_ce1_exo.php?exo=1&verif=0">';
	?>
       
</head>

<body>
	<div id="page">
    	<div id="ariane">calcul mental &raquo; <a href="index.php" target="_self">choix des exercices</a> &raquo; <a href="classe_de_ce1.php" target="_self">séries</a></div>
		<div id="param">
              
              </div>
    </div>
    <div id="pied"></div>
</body>
</html>
