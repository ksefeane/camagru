<?php
session_start();
$_SESSION['p'] = 1;
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
	
		<div id="maxicam" style="background-color: blue; display: none">
			<div id="minicam">
				<img src="uploads/<?php echo $_SESSION['username'].$_SESSION['p'];?>.png"/>
					<button id="commentbutton" class="black-button">comment</button></p>
					<button id="likebutton" class="black-button" style="margin-top:340">like</button>
			</div>
			<div id="commentbox">
				<textarea name="comment" form="commentform" class="commentarea"></textarea>
				<form action="comment.php" method="POST" id="commentform">
					<input type="button" id="login-button" name="sendcomment" value="send" style="margin: 10 260">
				</form>
			</div>
		</div>

<div id="maxicam" style="margin-top: 15">
			<img src="uploads/<?php echo $_SESSION['username'];?>1.png"/>
		</div></p>
<div id="maxicam">
			<img src="uploads/<?php echo $_SESSION['username'];?>2.png"/>
		</div></p>
<div id="maxicam">
			<img src="uploads/<?php echo $_SESSION['username'];?>3.png"/>
		</div></p>
<div id="maxicam">
			<img src="uploads/<?php echo $_SESSION['username'];?>4.png"/>
		</div></p>
<div id="maxicam">
			<img src="uploads/<?php echo $_SESSION['username'];?>5.png"/>
		</div>
		<button id="nextbutton" class="red-button" style="margin:5 46%">next</button>

		<script src="js/feed.js"></script>
</body>
</html>

<?php
if (isset($_SESSION['usertoken'])) {
	echo "logged in";
	if (isset($_POST['logout'])) {
		//header('location: logout.php');
		require 'logout.php';
	}
} else {header('location: login.php');}
?>

