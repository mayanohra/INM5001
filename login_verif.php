<?php
$msgErreur = "";
$erreur = false;

if($_SERVER['REQUEST_METHOD'] == 'POST'){
	$username = str_replace(" ", "", $_POST['username']);
	$password = str_replace(" ", "", $_POST['password']);

	if(is_null($username) || empty($username)){
		$msgErreur .= "Veuillez entrer un nom d'utilisateur.";
		$erreur = true;
	}

	if(is_null($password) || empty($password)){
		$msgErreur .= "Veuillez entrer un mot de passe.";
		$erreur = true;
	}

	//Connexion avec une base de données
	if(!$erreur){
		$db = mysqli_connect("gator3214.hostgator.com", "inm5001", "cours5001") or die(mysql_error());
		mysqli_select_db($db, "inm5001_users") or die(mysql_error());

		//fetch donnees de la BD
		$sql = "SELECT * FROM users WHERE Username = '$username'";
		$result = $db->query($sql);

		if ($result->num_rows > 0) {
		    while($row = $result->fetch_assoc()) {

		    	$compareUser = strcmp($row["Username"], $username);
		    	$comparePass = strcmp($row["Password"], $password);


		    	if($compareUser == 0 && $comparePass == 0){
		    		header("location:profilModif.html?username=$username");
		    		exit;
		    	}else if($compareUser == 0 && $comparePass != 0){
		    		$erreur = true;
					$msgErreur .= "le nom d'utilisateur ou le mot de passe 
		    			ne sont pas valide.";
		    	}
		    }
		}else{
			$erreur = true;
		}
		$db->close();
	}

	if($erreurl){
		header("location:logIn.html");
		exit;
	}

}