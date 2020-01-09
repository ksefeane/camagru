<?php
require_once 'classes/DB.php';

if (isset($_POST['reset'])) {
	$username = strip_tags($_POST['username']);
	if (DB::query('SELECT username FROM users WHERE username=:username', array('username'=>$username))) {
		$email = DB::query('SELECT email FROM users WHERE username=:username', array('username'=>$username))[0]['email'];
		$vkey = DB::query('SELECT vkey FROM users WHERE email=:email', array('email'=>$email))[0]['vkey'];
		$reset = sha1($email.$vkey);
		$to = $email;
		$host = $_SERVER['HTTP_HOST'];
		$subject = "password reset";
		$msg = "<a href=\"http://$host/camagru/reset_password.php?u=$username&r=$reset\"> reset password </a>";
		$headers = 'From: camagru.com' . "\r\n";
		$headers .= 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
		mail($to, $subject, $msg, $headers);
		echo "please click on the password reset link sent to your email";
	} else {echo "not a registered user";}
} else {echo "please enter username and click reset";}
?>

<html>
<form action="forgot_password.php" method="POST">
	<h1> reset password </h1>
	<input type="text" name="username" placeholder="username" required/></p>
	<input type="submit" name="reset" value="reset_password"/></p>
</form>
</html>
