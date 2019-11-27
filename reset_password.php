<?php
require_once 'classes/DB.php';

if (isset($_POST['reset'])) {
	$r = $_POST['r'];
	$u = $_POST['u'];
	if ($email = DB::query('SELECT email FROM users WHERE username=:username', array('username'=>$u))[0]['email']) {
		echo "email found <br/>";
		if ($vkey = DB::query('SELECT vkey FROM users WHERE email=:email', array('email'=>$email))[0]['vkey']) {
			echo "vkey found <br/>";
			if ($r = sha1($email.$vkey)) {
				echo "reset match <br/>";
				$newpass = $_POST['newpass'];
				$passhash = password_hash($newpass, PASSWORD_BCRYPT);
				DB::query('UPDATE users SET password=:password WHERE email=:email', array('password'=>$passhash, 'email'=>$email));
				echo "password updated<br/>";
				echo "<a href=\"http://localhost/camagru/login.php\"> login </a>";
			} else {echo "woopsie. reset not found";}
		} else {echo "woopsie. verification error";}
	} else {echo "woopsie. email address not found";}
} else {echo "please type new password and click reset";}
?>

<html>
	<form action="<?php echo "reset_password.php?u=".$_GET['u']."&r=".$_GET['r']; ?>" method="POST">
		<input type="hidden" name="u" value="<?php echo $_GET['u']; ?>"/>
		<input type="hidden" name="r" value="<?php echo $_GET['r']; ?>"/>
		<input type="password" name="newpass" placeholder="new password" required/></p>
		<input type="submit" name="reset" value="reset"/>
	</form>
</html>
