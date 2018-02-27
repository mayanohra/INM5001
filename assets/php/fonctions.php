<?php
/*
Citywars Inc.
Page fonctions.php
*/

////Gestion D'erreurs////
	function handleError($errno, $errstr, $error_file, $error_line){
		$Error = '
			<b>Error: </b> ['.$errno.'] '.$errstr.' <br />
			<b>In</b> '.$error_file.' <b> Line : </b> '.$error_line.'
			<br />
		';
		
		die($Error);
	}
////Gestion D'erreurs////

////Chargements Des Classes////
	function loadClass($classe){
		$baseFolder = getcwd().'/assets/php/class/';
		
		if(is_file($baseFolder.$classe.'.class.php')){
			require_once $baseFolder.$classe.'.class.php';
		}
		else if(is_file($baseFolder.'api/'.$classe.'.class.php')){
			require_once $baseFolder.'api/'.$classe.'.class.php';
		}
	}
////Chargements Des Classes////


?>