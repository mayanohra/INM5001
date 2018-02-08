<?php
/*
Citywars Inc.
Page index.php
*/

////Default Vars////
	$Root_Var = getcwd().'/'; //current working directory
	require_once($Root_Var.'assets/php/fonctions.php');// rendre fonction.php utilisable dans index.php
	spl_autoload_register('loadClass'); // dans fonction.php fonction loadclass existe importantion automatique 
	set_error_handler('handleError'); // exception 
	session_start(); // var par utilisateur pour sa session. $_SESSION ['dasdas']}
	
	$requestString = 'accueil';
////Default Vars////
	
	if(isset($_GET['page']) && !empty($_GET['page'])){ // tout ce quil y a apres point dinterrogation dans url ; et separateur
		$requestString = $_GET['page'];
	}
	
	$Object_Main = new Main($requestString); //passe nom de la page en argument dans main
	echo $Object_Main->parseRequest(); ///ss

?>