<?php
session_start();
?>

<?php
if (isset($_SESSION['usertoken'])) {
	echo "logged in";
	if (isset($_POST['logout'])) {
		header('location: logout.php');
	}
} else {echo "not logged in";}
?>
