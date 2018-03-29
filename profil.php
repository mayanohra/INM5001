<?php

 if($_SERVER['REQUEST_METHOD'] == "POST"){
	 
	 $nomUtilisateur = isset($_POST["username"]) ? $_POST["username"]: ""; 
	 
	 

$html = '
				<div data-spy="scroll" data-target="#nav-target" class="content-side-right nav-spy"> 
					
					salut
					
					
					'.pageExterne2('profilBlock2.html').'
					
					
					
					
					
				</div>
			';
			
			echo $html;
			
			
			
			
			
			
			
	
	
	
	
	
	
	
	
	
	
	  }
	  
	  
	  
	  
	  function pageExterne2($lien){
		

$nomUtilisateur2=	'bloc2';
$nomUtilisateur3=isset($_POST["username"]) ? $_POST["username"]: ""; 	
				
	
	
	$arrayDB = array(
	
	
'a'=>array('username'=>'a', 'password'=>'a' , 'firstname'=>'a', 'lastname'=>'a'), 
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
'$FirstName' => $arrayDB[$nomUtilisateur3]['firstname'],
'$Username' => $arrayDB[$nomUtilisateur3]['username']
	
  );

  
$content = strtr($html, $content_replace );
	
	
	return $content;
	
	}
			
?>