<?php
	require_once 'database.php';

	$dsn = DSN; 
	$user = DB_USER;
	$pass = DB_PASS;
	$db = "dbname=".DB_NAME; 
	try{
		$conn = new PDO("$dsn", "$user", "$pass");
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		echo "connected successfully.."."<br />\n";
	} catch(PDOException $e){
		echo "failed to connect. " . $e->getMessage() . "<br />\n";
	}
?>
