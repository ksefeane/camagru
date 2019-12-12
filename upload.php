<?php
//require_once 'classes/Uploads.php';

//if (isset($_POST['upload'])) {
//	$file = $_FILES['the_file'];
//	if (Post::imageUpload($file)) {
//		header('location: ft_snapchat.php');
//	} else {echo "failure";}
if (isset($_POST['key'])){
	if (isset($_SESSION['usertoken'])) {
		$user = $_SESSION['username'];
	} else {
		$user = "example".time();
	}
	$raw = $_POST['key'];
	$raw = str_replace('data:image/png;base64,','', $raw);
	$raw = str_replace(' ', '+', $raw);
	$pic = base64_decode($raw);
	file_put_contents("uploads/$user.png", $pic);
} else {echo "error";}
?>
