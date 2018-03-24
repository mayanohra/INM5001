<?php

define("HOSTDB", "gator3214.hostgator.com");
define("USERNAMEDB", "inm5001");
define("PASSDB", "cours5001");
define("DB", "inm5001_users");

$db = mysqli_connect(HOSTDB, USERNAMEDB, PASSDB) or die(mysql_error());
	mysqli_select_db($db, DB) or die(mysql_error());

$findUser = mysqli_query($db, "SELECT * FROM resultSearch");
$row = mysqli_fetch_array($findUser); 

echo json_encode($row);