<?php
include 'classes/DB.php';
include 'classes/Login.php';

if (Login::isLoggedIn()) {
	echo "logged in!<br />";
} else {
	header('location: create_account.php');
}

?>
