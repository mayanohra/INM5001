<?php

$serviceEl = $_POST['service'];
$rateEl = $_POST['rate'];
$dateEl = $_POST['date'];

define("HOSTDB", "gator3214.hostgator.com");
define("USERNAMEDB", "inm5001");
define("PASSDB", "cours5001");
define("DB", "inm5001_users");

$db = mysqli_connect(HOSTDB, USERNAMEDB, PASSDB) or die(mysql_error());
	mysqli_select_db($db, DB) or die(mysql_error());

$query = mysqli_query($db, "SELECT * FROM resultSearch");
$result = $db->query($query);

echo $row;