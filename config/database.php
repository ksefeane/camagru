<?php
	define('DSN', 'mysql:host=localhost;dbname=camagru_db;');
	define('DB_USER', 'root');
	define('DB_PASS', 'qamagru');
	define('DB_NAME', 'camagru_db');
	define('DB_HOST', 'localhost');

	$user = DB_USER;
	$pass = DB_PASS;
	try {
		$conn = new PDO("mysql:host=localhost", $user, $pass);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	} catch (PDOException $e) {
		echo $e->getMessage();
	}
?>
