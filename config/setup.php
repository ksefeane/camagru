<?php
require 'connect.php';

$db = DB_NAME;
delete_db($db, $conn);
create_db($db, $conn);
create_t_users("users", $db, $conn);
create_t_tokens("tokens", $db, $conn);
create_t_images("images", $db, $conn);
//create_t_likes("likes", $db, $conn);
//create_t_comments("comments", $db, $conn);
function create_db($db_name, $conn){
	$sql = "CREATE DATABASE IF NOT EXISTS ".$db_name;
	$conn->exec($sql);
	echo $db_name." created successfully <br />\n";
}
function delete_db($db_name, $conn){
	$sql = "DROP DATABASE IF EXISTS ".$db_name;
	$conn->exec($sql);
	echo $db_name." deleted successfully <br />\n";
}
function create_t_users($t_name, $db_name, $conn){
	$sql = "CREATE TABLE IF NOT EXISTS $db_name.$t_name (
		id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
		username VARCHAR (255) NOT NULL UNIQUE,
		email VARCHAR (255) NOT NULL UNIQUE,
		password VARCHAR (255) NOT NULL,
		date_created TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
		vkey VARCHAR (255) NOT NULL,
		verified ENUM('T','F') NOT NULL DEFAULT 'F',
		admin ENUM('T','F') NOT NULL DEFAULT 'F'
		)";
	$conn->exec($sql);
	echo $t_name." table created successfully..<br />";
}
function create_t_tokens($t_name, $db_name, $conn) {
	$sql = "CREATE TABLE IF NOT EXISTS $db_name.$t_name (
		id INT UNSIGNED NOT NULL AUTO_INCREMENT,
		user_id INT NOT NULL REFERENCES users(id),
		username VARCHAR (255) NOT NULL REFERENCES users(username),
		token VARCHAR (64) NOT NULL UNIQUE,
		PRIMARY KEY (`id`),
		UNIQUE (token)
		)";
	$conn->exec($sql);
echo $t_name." table created successfully..<br />";
}
function create_t_images($t_name, $db_name, $conn) {
	$sql = "CREATE TABLE IF NOT EXISTS $db_name.$t_name (
		id INT UNSIGNED NOT NULL AUTO_INCREMENT,
		user_id INT NOT NULL REFERENCES users(id),
		username VARCHAR (255) NOT NULL REFERENCES users(username),
		img_src VARCHAR (255) NOT NULL UNIQUE,
		date_created TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
		PRIMARY KEY (`id`)
		)";
	$conn->exec($sql);
	echo $t_name. " table created successfully..<br/>";
}
function delete_t_user($t_name, $db_name, $conn){
	$sql = "DROP TABLE IF EXISTS $db_name.$t_name";
	$conn->exec($sql);
	echo $t_name." table deleted successfully";
}
?>
