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

		<div id="worktable">
			<div id="cambox">
				<video id="video" autoplay></video><br/>
			</div>
			<div id="cambox" style="float: right;">
				<canvas id="edit" width="600" height="600"></canvas>
			</div>
		</div>

		<div id="panel">
			<button id="snap" style="margin-left: 250px;"class="red-button">capture</button>
			<button id="save" style="float: right; margin-right: 250px;"class="red-button">save</button>
		</div>

		<script type="text/javascript">
			const video = document.getElementById('video');
			const snap = document.getElementById('snap');
			const canvas = document.getElementById('edit');
			const save = document.getElementById('save');

			feed();
			
			var context = canvas.getContext('2d');
			snap.addEventListener("click", function () 
					{context.drawImage(video, 0, 0, 600, 600);});


			function feed() {
				var constraints = {video: {width: 600, height: 600 }};
				navigator.mediaDevices.getUserMedia(constraints)
					.then(stream => {video.srcObject = stream});
			}

save.addEventListener("click", function () {
		var pic = document.getElementById("edit");
		var img = pic.toDataURL("image/png");
		document.getElementById("video").innerHTML = "img";
		});
		</script>
</body>
</html>

