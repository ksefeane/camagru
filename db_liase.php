<?php
	require_once 'config/connect.php';

	function insert_t($conn, $username, $email, $pass){
		$sq = $conn->prepare("INSERT INTO camagru_db.users (`username`, `email`, `password`) VALUES (:name, :email, :password)");
		$sq->bindParam(':name', $username);
		$sq->bindParam(':email', $email);
		$sq->bindParam(':password', $pass);
		$sq->execute();
		echo "user inserted into table";
	}
	function delete_t($conn, $username){
		$sq = $conn->prepare("DELETE FROM camagru_db.users WHERE username=:username");
		$sq->bindParam(':username', $username);
		$sq->execute();
		echo "user deleted from table";
	}
	function update_t($conn, $username, $email){
		$sq = $conn->prepare("UPDATE camagru_db.users SET email=:email WHERE username=:username");
		$sq->bindParam(':username', $username);
		$sq->bindParam(':email', $email);
		$sq->execute();
		echo $username." updated";
	}
	function select_t($conn, $username){
		$sq = $conn->prepare("SELECT email FROM camagru_db.users WHERE username=:username");
		$sq->bindParam(':username', $username);
		$sq->execute();
		$data = $sq->fetch();
		return ($data);
	}
?>
