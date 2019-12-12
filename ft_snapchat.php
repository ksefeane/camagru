<?php
session_start();
?>

<html>
<head>
		<link rel="stylesheet" type="text/css" href="css/header.css">
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<link rel="stylesheet" type="text/css" href="css/filter.css">
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

			<div id="cambox" style="float:left">
				<div><img id="purge"src="img/mask_purge.jpg" class="camcircle" style="margin: 10px "/></div>
				<video id="video" autoplay></video>
			</div>
			<div id="filterbox" style="float: left; margin-left: 70">
				<div id="filter">
					<button id="open" class="red-button">open</button>
				</div>
				<div id="filter">
					<button id="snap" class="red-button">capture</button>
				</div>
				<div id="filter">
					<button id="refresh" class="red-button">refresh</button>
				</div>
				<div id="filter">
					<button id="save" class="red-button">save</button>
				</div>
				<div id="filter">
					<button id="file" class="red-button">file</button>
				</div>
			</div>

			<div class="popupform" id="formkun">
				<form action="ft_snapchat.php" method="POST" enctype="multipart/form-data" class="formcontain">
					<input type="file" name="the_file" id="the_file">
					<input type="submit" name="upload" value="upload" style="margin-left: 50"class="red-button">
			</form>
			</div>


			<div id="cambox" style="float: right">
				<img src="img/instagram.png" id="hand" class="camcircle" style="border-radius: 100px"/>
				<canvas id="edit" width="500" height="500"></canvas>
			</div>
			<div id="filterbox" style="margin-right: 70">
				<div id="filter">
					<img id="friday" src="img/stickers/blackfriday.png" class="sticker"/>
				</div>
				<div id="filter">
					<img id="insta" src="img/stickers/instagram.png" class="sticker"/>
				</div>
				<div id="filter">
					<img id="twitter" src="img/stickers/twitter.png" class="sticker"/>
				</div>
				<div id="filter">
					<img id="iphone" src="img/stickers/iphone.png" class="sticker"/>
				</div>
				<div id="filter">
					<img id="tiktok" src="img/stickers/tiktok.png" class="sticker"/>
				</div>
			</div><br/>
			


		<script src="js/snap.js"></script>
</body>
</html>

<?php
if (isset($_SESSION['usertoken'])) {
	//echo "logged in";
	if (isset($_POST['logout'])) {
		header('location: logout.php');
	}
} else {echo "not logged in<br/>";}

require_once 'classes/Uploads.php';
if (isset($_POST['upload'])) {
	$file = $_FILES['the_file'];
	if (Post::imageUpload($file)) {
		echo "success";
	} else {echo "failure";}
}
?>

