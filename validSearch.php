<?php

$keyword = $_POST['keyword'];
$result[];

if($keyword != null){

	$db = mysqli_connect("gator3214.hostgator.com", "inm5001", "cours5001") or die(mysql_error());
	mysqli_select_db($db, "annonces") or die(mysql_error());

	while(){
		$findSearch = mysqli_query($db, "SELECT * FROM annonces WHERE Service='$keyword'");
		$row = mysqli_fetch_array($findSearch); 
	}

}else{
	header("location: recherche.php");
}