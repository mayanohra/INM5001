<?php
session_start();
  $erreur      = "";
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
        $bdd = new PDO('mysql:host=localhost;dbname=INM5001;charset=utf8', 'root', '');
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
		
		echo $_SESSION['username'] ;
		
    } else {
      $erreur = $erreur." Une erreur s'est produite, veuillez recommencez...";
    }
    if ($success) {
		
		$html = '
				<div data-spy="scroll" data-target="#nav-target" class="content-side-right nav-spy"> 
					
					salut
					
					'.pageExterne2('confirmation.html').'
					
					
					
					
					
					
				</div>
			';
			
			echo $html;
		
		
		// 
		
      // header("Location: confirmation-c.html?username=$username&amp;id=$id", true, 303);
      exit;
    }
	
	else {
		
		 header("Location: log.php?erreur={$erreur}", true, 303);
      exit;
    }
	
	
  }
}




 function pageExterne2($lien){
		

$nomUtilisateur2=	'bloc2';
	
				
	
	
	$arrayDB = array(
	
	
'bloc2'=>array('username'=>'a', 'password'=>'a' , 'firstname'=>'a', 'lastname'=>'a'), 
'b'=>array('username'=>'b', 'password'=>'b', 'firstname'=>'b', 'lastname'=>'b'),
'c'=>array('username'=>'a', 'password'=>'a', 'firstname'=>'c', 'lastname'=>'c'), 
'd'=>array('username'=>'a', 'password'=>'a', 'firstname'=>'d', 'lastname'=>'d'), 
'e'=>array('username'=>'a', 'password'=>'a', 'firstname'=>'e', 'lastname'=>'e'), 
'f'=>array('username'=>'a', 'password'=>'a', 'firstname'=>'f', 'lastname'=>'f') 

);



	
	
	

	
	$html= file_get_contents($lien, true)  ;
	$content_replace = array(
	
	
	'$Email'=> 'email test',
'$Birthday' => 'birthday test',
'$Phonenumber' => 'titre test',
'$Apt' => 'appartement test',
'$StreetAddress' => 'adresse test',
'$LastName' => 'last name test',
'$FirstName' => $arrayDB[$nomUtilisateur2]['firstname'],
'$Username' => $_SESSION['username']
	
  );

  
$content = strtr($html, $content_replace );
	
	
	return $content;
	
	}





?>