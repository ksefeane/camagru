<?php
	require 'classes/DB.php';

	if (isset($_POST['create_account'])){
		$username = $_POST['username'];
		$password = $_POST['password'];
		$email = $_POST['email'];
		$vkey = sha1(time().$username);

		if (!DB::query('SELECT username FROM users WHERE username=:username', array(':username'=>$username))) {
			if (!DB::query('SELECT email FROM users WHERE email=:email', array(':email'=>$email))) {
				if (strlen($username) >= 3 && strlen($username) <= 32){
					if (preg_match('/[a-zA-Z0-9_]+/', $username)){
						if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
							if (strlen($password) > 3 && preg_match('/[a-z][0-9]+/', $password)) {
							DB::query('INSERT INTO users (username, email, password, vkey) VALUES (:username, :email, :password, :vkey)', array(':username'=>$username, ':email'=>$email, ':password'=>password_hash($password, PASSWORD_BCRYPT), ':vkey'=>$vkey));
							$to = $email;
							$subject = "Email Verification";
							$msg = "<a href=\"http://localhost/camagru/verify.php?vkey=$vkey\"> please click here to register account </a>";
							$headers = 'From: camagru.com' . "\r\n";
							$headers .= 'MIME-Version: 1.0' . "\r\n";
							$headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
							mail($to, $subject, $msg, $headers);
							header('location: verify.php');
							}
							else {echo "password not strong enough";}
						}
						else {echo "Invalid email";}
					}
					else {echo "Invalide username";}
				}
				else {echo "username incorrect length";}
			}
			else {echo "email already used";}
		}
		else {echo "user already exists";}
	}
?>
<html>
<head>
	<title>C - create_account</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="lrg-card">
		<div id="login-card">
			<h1>Register account</h1>
			<form action="create_account.php" method="POST">
			<input type="text" name="username" value="" placeholder="username" required><p />
			<input type="email" name="email" value="" placeholder="valid email" required><p />
			<input type="password" name="password" value="" placeholder="password" required><p />
			<input id="login-button"type="submit" name="create_account" value="submit">
			</form>
			<a href="login.php">already a member?</a>
		</div>
		<img id="login-pic" src="img/camera_tikki"/>
	</div>
</body>
</html>
