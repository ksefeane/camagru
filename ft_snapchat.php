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
			
		<div id="cambox" style="float:left">
				<img id="purge" src="img/mask_purge.jpg" class="camcircle" style="margin: 10px "/>
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
					<button id="refresh" class="red-button">reset</button>
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

			<div id="popup" 
			style="
width: 200;
height: 400;
display: block;
position: fixed;
margin: 50 658;
z-index: 10;
background-color: inherit;
border-radius: 20px;
">
<div id="filter" style="background-color: inherit; height: 140px">
<img src="temp/temp1.png" class="sticker" style="margin: 25 50"/>
</div>
<div id="filter" style="background-color: inherit; height: 140px">
<img src="temp/temp2.png" class="sticker" style="margin: 25 50"/>
</div>
<div id="filter" style="background-color: inherit; height: 140px">
<img src="temp/temp3.png" class="sticker" style="margin: 25 50"/>
</div>
			</div>
			<div id="cambox" style="float: right">
				<img src="img/instagram.png" id="hand" class="camcircle" style="border-radius: 100px"/>
				<canvas id="edit" width="500" height="500"></canvas>
				<canvas id="copy" width="500" height="500" style="display:none"></canvas>
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
			
<footer class="nav-bar" style="bottom: 0; position: absolute; height: 80px">
<div class="punch-hole">
	<a href="http://localhost/camagru/ft_snapchat.php"><p>k</p></a>
</div>
</footer>

		<script src="js/snap.js"></script>
</body>
</html>

<?php
if (isset($_SESSION['usertoken'])) {
	echo "logged in";
	if (isset($_POST['logout'])) {
		//header('location: logout.php');
		require 'logout.php';
	}
	if (isset($_POST['upload'])) {
		require_once 'classes/Uploads.php';
		$file = $_FILES['the_file'];
		if (Post::imageUpload($file)) {
			echo "success";
		} else {echo "failure";}
	}
	if (!file_exists("temp/temp1.png")) {
		echo "<script> document.getElementById('popup').style.display = \"none\"; </script>";} else {echo "<script> document.getElementById('popup').style.display = \"block\"; </script>";}
} else {header('location: login.php');}
?>

