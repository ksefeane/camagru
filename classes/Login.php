<?php
require_once 'classes/DB.php';

class Login{
	public static function isLoggedIn() {
		if (isset($_COOKIE['CID'])) {
			if (DB::query('SELECT user_id FROM tokens WHERE token=:token', array('token'=>sha1($_COOKIE['CID'])))) {
				$user_id = DB::query('SELECT user_id FROM tokens WHERE token=:token', array('token'=>sha1($_COOKIE['CID'])))[0]['user_id'];
				if (isset($_COOKIE['CID_'])) {
					return $user_id;
				} else {
					$strong = True;
					$token = bin2hex(openssl_random_pseudo_bytes(64, $strong));
					DB::query('INSERT INTO tokens (user_id, token) VALUES (:user_id, :token)', array(':user_id'=>$user_id, ':token'=>sha1($token)));
					DB::query('DELETE FROM tokens WHERE token=:token', array(':token'=>sha1($_COOKIE['CID'])));
					setcookie("CID", $token, time() + 60 * 60 * 24 * 7, '/', NULL, NULL, TRUE);
					setcookie("CID_", '1', time() + 60 * 60 * 24 * 1, '/', NULL, NULL, TRUE);
					return $user_id;
				}
			}
		}
		return false;
	}
}
?>
