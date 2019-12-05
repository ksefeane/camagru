<?php
class Database {
	public static $host = "localhost";
	public static $dbname = "camagru_db";
	public static $username = "root";
	public static $password = "qamagru";

	private static function connect() {
		$conn = new PDO("mysql:host=".self::$host.";dbname=".self::$dbname.";charset=utf8", self::$username, self::$password);
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
