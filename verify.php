<?php
require_once 'classes/DB.php';

if (isset($_GET['vkey'])) {
	$v = $_GET['vkey'];
	if ($v == DB::query('SELECT vkey FROM users WHERE vkey=:vkey', array('vkey'=>$v))[0]['vkey']) {
		DB::query('UPDATE users SET verified=\'T\' WHERE vkey=:vkey', array('vkey'=>$v));
		header('location: login.php');
	} else {
		echo "vkey issue";
	}
} else {echo "please click on the link sent to your email to verify your account";}
?>
