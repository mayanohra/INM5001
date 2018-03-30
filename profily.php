<?php
session_start();
  $erreur      = " ";
  $username    = "";
  $pass        = "";
  $id          = "";
  $success     = "";
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username     = $_POST["username"];
    $pass         = $_POST['pass'];
    if ($username == "") {
      $message = $message . " Veuillez entrer votre username. ";
    } else if ($pass == ""){
      $message = $message . " Veuillez entrer votre mot de passe.";
    } else {
    try {
        $bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (Exception $e) {
      die('Erreur : '.$e->getMessage());
    }
    $query=$bdd->prepare('SELECT username, pass
        FROM members WHERE username = :username');
        $query->bindValue(':username',$_POST['username'], PDO::PARAM_STR);
        $query->execute();
        $data=$query->fetch();
    if ( $data['pass'] == $pass ) { // Acces OK !
        $_SESSION['username'] = $data['username'];
        $success = true;
		
		//echo $_SESSION['username'] ;
		
    } else {
      $erreur = $erreur." Une erreur s'est produite, veuillez recommencez...";
    }
    if ($success) {
		
		$html = pageExterne2('confirmation.html');
			
			echo $html;
		
		
		// 
		
      // header("Location: confirmation-c.html?username=$username&amp;id=$id", true, 303);
      exit;
    }
	
	else {
		
		$html = pageExterne2('log2.html');
			
			echo $html;
		
		
		// 
		
      // header("Location: confirmation-c.html?username=$username&amp;id=$id", true, 303);
      exit;
    }
	
	
  }
}




 function pageExterne2($lien){
		


	
	$html= file_get_contents($lien, true)  ;
	$content_replace = array(
	
	
	'$Email'=> 'email test',
'$Birthday' => 'birthday test',
'$Phonenumber' => 'titre test',
'$Apt' => 'appartement test',
'$StreetAddress' => 'adresse test',
'$LastName' => 'last name test',
'$FirstName' => $_SESSION['username'],
'$Username' => $_SESSION['username'],
'$Erreur' => $erreur

	
  );

  
$content = strtr($html, $content_replace );
	
	
	return $content;
	
	}





?>