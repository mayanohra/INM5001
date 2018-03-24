<?php
$msgErreur = "";
$erreur = false;

if($_SERVER['REQUEST_METHOD'] == 'POST'){
	$username = $_POST['username'];
	$password = $_POST['password'];

	if(is_null($username) || empty(str_replace(" ", "", $username))){
		$msgErreur .= "Veuillez entrer un nom d'utilisateur.";
		$erreur = true;
	}

	if(is_null($password) || empty(str_replace(" ", "", $password))){
		$msgErreur .= "Veuillez entrer un mot de passe.";
		$erreur = true;
	}

	//Connexion avec une base de données
	if(!$erreur){
		$db = mysqli_connect("gator3214.hostgator.com", "inm5001_maya@localhost", "cours5001") or die(mysql_error());
		mysqli_select_db($db, "inm5001_users") or die(mysql_error());

		//fetch donnees de la BD
		$sql = "SELECT * FROM users";
		$result = $db->query($sql);

		if ($result->num_rows > 0) {
		    while($row = $result->fetch_assoc()) {

		    	$compareUser = strcmp($row["Username"], $username);
		    	$comparePas_s = strcmp($row["Password"], $password);


		    	if($compareUser == 0 && $comparePass == 0){
		    		
		    		header("location:profile.php?username=$username");
		    		exit;
		    
		    	}elseif($compareUser == 0 && $comparePass != 0){

					$msgErreur .= "le nom d'utilisateur ou le mot de passe 
		    			ne sont pas valide.";
		    	}
		    }
		} 
		$db->close();
	}

	header("location:logIn.html");
	exit;
}