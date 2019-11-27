<?php
require_once 'classes/DB.php';

if (isset($_GET['vkey'])) {
	$v = $_GET['vkey'];
	if (DB::query('SELECT vkey FROM users WHERE vkey=:vkey AND verified=\'F\'', array('vkey'=>$v))) {
		DB::query('UPDATE users SET verified=\'T\' WHERE vkey=:vkey', array('vkey'=>$v));
		header('location: login.php');
	} else {echo "user already verified godammit :)";}
} else {echo "please click on the link sent to your email to verify your account";}
?>
