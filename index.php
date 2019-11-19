<?php
include 'classes/DB.php';
include 'classes/Login.php';

if (Login::isLoggedIn()) {
	echo "logged in!<br />";
} else {echo "not logged in!<br />";}

?>
