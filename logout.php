<?php
include 'classes/DB.php';
include 'classes/Login.php';

if (!Login::isLoggedIn()) {
	die('not logged in');
}
if (isset($_POST['logout'])) {
	if (isset($_COOKIE['CID'])) {
		DB::query('DELETE FROM tokens WHERE token=:token', array(':token'=>sha1($_COOKIE['CID'])));
		setcookie('CID', '1', time() - 3600);
		echo "logged out successfully";
	} else {echo "error loging out";}
}
?>
<h2>Would you like to log out?</h2>
<form action="logout.php" method="POST">
	<input type="submit" name="logout" value="yes">
</form>
