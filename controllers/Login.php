<?php
class Login extends Controller {
	public static function Log_in () {
		if (isset($_SESSION['usertoken'])) {
			header('location: ft_snapchat');
		} else if (isset($_POST['login'])) {
			$username = $_POST['username'];
			$password = $_POST['password'];
			if (DB::query('SELECT username FROM users WHERE username=:username AND verified=\'T\'', array(':username'=>$username))) {
				$dbpass = DB::query('SELECT password FROM users WHERE username=:username', array('username'=>$username))[0]['password'];
				if (password_verify($password, $dbpass)) {
					$strong = "True";
					$user_id = DB::query('SELECT id FROM users WHERE username=:username', array('username'=>$username))[0]['id'];
					$token = bin2hex(openssl_random_pseudo_bytes(64, $strong));
					DB::query('INSERT INTO tokens (user_id, token) VALUES (:user_id, :token)', array(':user_id'=>$user_id, ':token'=>sha1($token)));
					$_SESSION['usertoken'] = $token;
					$_SESSION['username'] = $username;
					setcookie("SID", $_SESSION['usertoken'], time() + 60 * 60 * 24 * 1);
					echo "login successful";
					header('location: index.php');
				} else {echo "password incorrect";}
			} else {echo "user not found";}
		} else {echo "logged out";}

	}
}
?>
