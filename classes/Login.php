<?php
require_once 'classes/DB.php';

class Login{
	public static function isLoggedIn() {
		if (isset($_COOKIE['CID'])) {
			if (DB::query('SELECT user_id FROM tokens WHERE token=:token', array('token'=>sha1($_COOKIE['CID'])))) {
				$user_id = DB::query('SELECT user_id FROM tokens WHERE token=:token', array('token'=>sha1($_COOKIE['CID'])))[0]['user_id'];
				return $user_id;
			}
		}
		return false;
	}
}
?>
