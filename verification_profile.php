<?php

function insertData($username, $firstname, $lastname, $telephone, $dateNaissance, $email){
	$db = mysqli_connect("gator3214.hostgator.com", "inm5001", "cours5001") or die(mysql_error());
		mysqli_select_db($db, "inm5001_users") or die(mysql_error());

	//ALWAYS ESCAPE STRINGS IF YOU HAVE RECEIVED THEM FROM USERS
	$findUser = mysqli_query($db, "SELECT * FROM users WHERE Username='$username'");
	$row = mysqli_fetch_array($findUser); 

	$sql = "UPDATE users SET FirstName='$firstname' WHERE id='1'";
	$res = mysqli_query($db, $sql);

	$sql_name = "SELECT * FROM users WHERE FirstName='$firstname'";
	$result = $db->query($sql_name);

	// if ($result->num_rows > 0) {
	//     // output data of each row
	//     while($row = $result->fetch_assoc()) {
	//         if(strcmp($row['firstname'], $firstname)){
	//         }
	//     }
	// }

	var_dump($result);

	$db->close();
}


$msgErreur = "Les champs suivant ne sont pas valides: ";
$erreur = false;

if($_SERVER['REQUEST_METHOD'] == 'POST'){
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$telephone = $_POST['telephone'];
	$dob = $_POST['dateNaissance'];
	$email = $_POST['email'];

	if($firstname == null || empty(str_replace(' ', '', $firstname))
		|| !ctype_alpha($firstname)){
		$msgErreur .= "\nPrénom";
		$erreur = true;
	}

	if($lastname == null || empty(str_replace(' ', '', $lastname))
		|| !ctype_alpha($lastname)){
		$msgErreur .= "\nNom";
		$erreur = true;
	}

	if($telephone == null || empty(str_replace(' ', '', $telephone))
		|| !ctype_digit(str_replace('-', '', $telephone))){
		$msgErreur .= "\nTéléphone";
		$erreur = true;
	}

	if($dob == null){
		$msgErreur .= "\nDate de naissance";
		$erreur = true;
	}else{
		$annee = substr($dob, 0, 4);
		$anneePresent = date('Y');

		if(($anneePresent - $annee) < 18){
			$msgErreur .= "\nMoins de 18 ans";
			$erreur = true;
		}
	}

	if($email == null || empty(str_replace(' ', '', $email))
		|| !filter_var($email, FILTER_SANITIZE_EMAIL)){
		$msgErreur .= "\nE-mail";
		$erreur = true;
	}

	if(!$erreur){
		insertData($_POST['username'], $firstname, $lastname, $telephone, $dob, $email);
		// header("location:index.php");
		// exit;
	}else{		
		// header("location:profile.php");
		// exit;
	}
}