<?php
require_once 'classes/DB.php';

if (isset($_POST['reset'])) {
	$username = $_POST['username'];
	if (DB::query('SELECT username FROM users WHERE username=:username', array('username'=>$username))) {
		$email = DB::query('SELECT email FROM users WHERE username=:username', array('username'=>$username))[0]['email'];
		$reset = sha1(time().$email);
		$to = $email;
		$subject = "password reset";
		$msg = "<a href=\"http://localhost/camagru/reset_password.php?reset=$reset\"> reset password </a>";
		$headers = 'From: camagru.com' . "\r\n";
		$headers .= 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
		mail($to, $subject, $msg, $headers);
		header('location: reset_password.php')
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
