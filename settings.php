<?php
session_start();
?>

<html>
<head>
		<link rel="stylesheet" type="text/css" href="css/header.css">
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<link rel="stylesheet" type="text/css" href="css/filter.css">
		<link rel="stylesheet" type="text/css" href="css/feed.css">
</head>
<body>
		<div class="nav-bar">
			<div id="logo">
				<a href="http://localhost/camagru/feed.php"><h1>C</h1></a>
			</div>
			<div class="punch-hole">
				<a href="http://localhost/camagru/logout.php"><p>O</p></a>
			</div>
			<div class="punch-hole">
				<a href="http://localhost/camagru/settings.php"><p>S</p></a>
			</div>
			<div class="punch-hole">
				<a href="http://localhost/camagru/profile.php"><p>P</p></a>
			</div>
			<div class="punch-hole" id="camera">
				<a href="http://localhost/camagru/ft_snapchat.php"><p>ft</p></a>
			</div>
		</div>
		
		<form action="settings.php" method="POST">
			<input type="text" name="username" placeholder="new username"/>  
			<input type="password" name="pass" placeholder="password"/>  
			<input type="submit" name="upname" value="update" id="login-button"/>
		</form>
		<form action="settings.php" method="POST">
			<input type="email" name="email" placeholder="new email"/>  
			<input type="password" name="pass" placeholder="password"/>  
			<input type="submit" name="upmail" value="update" id="login-button"/>
		</form>
		<form action="settings.php" method="POST">
			<input type="password" name="password" placeholder="new password"/>  
			<input type="password" name="pass" placeholder="password"/>  
			<input type="submit" name="uppass" value="update" id="login-button"/>
		</form>

		enable notifications?
		<form action="settings.php" method="POST">
			<input type="radio" name="notification" value="yes"/> yes</p>
			<input type="radio" name="notification" value="no"/>  no</p>
			<input type="password" name="pass" placeholder="password"/>  
			<input type="submit" name="upnoti" value="update" id="login-button"/>
		</form>
</body>
</html>

<?php
require_once 'classes/DB.php';
if (isset($_SESSION['usertoken'])) {
	$q = DB::query('SELECT * FROM users WHERE username=:username', array(':username'=>$_SESSION['username']));
	$username = $q[0][1];
	$email = $q[0][2];
	$password = $q[0][3];
	$notif = $q[0][8];

	echo "username -> ".$username."<br/>";
	echo "email -> ".$email."<br/>";
	echo "password -> ".$password."<br/>";
	echo "notifications -> ".$notif."<br/>";
	
	if (isset($_POST['upname'])) {
		$newname = $_POST['username'];
		$pass = $_POST['pass'];
		if (password_verify($pass, $password)) {
			DB::query('UPDATE users SET username=:newname WHERE username=:username', array(':username'=>$username, ':newname'=>$newname));
			$_SESSION['username'] = $newname;
			header('location: settings.php');
		} else {echo "please enter your current password";}
	}
	if (isset($_POST['upmail'])) {
		$newmail = $_POST['email'];
		$pass = $_POST['pass'];
		if (password_verify($pass, $password)) {
			DB::query('UPDATE users SET email=:newmail WHERE email=:email', array(':email'=>$email, ':newmail'=>$newmail));
			header('location: settings.php');
		} else {echo "please enter your current password";}
	}
	if (isset($_POST['uppass'])) {
		$newpass = $_POST['password'];
		$pass = $_POST['pass'];
		if (password_verify($pass, $password)) {
			DB::query('UPDATE users SET password=:newpass WHERE username=:username', array(':username'=>$username, ':newpass'=>password_hash($newpass, PASSWORD_BCRYPT)));
		header('location: settings.php');
		} else {echo "please enter your current password";}
	}
	if (isset($_POST['upnoti'])) {
		$newnoti = $_POST['notification'];
		$pass = $_POST['pass'];
		if (password_verify($pass, $password)) {
			if ($newnoti == "yes") {
			DB::query('UPDATE users SET notification=\'T\' WHERE username=:username', array('username'=>$username));
			} else if ($newnoti == "no") {
		DB::query('UPDATE users SET notification=\'F\' WHERE username=:username', array(':username'=>$username));
			}
			header('location: settings.php');
		}else {echo "please enter your current password";}
	}
} else {header('location: login.php');}
?>

