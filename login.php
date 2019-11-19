<?php
	require 'classes/DB.php';

	if (isset($_POST['login'])){
		$username = $_POST['username'];
		$password = $_POST['password'];

		if (DB::query('SELECT username FROM users WHERE username=:username', array(':username'=>$username))){
			if (password_verify($password, DB::query('SELECT password FROM users WHERE username=:username', array('username'=>$username))[0]['password'])) {
				echo "login successfully<br />";
				$user_id = DB::query('SELECT id FROM users WHERE username=:username', array('username'=>$username))[0]['id'];
				$strong = True;
				$token = bin2hex(openssl_random_pseudo_bytes(64, $strong));
				DB::query('INSERT INTO tokens (user_id, token) VALUES (:user_id, :token)', array(':user_id'=>$user_id, ':token'=>sha1($token)));
				setcookie("CID", $token, time() + 60 * 60 * 24, '/', NULL, NULL, TRUE);
			}
			else {echo "incorrect password";}
		}
		else {echo $username." not registered";}
	}
?>
<html>
<head>
	<title>camagru - login</title>
<!--	<meta http-equiv="refresh" content="2"> -->
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="lrg-card">
		<div id="login-card">
			<form action="login.php" method="POST">
				<h1>camagru</h1>
				<p><input type="text" name="username" placeholder="username" /></p>
				<p><input type="password" name="password" placeholder="password" /></p>
				<input id="login-button" type="submit" name="login" value="submit"/></p>
			</form>
			<a href="forgot_password.php">forgot password?</a></p>
			<a href="create_account.php">new member?</a></p>
		</div>
		<img id="login-pic" src="img/camera_tikki"/>	
	</div>
</body>
</html>
