<?php

$resultat;

	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$i = 0;

		foreach ($_POST as $key => $value) {
			if($value == null){
				$resultat = "Erreur";
				$var = json_encode($resultat);
				header("HTTP/1.0 400 identifiant existant $var");
			}
		}
	}

	header("location:index.php");
	exit;
?>