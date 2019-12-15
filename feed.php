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
	
		<div id="maxicam" style="background-color: blue">
			<div id="minicam">
				<img src="uploads/<?php echo $_SESSION['username'];?>1.png"/>
					<button id="commentbutton" class="black-button">comment</button></p>
					<button id="likebutton" class="black-button" style="margin-top:340">like</button>
			</div>
			<div id="commentbox">
				<textarea name="comment" form="commentform" class="commentarea"></textarea>
				<form action="comment.php" method="POST" id="commentform">
					
					<input type="button" id="login-button" name="send" value="send" style="margin: 10 260">
				</form>
			</div>
		</div>

		
		<footer class="nav-bar" style="bottom: 0; position: absolute; height: 80px">
			<div class="punch-hole">
				<a href="http://localhost/camagru/ft_snapchat.php"><p>k</p></a>
			</div>
		</footer>

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

