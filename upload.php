<?php
session_start();
if (isset($_POST['key'])){
	require_once 'classes/DB.php';


	if (isset($_SESSION['usertoken'])) {
		$username = $_SESSION['username'];
		$time = time();
		$save = "uploads/".$username.$time;
		$raw = $_POST['key'];
		$raw = str_replace('data:image/png;base64,','', $raw);
		$raw = str_replace(' ', '+', $raw);
		$pic = base64_decode($raw);
		file_put_contents("$save.png", $pic);
		DB::query('INSERT INTO images (username, img_src, img_date) VALUES (:username, :img_src, :img_date)', array(':username'=>$username, ':img_src'=>$save.".png", ':img_date'=>sha1($time)));
	} else {echo "error";}
}
?>
