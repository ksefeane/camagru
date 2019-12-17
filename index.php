<?php
include 'classes/Logs.php';

if (Logs::isLoggedIn()) {
	header('Refresh: 5; url=feed.php');
} else {
	header('location: login.php');
}

?>
