<?php
session_start();
?>

<?php
include 'classes/DB.php';

if (isset($_POST['logout'])) {
	DB::query('DELETE FROM tokens WHERE token=:token', array(':token'=>sha1($_SESSION['usertoken'])));
	session_unset();
	session_destroy();
	echo "logged out successfully";
	header('location: login.php');
} else {echo "click log out button";}
?>
<form action="logout.php" method="POST">
	<input type="submit" name="logout" value="logout">
</form>
