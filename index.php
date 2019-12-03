<?php
include 'classes/Logs.php';

if (Logs::isLoggedIn()) {
	echo "logged in!<br />";
} else {
	header('location: login.php');
}

?>
