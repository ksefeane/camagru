<?php
session_start();
?>

<?php
include 'classes/DB.php';

if (isset($_SESSION['usertoken'])) {
	header('location: feed.php');
} else if (isset($_POST['login'])) {
	$username = strip_tags($_POST['username']);
	$password = strip_tags($_POST['password']);
	if (DB::query('SELECT username FROM users WHERE username=:username AND verified=\'T\'', array(':username'=>$username))) {
		$dbpass = DB::query('SELECT password FROM users WHERE username=:username', array('username'=>$username))[0]['password'];
		if (password_verify($password, $dbpass)) {
			$strong = "True";
			$user_id = DB::query('SELECT id FROM users WHERE username=:username', array('username'=>$username))[0]['id'];
			$token = bin2hex(openssl_random_pseudo_bytes(64, $strong));
			DB::query('INSERT INTO tokens (user_id, username, token) VALUES (:user_id, :username, :token)', array(':user_id'=>$user_id, ':username'=>$username, ':token'=>sha1($token)));
			$_SESSION['usertoken'] = $token;
			$_SESSION['username'] = $username;
			setcookie("SID", $_SESSION['usertoken'], time() + 60 * 60 * 24 * 1);
			echo "login successful";
			header('location: feed.php');
		} else {echo "password incorrect";}
	} else {echo "user not found";}
} else {echo "logged out";}
?>

<html>
<head>
	<title>camagru - login</title>
<!--	<meta http-equiv="refresh" content="2"> -->
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<div class="lrg-card">
		<div id="login-card">
			<form action="login.php" method="POST">
				<h1>camagru</h1>
				<p><input type="text" name="username" placeholder="username" required/></p>
				<p><input type="password" name="password" placeholder="password" required/></p>
				<input id="login-button" type="submit" name="login" value="submit"/></p>
			</form>
			<a href="forgot_password.php">forgot password?</a></p>
			<a href="create_account.php">new member?</a></p>
			<a href="gallery.php">gallery</a></p>
		</div>
		<img id="login-pic" src="img/cameramen2.gif"/>	
	</div>
</body>
</html>


