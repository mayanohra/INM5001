<?php
$keyword = $_POST['keyword'];

if($keyword != null){

	$db = mysqli_connect("gator3214.hostgator.com", "inm5001", "cours5001") or die(mysql_error());
		mysqli_select_db($db, "inm5001_users") or die(mysql_error());

	$query = mysqli_query($db, "SELECT * FROM annonces WHERE Service='$keyword'");


}else{
	header("location: recherche.php");
}
