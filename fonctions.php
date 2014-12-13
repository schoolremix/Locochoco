<?PHP	
	/* --- LOCOCHOCO : LA PIEUVRE DES MATHS ---
	 
	   Licence	: CC BY International 4.0
	   Auteur	: School(Re)mix
	   Date	: 2014
	
	---------------------------------------- */
?>

<?PHP
	
	//class CalculMentalCE1 {

		
		// AJOUTER [ 1 | 2 | 5 | 10 | 100 | dizaine | centaine ] ------------------------------------------------------------
			$dom_ajouter = array (
					array ("type" => "1", "nb" => "<=20", "label" => "+ 1"),
					array ("type" => "2", "nb" => "<=20", "label" => "+ 2"),
					array ("type" => "5", "nb" => "<=20", "label" => "+ 5"),
					array ("type" => "10", "nb" => "", "label" => "+ 10"),
					array ("type" => "100", "nb" => "", "label" => "+ 100"),
					array ("type" => "dizaine", "nb" => "<=100", "label" => "dizaine + dizaine"), // dizaines entre elles
					array ("type" => "centaine", "nb" => "<=1000", "label" => "centaine + centaine") // centaines entre elles
				);
				
			// SERIE : Ajouter  
			function serie_ajouter ($type, $qte) {
				
				// paramétrages
				if ($type == "1" || $type == "2" || $type == "5") { $max = 20; }
				if ($type == "10") { $max = 100; }
				if ($type == "100") { $max = 1000; }
				
				// création de la série
				if ($type == "1" || $type == "2" || $type == "5" || $type == "10" || $type == "100") { // ajouter nb + ...
					$tab_exo = array (""); $nombre = "";
					for ($i=0;$i<$qte;$i++) {
						while (in_array($nombre,$tab_exo)) { $nombre = rand (0,$max); }			
						$tab_exo[$i] = "$nombre + $type = ?";
						$tab_resultat[$i] = ($nombre + (int)$type);
					}
				}
				if ($type == "dizaine" || $type == "centaine") { // ajouter des dizaines entre elles...
					$tab_exo = array (""); $operation = "";
					if ($type == "dizaine") { $zero = 10; }
					if ($type == "centaine") { $zero = 100; }
					for ($i=0;$i<$qte;$i++) {
						while (in_array($operation,$tab_exo)) { 
							$nb1 = rand (1,9)*$zero; 
							$nb2 = rand (1,9)*$zero; 
							$operation = "$nb1 + $nb2 = ?"; 
						}
						$tab_exo[$i] = $operation;
						$tab_resultat[$i] = ($nb1 + $nb2);
					}
				}
				
				// retour
				$tab_serie = array ($tab_exo,$tab_resultat); 
				return $tab_serie;
			}
			
		// RETRANCHER [ 1 | 2 | 5 | 10 | 100 | dizaine | centaine ] ------------------------------------------------------------
			$dom_retrancher = array (
					array ("type" => "1", "nb" => "<=20", "label" => "&minus; 1"),
					array ("type" => "2", "nb" => "<=20", "label" => "&minus; 2"),
					array ("type" => "5", "nb" => "<=20", "label" => "&minus; 5"),
					array ("type" => "10", "nb" => "", "label" => "&minus; 10"),
					array ("type" => "100", "nb" => "", "label" => "&minus; 100"),
					array ("type" => "dizaine", "nb" => "<=100", "label" => "dizaine &minus; dizaine"), // dizaines entre elles
					array ("type" => "centaine", "nb" => "<=1000", "label" => "centaine &minus; centaine") // centaines entre elles
				);
			
			// SERIE : Retrancher  
			function serie_retrancher ($type, $qte) {
				
				// paramétrages
				if ($type == "1" || $type == "2" || $type == "5") { $max = 20; }
				if ($type == "10") { $max = 100; }
				if ($type == "100") { $max = 1000; }
				
				// création de la série
				if ($type == "1" || $type == "2" || $type == "5" || $type == "10" || $type == "100") {
					$tab_exo = array (""); $nombre = "";
					for ($i=0;$i<$qte;$i++) {
						while (in_array($nombre,$tab_exo)) { $nombre = rand ($type,$max); }
						$tab_exo[$i] = "$nombre &minus; $type = ?";
						$tab_resultat[$i] = ($nombre - (int)$type);
					}
				}
				if ($type == "dizaine" || $type == "centaine") { // retrancher des dizaines entre elles...
					$tab_exo = array ("");  $operation = "";
					if ($type == "dizaine") { $zero = 10; }
					if ($type == "centaine") { $zero = 100; }
					for ($i=0;$i<$qte;$i++) {
						while (in_array($operation,$tab_exo)) { 
							$hasard = rand(1,9);
							$nb1 = ($hasard * $zero);
							$nb2 = (rand(1,($hasard-1)) * $zero); 
	//						while ($nb1 < $nb2) { $nb2 = (rand(0,9) * $zero); } 
							$operation = "$nb1 &minus; $nb2 = ?";
						}
						$tab_exo[$i] = $operation;
						$tab_resultat[$i] = ($nb1 - $nb2);
					}
				}
				
				// retour
				$tab_serie = array ($tab_exo,$tab_resultat); 
				return $tab_serie;
			}
			
		// COMPLEMENT [ 10 | 20 | dizaine ] ----------------------------------------------------------------------------------
			$dom_complement = array (
					array ("type" => "10", "nb" => "", "label" => "complément à 10"), // à 10
					array ("type" => "20", "nb" => "", "label" => "complément à 20"), // à 20
					array ("type" => "dizaine", "nb" => "<=100", "label" => "complément à la dizaine supérieure"), // dizaine supérieure
				);
			
			// SERIE : Complément  
			function serie_complement ($type, $qte) {
				
				// paramétrages
				if ($type == "10") { $min = 1; $max = 10; }
				if ($type == "20") { $min = 11; $max = 20; }
				if ($type == "dizaine") { $min = 21; $max = 99; }
				
				// création de la série
				if ($type == "10" || $type == "20") {
					$tab_exo = array (""); $operation = "";
					for ($i=0;$i<$qte;$i++) {
						while (in_array($operation,$tab_exo)) { 
							$nombre = rand ($min,$max); 
							$operation = "complément à $type de $nombre = ?";
						}
						$tab_exo[$i] = $operation;
						$tab_resultat[$i] = ($max - $nombre);
					}
				}
				elseif ($type == "dizaine") {
					$tab_exo = array (""); $operation = ""; $nombre = "";
					for ($i=0;$i<$qte;$i++) {
						while (in_array($operation,$tab_exo) || (substr($nombre,-1)==0)) { 
							$nombre = rand ($min,$max); 
							$operation = "complément à la dizaine supérieure de $nombre = ?";
						}
						$dizaine_sup = ceil($nombre/10)*10;
						$tab_exo[$i] = $operation;
						$tab_resultat[$i] = ($dizaine_sup - $nombre);
					}
				}
				
				// retour
				$tab_serie = array ($tab_exo,$tab_resultat); 
				return $tab_serie;
			}
			
		// DECOMPOSER [ 10 | 20 ] --------------------------------------------------------------------------------------------- ATTENTION $qte<=5 !!
			$dom_decomposer = array (
					array ("type" => "10", "nb" => "<=10", "label" => "décomposer avec 5"), // à l'aide du nb 5
					array ("type" => "20", "nb" => "(>10)&(<=20)", "label" => "décomposer avec 10"), // à l'aide du nb 10
				);
				
			// SERIE : Décomposer  
			function serie_decomposer ($type, $qte) {
				
				// paramétrages
				if ($type == "10") { $min = 5; $max = 10; if ($qte>5) { $qte = 5; } }
				if ($type == "20") { $min = 11; $max = 20; }
				
				// création de la série
				$tab_exo = array (""); $operation = "";
				for ($i=0;$i<$qte;$i++) {
					while (in_array($operation,$tab_exo)) { 
						$nombre = rand ($min,$max); 
						$operation = "$nombre = ".($max/2)." + ?";
					}
					$tab_exo[$i] = $operation;
					$tab_resultat[$i] = ($nombre - ($max/2));
				}
				
				// retour
				$tab_serie = array ($tab_exo,$tab_resultat); 
				return $tab_serie;
			}
			
		// ADDITIONNER [ 10 ] --------------------------------------------------------------------------------------------------
			$dom_additionner = array (
					array ("type" => "10", "nb" => "<=10", "label" => "additionner"), // somme<=10
				);
			
			// SERIE : Additionner  
			function serie_additionner ($type, $qte) {
				
				// création de la série
				$tab_exo = array (""); $operation = "";
				for ($i=0;$i<$qte;$i++) {
					while (in_array($operation,$tab_exo)) { 
						$nb1 = rand(1,9);
						$nb2 = rand(0,(10-$nb1)); 
	//					while (($nb2+$nb1)>10) { $nb2 = rand (0,9); } 
						$operation = "$nb1 + $nb2 = ?"; 
					}
					$tab_exo[$i] = $operation;
					$tab_resultat[$i] = ($nb1 + $nb2);
				}
				
				// retour
				$tab_serie = array ($tab_exo,$tab_resultat); 
				return $tab_serie;
			}
		
		// SOUSTRAIRE [ 10 ] ---------------------------------------------------------------------------------------------------
			$dom_soustraire = array (
					array ("type" => "10", "nb" => "<=10", "label" => "soustraire"), // somme<=10
				);
			
			// SERIE : Soustraire  
			function serie_soustraire ($type, $qte) {
				
				// création de la série
				$tab_exo = array (""); $operation = "";
				for ($i=0;$i<$qte;$i++) {
					while (in_array($operation,$tab_exo)) {
						$nb1 = rand(2,9);
						$nb2 = rand(1,($nb1-1)); 
	//					while (($nb2+$nb1)>10) { $nb2 = rand (1,$nb1); } 
						$operation = "$nb1 &minus; $nb2 = ?"; 
					}
					$tab_exo[$i] = $operation;
					$tab_resultat[$i] = ($nb1 - $nb2);
				}
				
				// retour
				$tab_serie = array ($tab_exo,$tab_resultat); 
				return $tab_serie;
			}
			
		// TABLEPLUS [ 2 | 3 | 4 | 5 ] -----------------------------------------------------------------------------------------
			$dom_tableplus = array (
					array ("type" => "2", "nb" => "", "label" => "table + 2"),
					array ("type" => "3", "nb" => "", "label" => "table + 3"),
					array ("type" => "4", "nb" => "", "label" => "table + 4"),
					array ("type" => "5", "nb" => "", "label" => "table + 5"),
				);
			
			// SERIE : Tables d'additions  
			function serie_tableplus ($type, $qte) {
				
				// création de la série
				$tab_exo = array (""); $operation = "";
				for ($i=0;$i<$qte;$i++) {
					while (in_array($operation,$tab_exo)) { 
						$nombre = rand(1,10);
						$operation = "$type + $nombre = ?";
					}
					$tab_exo[$i] = $operation;
					$tab_resultat[$i] = ((int)$type + $nombre);
				}
				
				// retour
				$tab_serie = array ($tab_exo,$tab_resultat); 
				return $tab_serie;
			}
			
		// TABLEMOINS [ 2 | 3 | 4 | 5 ] -----------------------------------------------------------------------------------------
			$dom_tablemoins = array (
					array ("type" => "2", "nb" => "", "label" => "table &minus; 2"),
					array ("type" => "3", "nb" => "", "label" => "table &minus; 3"),
					array ("type" => "4", "nb" => "", "label" => "table &minus; 4"),
					array ("type" => "5", "nb" => "", "label" => "table &minus; 5"),
				);
			
			// SERIE : Tables de soustractions  
			function serie_tablemoins ($type, $qte) {
				
				// création de la série
				$tab_exo = array (""); $operation = "";
				for ($i=0;$i<$qte;$i++) {
					while (in_array($operation,$tab_exo)) {
						$nombre = rand ((int)$type,10); 
						$operation = "$nombre &minus; $type = ?"; 
					}
					$tab_exo[$i] = $operation;
					$tab_resultat[$i] = ($nombre - (int)$type);
				}
				
				// retour
				$tab_serie = array ($tab_exo,$tab_resultat); 
				return $tab_serie;
			}
				
		// CALCULPLUS [ 10 | 20 | 200 ] ----------------------------------------------------------------------------------------
			$dom_calculplus = array (
					array ("type" => "2 nombres", "nb" => "<=10", "label" => "somme de 2 nombres"),
					array ("type" => "20+7", "nb" => "", "label" => "dizaine +"),
					array ("type" => "200+37", "nb" => "", "label" => "centaine +"),
				);
			
			// SERIE : Calculer (addition)  
			function serie_calculplus ($type, $qte) {
				
				// paramétrages
				if ($type == "2 nombres") { $min = 0; $max = 10; }
				if ($type == "20+7") { $zero = 10; $min = 1; $max = 10; }
				if ($type == "200+37") { $zero = 100; $min = 11; $max = 99; }
				
				// création de la série
				if ($type == "2 nombres") {
					$tab_exo = array (""); $operation = ""; $nb1 = ""; $nb2 = "";
					for ($i=0;$i<$qte;$i++) {
						while (in_array($operation,$tab_exo) || ($nb1==$nb2)) {
							$nb1 = rand (1,10); $nb2 = rand (1,10); 
							$operation = "$nb1 + $nb2 = ?"; 
						}
						$tab_exo[$i] = $operation;
						$tab_resultat[$i] = ($nb1 + $nb2);
					}
				}
				else {
					$tab_exo = array (""); $operation = "";
					for ($i=0;$i<$qte;$i++) {
						while (in_array($operation,$tab_exo)) { 
							$nb1 = rand (1,9)*$zero; 
							$nb2 = rand ($min,$max); 
							$operation = "$nb1 + $nb2 = ?"; 
						}
						$tab_exo[$i] = $operation;
						$tab_resultat[$i] = ($nb1 + $nb2);
					}
				}
				
				// retour
				$tab_serie = array ($tab_exo,$tab_resultat); 
				return $tab_serie;
			}
			
		// CALCULMOINS [ 10 | 20 | 27 | 200 | 237 ] ------------------------------------------------------------------------------
			$dom_calculmoins = array (
					array ("type" => "2 nombres", "nb" => "<10", "label" => "différence de 2 nombres"),
					array ("type" => "20 pour aller à 27", "nb" => "", "label" => "&laquo; pour aller à &raquo; dizaine"),
					array ("type" => "27-7", "nb" => "", "label" => "dizaine &minus;"),
					array ("type" => "200 pour aller à 237", "nb" => "", "label" => "&laquo; pour aller à &raquo; centaine"),
					array ("type" => "237-37", "nb" => "", "label" => "centaine &minus;"),
				);
			
			// SERIE : Calculer (soustraction)  
			function serie_calculmoins ($type, $qte) {
				
				// paramétrages
				if ($type == "2 nombres") { $min = 0; $max = 10; }
				if ($type == "27-7") { $zero = 10; $min = 1; $max = 9; }
				if ($type == "237-37") { $zero = 100; $min = 11; $max = 99; }
				if ($type == "20 pour aller à 27") { $zero = 10; $min = 1; $max = 9; }
				if ($type == "200 pour aller à 237") { $zero = 100; $min = 11; $max = 99; }
				
				// création de la série
				if ($type == "2 nombres") {
					$tab_exo = array (""); $operation = "";
					for ($i=0;$i<$qte;$i++) {
						while (in_array($operation,$tab_exo)) {
							$nb1 = rand (1,10); $nb2 = rand (1,$nb1); 
							$operation = "$nb1 &minus; $nb2 = ?"; 
						}
						$tab_exo[$i] = $operation;
						$tab_resultat[$i] = ($nb1 - $nb2);
					}
				}
				if (($type == "27-7") || ($type == "237-37")) {
					$tab_exo = array (""); $operation = "";
					for ($i=0;$i<$qte;$i++) {
						while (in_array($operation,$tab_exo)) { 
							$nb2 = rand ($min,$max);
							$nb1 = (rand(1,9)*$zero) + $nb2; 
							$operation = "$nb1 &minus; $nb2 = ?"; 
						}
						$tab_exo[$i] = $operation;
						$tab_resultat[$i] = ($nb1 - $nb2);
					}
				}
				if (($type == "20 pour aller à 27") || ($type == "200 pour aller à 237")) {
					$tab_exo = array (""); $operation = "";
					for ($i=0;$i<$qte;$i++) {
						while (in_array($operation,$tab_exo)) { 
							$nb1 = rand (1,9);
							$nb2 = ($nb1*$zero) + rand($min,$max); 
							$operation = ($nb1*$zero)." pour aller à $nb2 = ?"; 
						}
						$tab_exo[$i] = $operation;
						$tab_resultat[$i] = ($nb2 - ($nb1*$zero));
					}
				}
				
				// retour
				$tab_serie = array ($tab_exo,$tab_resultat); 
				return $tab_serie;
			}
			
			
		// DOUBLE [ 1 | 10 | 20 | 30 | 40 | 50 | 100 | 200 | 300 | 400 | 15 | 25 ] ----------------------------------------------
			$dom_double = array (
					array ("type" => "double", "nb" => "<=10", "label" => "doubles"), // "double de 8" / "2 x 8"
					array ("type" => "doubles", "nb" => "", "label" => "doubles spéciaux"), // 10 | 20 | 30 | 40 | 50 | 100 | 200 | 300 | 400 | 15 | 25
				);
				
			// SERIE : Doubles  
			function serie_double ($type, $qte) {
				
				// création de la série
				if ($type == "double") {
					$tab_exo = array (""); $operation = "";
					for ($i=0;$i<$qte;$i++) {
						while (in_array($operation,$tab_exo)) {
							$nombre = rand (1,10); 
							if ($i%2) { $operation = "$nombre &times; 2 = ?"; } else { $operation = "double de $nombre = ?"; }
						}
						$tab_exo[$i] = $operation;
						$tab_resultat[$i] = ($nombre * 2);
					}
				}
				else {
					$tab_speciaux = array (10,20,30,40,50,100,200,300,400,15,25);
					$tab_exo = array (""); $operation = "";
					for ($i=0;$i<$qte;$i++) {
						while (in_array($operation,$tab_exo)) {
							$max = count($tab_speciaux)-1; 
							$nombre = $tab_speciaux[rand (0,$max)]; 
							if ($i%2) { $operation = "$nombre &times; 2 = ?"; } else { $operation = "double de $nombre = ?"; }
						}
						$tab_exo[$i] = $operation;
						$tab_resultat[$i] = ($nombre * 2);
					}
				}
				
				// retour
				$tab_serie = array ($tab_exo,$tab_resultat); 
				return $tab_serie;
			}
						
		// MOITIE [ 1 | 10 | 20 | 30 | 40 | 50 | 100 | 200 | 300 | 400 | 15 | 25 ] ---------------------------------------------
			$dom_moitie = array (
					array ("type" => "moitié", "nb" => "<=10", "label" => "moitiés"), // nombres PAIRS // "moitié de 8" / "8 / 2"
					array ("type" => "moitiés", "nb" => "", "label" => "moitiés spéciales"), // 10 | 20 | 30 | 40 | 50 | 100 | 200 | 300 | 400 | 15 | 25
				);
				
			// SERIE : Moitiés  
			function serie_moitie ($type, $qte) {
				
				// création de la série
				if ($type == "moitié") { // 2 4 6 8 10 12 14 16 18 20
					$tab_exo = array (""); $operation = ""; $nombre = "";
					for ($i=0;$i<$qte;$i++) {
						while (($nombre%2) || (in_array($operation,$tab_exo))) { 
							$nombre = rand (2,20); 
							if ($i%2) { $operation = "$nombre &divide; 2 = ?"; } else { $operation = "moitié de $nombre = ?"; }
						}
						$tab_exo[$i] = $operation;
						$tab_resultat[$i] = ($nombre / 2);
					}
				}
				else {
					$tab_speciaux = array (10,20,30,40,50,100,200,300,400);
					$tab_exo = array (""); $operation = "";
					for ($i=0;$i<$qte;$i++) {
						while (in_array($operation,$tab_exo)) { 
							$max = count($tab_speciaux)-1; 
							$nombre = $tab_speciaux[rand (0,$max)]; 
							if ($i%2) { $operation = "$nombre &divide; 2 = ?"; } else { $operation = "moitié de $nombre = ?"; }
						}
						$tab_exo[$i] = $operation;
						$tab_resultat[$i] = ($nombre / 2);
					}
				}
				
				// retour
				$tab_serie = array ($tab_exo,$tab_resultat); 
				return $tab_serie;
			}
				
		// TABLEFOIS [ 2 | 5 ] -------------------------------------------------------------------------------------------------
			$dom_tablefois = array (
					array ("type" => "2", "nb" => "", "label" => "table &times; 2"),
					array ("type" => "5", "nb" => "", "label" => "table &times; 5"),
				);
			
			// SERIE : Tables de multiplication  
			function serie_tablefois ($type, $qte) {
				
				// création de la série
				$tab_exo = array (""); $operation = "";
				for ($i=0;$i<$qte;$i++) {
					while (in_array($operation,$tab_exo)) { 
						$nombre = rand (1,10); 
						$operation = "$type &times; $nombre = ?";
					}
					$tab_exo[$i] = $operation;
					$tab_resultat[$i] = ((int)$type * $nombre);
				}
				
				// retour
				$tab_serie = array ($tab_exo,$tab_resultat); 
				return $tab_serie;
			}
			
		// MULTIPLIER [ 10 | 100 ] ----------------------------------------------------------------------------------------------
			$dom_multiplier = array (
					array ("type" => "10", "nb" => "", "label" => "&times; 10"),
					array ("type" => "100", "nb" => "", "label" => "&times; 100"),
				);
			
			// SERIE : Calculer (multiplication)  
			function serie_multiplier ($type, $qte) {
				
				// paramétrages
				if ($type == "10") { $zero = 10; }
				if ($type == "100") { $zero = 100; }
				
				// création de la série
				$tab_exo = array (""); $operation = "";
				for ($i=0;$i<$qte;$i++) {
					while (in_array($operation,$tab_exo)) {
						$nombre = rand (1,9); 
						$operation = "$nombre &times; $type = ?"; 
					}
					$tab_exo[$i] = $operation;
					$tab_resultat[$i] = ($nombre * (int)$type);
				}
				
				// retour
				$tab_serie = array ($tab_exo,$tab_resultat); 
				return $tab_serie;
			}
		

		// Propriétés générales
		$tab_domaines = array (
			array ("infos" => $dom_ajouter, 		"label" => "ajouter", 		"url" => "ajouter"),
			array ("infos" => $dom_retrancher, 	"label" => "retrancher", 		"url" => "retrancher"),
			array ("infos" => $dom_complement, 	"label" => "complément", 		"url" => "complement"),
			array ("infos" => $dom_decomposer, 	"label" => "décomposer", 		"url" => "decomposer"),
			array ("infos" => $dom_additionner,	"label" => "additionner", 		"url" => "additionner"),
			array ("infos" => $dom_soustraire, 	"label" => "soustraire", 		"url" => "soustraire"),
			array ("infos" => $dom_multiplier, 	"label" => "multiplier", 		"url" => "multiplier"),
			array ("infos" => $dom_tableplus, 		"label" => "table +", 		"url" => "tableplus"),
			array ("infos" => $dom_tablemoins, 	"label" => "table &minus;",		"url" => "tablemoins"),
			array ("infos" => $dom_tablefois, 		"label" => "table &times;", 	"url" => "tablefois"),
			array ("infos" => $dom_calculplus, 	"label" => "calculer +", 		"url" => "calculplus"),
			array ("infos" => $dom_calculmoins, 	"label" => "calculer &minus;", 	"url" => "calculmoins"),
			array ("infos" => $dom_double, 		"label" => "doubles", 		"url" => "double"),
			array ("infos" => $dom_moitie, 		"label" => "moitiés", 		"url" => "moitie")
		);
				
		// Création des exercices
		function creer_exo ($domaine,$type,$qte) {
			if ($domaine == "ajouter") 		{ return serie_ajouter($type,$qte); }
			if ($domaine == "retrancher") 	{ return serie_retrancher($type,$qte); }
			if ($domaine == "complement") 	{ return serie_complement($type,$qte); }
			if ($domaine == "decomposer") 	{ return serie_decomposer($type,$qte); }
			if ($domaine == "additionner") 	{ return serie_additionner($type,$qte); }
			if ($domaine == "soustraire") 	{ return serie_soustraire($type,$qte); }
			if ($domaine == "multiplier") 	{ return serie_multiplier($type,$qte); }
			if ($domaine == "tableplus") 	{ return serie_tableplus($type,$qte); }
			if ($domaine == "tablemoins") 	{ return serie_tablemoins($type,$qte); }
			if ($domaine == "tablefois") 	{ return serie_tablefois($type,$qte); }
			if ($domaine == "calculplus") 	{ return serie_calculplus($type,$qte); }
			if ($domaine == "calculmoins") 	{ return serie_calculmoins($type,$qte); }
			if ($domaine == "double") 		{ return serie_double($type,$qte); }
			if ($domaine == "moitie") 		{ return serie_moitie($type,$qte); }
		}
		
		// De "$serie" à "$type"
		function serie_type ($domaine, $serie, $tab_domaines) {
			// recherche du tableau d'infos correspondant à "domaine"
			for ($r=0;$r<count($tab_domaines);$r++) {
				if ($tab_domaines[$r]["url"] == $domaine) { $tab_dom = $tab_domaines[$r]["infos"]; }
			}
			// recherche du "type" correspondant à la "serie" du "domaine"
			$type = $tab_dom[$serie]["type"];
			return $type;
		}
		
		// De "$serie" à "$label"
		function serie_label ($domaine, $serie, $tab_domaines) {
			// recherche du tableau d'infos correspondant à "domaine"
			for ($r=0;$r<count($tab_domaines);$r++) {
				if ($tab_domaines[$r]["url"] == $domaine) { $tab_dom = $tab_domaines[$r]["infos"]; }
			}
			// recherche du "type" correspondant à la "serie" du "domaine"
			$label = $tab_dom[$serie]["label"];
			return $label;
		}
		
	
	// BILAN --------------------------
	/*
	
		$_SESSION["qte"]
		$_SESSION["num"][$i]
		$_SESSION["domaine"][$i]
		$_SESSION["label"][$i]
		$_SESSION["exercice"][$i]
		$_SESSION["resultat"][$i]
		$_SESSION["score"][$i] 
					
	*/
	function somme ($typeresult, $tab_session_scores, $session_domaine, $tab_session_domaines) { // $typeresult = "correct" / "faux"
		if ($typeresult == "correct") {
			if ($session_domaine == "tous") { return array_sum($tab_session_scores); }
			else {
				$total = 0;
				for ($h=0;$h<count($tab_session_domaines);$h++) {
					if ($tab_session_domaines[$h] == $session_domaine) { $total++; }
					return $total;
				}
			}
		}
		if ($typeresult == "faux") {
			return count($tab_session_scores) - array_sum($tab_session_scores);
		}
	}


	//} // FIN CLASSE
?>
