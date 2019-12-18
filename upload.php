<?php
session_start();
if (isset($_POST['key'])){
	require_once 'classes/DB.php';


	if (isset($_SESSION['usertoken'])) {
		$num = 0;
		$n = 1;
		$username = $_SESSION['username'];
		$n = piccount($username, $n);
		$time = time();
		$save = "uploads/".$n;
		$raw = $_POST['key'];
		$raw = str_replace('data:image/png;base64,','', $raw);
		$raw = str_replace(' ', '+', $raw);
		$pic = base64_decode($raw);
		file_put_contents("$save.png", $pic);
		$num = temp();
		file_put_contents("temp/temp".$num.".png", $pic);
		DB::query('INSERT INTO images (username, img_src, img_date) VALUES (:username, :img_src, :img_date)', array(':username'=>$username, ':img_src'=>$save.".png", ':img_date'=>$time));
	} else {echo "error";}
}

function piccount ($username) {
	$n = 1;
	while (file_exists("uploads/".$n.".png"))
		$n++;
	return $n;
}

function temp () {
	if (file_exists("temp/temp1.png") && !file_exists("temp/temp2.png")) {
		return 2;
	} else if (file_exists("temp/temp2.png") && !file_exists("temp/temp3.png")) {
		return 3;
	} else if (file_exists("temp/temp3.png")) {
		unlink("temp/temp1.png");
		unlink("temp/temp2.png");
		unlink("temp/temp3.png");
		return 1;
	} else {return 1;}
}
?>
