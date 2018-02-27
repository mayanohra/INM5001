<?php

$keyword = $_POST['keyword'];
$result[];

if($keyword != null){

	$db = mysqli_connect("127.0.0.1", "root", "") or die(mysql_error());
	mysqli_select_db($db, "annonces") or die(mysql_error());

	while(){
		$findSearch = mysqli_query($db, "SELECT * FROM annonces WHERE service='$keyword'");
		$row = mysqli_fetch_array($findSearch); 
	}

}else{
	header("location: recherche.php");
}