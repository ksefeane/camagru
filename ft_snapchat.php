<?php
session_start();
?>

<?php
if (isset($_SESSION['usertoken'])) {
	//echo "logged in";
	if (isset($_POST['logout'])) {
		header('location: logout.php');
	}
} else {echo "not logged in";}
?>

<html>
<head>
		<link rel="stylesheet" type="text/css" href="css/header.css">
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<link rel="stylesheet" type="text/css" href="css/snap.css">
</head>
<body>
		<div class="nav-bar">
			<div id="logo">
				<a href="http://localhost/camagru/feed.php?u=<?php $_SESSION['username'] ?>"><h1>C</h1></a>
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

			<div id="cambox">
				<video id="video" autoplay></video><br/>
			</div>
			<div id="cambox">
				<img id="friday" src="img/stickers/blackfriday.png" style="height:100; width:100; background-color: silver">
			</div>
			<div id="cambox">
				<canvas id="edit" width="500" height="500"></canvas>
			</div></p>
			
			<button id="snap" class="red-button">capture</button>
			<button id="open" class="red-button">open</button>
			<button id="save" class="red-button">save</button>
			<button id="apply" class="red-button">apply</button>

		<script src="js/snap.js"></script>
</body>
</html>

