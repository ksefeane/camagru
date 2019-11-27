<?php
include 'classes/DB.php';
include 'classes/Login.php';

if (!Login::isLoggedIn()) {
	die('not logged in');
}
if (isset($_POST['logout'])) {
		if (isset($_POST['alldevices'])) {
			DB::query('DELETE FROM tokens WHERE user_id=:user_id', array(':user_id'=>Login::isLoggedIn()));
		} else if (isset($_COOKIE['CID'])) {
				DB::query('DELETE FROM tokens WHERE token=:token', array(':token'=>sha1($_COOKIE['CID'])));
				setcookie('CID', '1', time() - 3600);
				setcookie('CID_', '1', time() - 3600);
				echo "logged out successfully";
			} else {echo "error loging out all devices";}
}
?>
<h2>Would you like to log out?</h2>
<form action="logout.php" method="POST">
	<input type="checkbox" name="alldevices" value="alldevices"> Logout all devices? <br />
	<input type="submit" name="logout" value="yes">
</form>
