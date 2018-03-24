<?php
$listeEL = $_POST['service'];

verifyDate();
// find today's date to compare it with the date selected
function verifyDate(){
	$dateEl = $_POST['date'];
	if($dateEl != ""){
		//today date
		$today = new DateTime("now");
		$todayDate = $today->format('Y-m-d');

		//selected date

		$selectYear = substr($dateEl, 0, 4);
		$selectMonth = substr($dateEl, 5, 2);
		$selectDay = substr($dateEl, 8, 2);

		$todayYear = substr($todayDate, 0, 4);
		$todayMonth = substr($todayDate, 5, 2);
		$todayDay = substr($todayDate, 8, 2);

		if($selectYear >= $todayYear && $selectMonth >= $todayMonth 
			&& $selectDay >= $todayDay){

			verifyRate();

		}else{
			//ERREUR TODO
		}
	}else{
		//ERREUR TODO
	}
}

//verify if a valide rate was entered (>0)
function verifyRate(){
	$rateEl = $_POST['rate'];
	
	if($rateEl > 0){
		connectDB();
	}else{
		//TODO: ERREUR
	}
}


function choiceList(){
	if(strcmp($listeEL, "garden")){

	}else if(strcmp($listeEL, "moving")){

	}else if(strcmp($listeEl, "snow")){

	}else if(strcmp($listeEL, "homework")){

	}
}


function connectDB(){
	define("HOSTDB", "gator3214.hostgator.com");
	define("USERNAMEDB", "inm5001");
	define("PASSDB", "cours5001");
	define("DB", "inm5001_users");

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