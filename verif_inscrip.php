<?php

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
      
			$first_name 		= $_POST["f_name"];
      $last_name      = $_POST["l_name"]
      $username       = $_POST["username"];
			$mdp		        = $_POST["pass"];
      $mdp_confirm    = $_POST["confirmPass"];
      $phone          = $_POST["phone"];
      $gender         = $_POST["gender"];
      $dob            = $_POST["birthday"];
      $email          = $_POST["email"];


			if (isset($_POST["dob"])) {
				$dob = $_POST["dob"] ;
			}

			try {
			    $bdd = new PDO('mysql:host=localhost;dbname=membres;charset=utf8', 'root', 'root');
    			$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			} catch (Exception $e) {
				die('Erreur : '.$e->getMessage());
			}

      $bdd->exec("INSERT INTO client(nom, prenom, username, dob, sexe, cellulaire, courriel, mdp)
						VALUES ('$nom', '$prenom', '$username', '$dob', '$sexe', '$cellulaire', '$email', '2', '$mdp')");

			header("Location: profilBlock.html");

		}
	}
?>
