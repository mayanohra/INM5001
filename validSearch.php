<?php
define("LIST_EL", $_POST['service']);

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

		//Same month
		if($selectYear == $todayYear && $selectMonth == $todayMonth && $selectDay >= $todayDay){
			verifyRate();
		//Same year, different month
		}else if($selectYear == $todayYear && $selectMonth > $todayMonth){
			verifyRate();
		//Different year
		}else if($selectYear > $todayYear){
			verifyRate();
		}else{
			redirect();
		}
	}else{
		redirect();
	}
}

//verify if a valide rate was entered (>0)
function verifyRate(){
	$rateEl = $_POST['rate'];
	
	if($rateEl > 0){
		connectDB();
	}else{
		redirect();
	}
}


function choiceList(){
	if(strcmp(LIST_EL, "garden")){

	}else if(strcmp(LIST_EL, "moving")){

	}else if(strcmp(LIST_EL, "snow")){

	}else if(strcmp(LIST_EL, "homework")){

	}
}

//Connect to Database
function connectDB(){
	$serviceEl = $_POST['service'];
	$rateEl = $_POST['rate'];
	$dateEl = $_POST['date'];

	define("HOSTDB", "gator3214.hostgator.com");
	define("USERNAMEDB", "inm5001");
	define("PASSDB", "cours5001");
	define("DB", "inm5001_users");

	$db = mysqli_connect(HOSTDB, USERNAMEDB, PASSDB) or die(mysql_error());
		mysqli_select_db($db, DB) or die(mysql_error());

	fetchResultDB($db, $serviceEl, $rateEl, $dateEl);
}

function fetchResultDB($db, $service, $rate, $date){
	$query = mysqli_query($db, 
		"CREATE TABLE resultSearch AS (SELECT * FROM annonces WHERE Service='$service' 
			AND Rate>='$rate' AND startAvailable<='$date')"
	);
}

//Redirects with a Error 400
function redirect(){
	$userInput = json_encode($_POST);
	header("HTTP/1.0 400 entries not valid $userInput");
} 
