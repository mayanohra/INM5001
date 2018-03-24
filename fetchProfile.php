<?php
define("HOSTDB", "gator3214.hostgator.com");
define("USERNAMEDB", "inm5001");
define("PASSDB", "cours5001");
define("DB", "inm5001_users");
$username = $_GET['username'];

$db = mysqli_connect(HOSTDB, USERNAMEDB, PASSDB) or die(mysql_error());
	mysqli_select_db($db, DB) or die(mysql_error());

$user = mysqli_query($db, "SELECT * FROM users WHERE Username ='$username'");
$result = mysqli_fetch_array($user); 

echo json_encode($result);

