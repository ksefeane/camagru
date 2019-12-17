<?php
require_once 'classes/DB.php';

class Logs {
	public static function isLoggedIn() {
		if (isset($_SESSION['usertoken'])) {
			echo "logged in session<br/>";
			return true;
		} else if (isset($_COOKIE['SID'])) {
			$token = DB::query('SELECT token FROM tokens WHERE token=:token', array(':token'=>sha1($_COOKIE['SID'])));
			$token = $token[0]['token'];
			$_SESSION['usertoken'] = $token;
			echo "logged in database ".$token;
			return true;
		} else {echo "not logged in<br />"; return false;}
	}

	public static function logout() {
		if (self::isLoggedIn()) {
			DB::query('DELETE FROM tokens WHERE token=:token', array(':token'=>sha1($_COOKIE['SID'])));
			setcookie("SID", $_SESSION['usertoken'], time() - 3600);
			session_unset();
			session_destroy();
			header('Refresh:5; url=index.php');
		} else {header('location: index.php');}
	}
}
?>
