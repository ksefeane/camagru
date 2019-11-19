<?php
	require "config/database.php";

class DB {
	private static function connect() {
		$dsn = DSN;
		$user = DB_USER;
		$pass = DB_PASS;
		$conn = new PDO("$dsn", "$user", "$pass");
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		return $conn;
	}
	
	public static function query($query, $params = array()) {
		$stmt = self::connect()->prepare($query);
		$stmt->execute($params);

		if (explode(' ', $query)[0] == 'SELECT'){
			$data = $stmt->fetchAll();
			return $data;
		}
	}
}
?>
