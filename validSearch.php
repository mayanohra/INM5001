<?php
$listeEL = $_POST['service'];
$dateEl = $_POST['date'];
$rateEl = $_POST['rate'];

// find today's date to compare it with the date selected
$today = new DateTime("now");
$todayDate = $today->format('Y-m-d');

$selectYear = substr($dateEl, 0, 4);
$selectMonth = substr($dateEl, 5, 2);
$selectDay = substr($dateEl, 8, 2);

$todayYear = substr($todayDate, 0, 4);
$todayMonth = substr($todayDate, 5, 2);
$todayDay = substr($todayDate, 8, 2);

if($dateEl != ""){
	if($selectYear >= $todayYear && $selectMonth >= $todayMonth 
		&& $selectDay >= $todayDay){

		verifyRate();

	}else{
		//ERREUR TODO
	}
}else{
	//ERREUR TODO
}

function choiceList(){
	if(strcmp($listeEL, "garden")){

	}else if(strcmp($listeEL, "moving")){

	}else if(strcmp($listeEl, "snow")){

	}else if(strcmp($listeEL, "homework")){

	}
}

define("HOSTDB", "gator3214.hostgator.com");
define("USERNAMEDB", "inm5001");
define("PASSDB", "cours5001");
define("DB", "inm5001_users");

function connectToDB(){
	$db = mysqli_connect(HOSTDB, USERNAMEDB, PASSDB) or die(mysql_error());
		mysqli_select_db($db, DB) or die(mysql_error());
}




// if($keyword != null){

// 	$db = mysqli_connect("gator3214.hostgator.com", "inm5001", "cours5001") or die(mysql_error());
// 		mysqli_select_db($db, "inm5001_users") or die(mysql_error());

// 	$query = mysqli_query($db, "SELECT * FROM annonces WHERE Service='$keyword'");


// }else{
// 	header("location: recherche.php");
// }
// 	