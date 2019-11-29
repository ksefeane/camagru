<?php
session_start();
?>

<html>
<head>
		<link rel="stylesheet" type="text/css" href="css/header.css">
		<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
		<div class="nav-bar">
			<div id="logo">
				<a href="http://localhost/camagru/feed.php?u=<?php echo $_SESSION['username'] ?>"><h1>C</h1></a>
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
				<a href="http://localhost/camagru/ft_snapchat.php?u=<?php echo $_SESSION['username'] ?>"><p>ft</p></a>
			</div>

		</div>
</body>
</html>

<?php
require_once 'classes/DB.php';

if (isset($_SESSION['usertoken'])) {
	echo "logged in<br/>";
	if (isset($_POST['logout'])) {
		header('location: logout.php');
	}
} else if (($token = DB::query('SELECT token FROM tokens WHERE token=:token', array(':token'=>sha1($_COOKIE['SID']))))) {
	echo "logged in database";
	$_SESSION['usertoken'] = $token;
} else {echo "not logged in";}
?>
