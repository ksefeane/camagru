<?php
session_start();
$n = 1;
while (file_exists("uploads/".$n.".png"))
	$n++;
$_SESSION['pic'] = --$n;
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
	
		<?php
			require_once 'classes/DB.php';
			$d = DB::query('SELECT img_src FROM images WHERE username= ?', array($_SESSION['username']));
			$new = array();
			foreach($d as $i) {
				$i[0] = str_replace('uploads/', '', $i[0]);
				array_push($new, $i[0]);
			}
			$last = count($new) - 1;
			while ($last >= 0) {
				$g = "<div id=\"maxicam\" style=\"margin-top: 15\">
				<img src=\"uploads/".$new[$last]."\"/>
				</div></p>";
				echo $g;
				$last--;
			}
		?>
		<script src="js/feed.js"></script>
</body>
</html>

<?php
if (isset($_SESSION['usertoken'])) {
	echo "logged in";
} else {header('location: login.php');}
?>

