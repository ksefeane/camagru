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
<a href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/camagru/feed.php"><h1>C</h1></a>
</div>
<div class="punch-hole">
<a href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/camagru/logout.php"><p>O</p></a>
</div>
<div class="punch-hole">
<a href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/camagru/settings.php"><p>S</p></a>
</div>
<div class="punch-hole">
<a href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/camagru/profile.php"><p>P</p></a>
</div>
<div class="punch-hole" id="camera">
<a href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/camagru/ft_snapchat.php"><p>ft</p></a>
</div>
</div>

<table>d

</table>
<?php
if (isset($_SESSION['usertoken'])) {
	echo "logged in";
} else {header('location: login.php');}
?>
