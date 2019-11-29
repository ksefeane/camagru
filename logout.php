<?php
session_start();
?>

<?php
include 'classes/DB.php';

if (isset($_SESSION['usertoken'])) {
	DB::query('DELETE FROM tokens WHERE token=:token', array(':token'=>sha1($_SESSION['usertoken'])));
	session_unset();
	session_destroy();
	echo "logged out successfully";
	header('location: login.php');
} else {header('location: login.php');}
?>
