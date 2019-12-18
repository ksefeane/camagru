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
			<input type="submit" name="upname" value="update" id="login-button"/>
		</form>
		<form action="settings.php" method="POST">
			<input type="email" name="email" placeholder="new email"/>  
			<input type="submit" name="upmail" value="update" id="login-button"/>
		</form>
		<form action="settings.php" method="POST">
			<input type="password" name="password" placeholder="new password"/>  
			<input type="submit" name="uppass" value="update" id="login-button"/>
		</form>

		enable notifications?
		<form action="settings.php" method="POST">
			<input type="radio" name="notification" value="yes"/> yes</p>
			<input type="radio" name="notification" value="no"/>  no</p>
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

	echo "username -> ".$username."<br/>";
	echo "email -> ".$email."<br/>";
	echo "password -> ".$password."<br/>";
	echo "notifications -> "."Yes"."<br/>";
	
	if (isset($_POST['upname'])) {
		$newname = $_POST['username'];
		DB::query('UPDATE users SET username=:newname WHERE username=:username', array(':username'=>$username, ':newname'=>$newname));
		$_SESSION['username'] = $newname;
		header('Refresh:3; url=settings.php');
	}
	if (isset($_POST['upmail'])) { echo "email things"; }
	if (isset($_POST['uppass'])) { echo "password things"; }
	if (isset($_POST['upnoti'])) { echo "notification radio box things"; }
} else {header('location: login.php');}
?>

