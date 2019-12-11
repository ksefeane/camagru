<?php
//	$msg = $_FILE['name']." ".$_FILE['tmp_name']." ".$_FILE['size'];
//	$msg = $_POST['key'];
$ex = $_POST['key'];
$ex = str_replace('data:image/png;base64,','',$ex);
$ex = str_replace(' ', '+', $ex);
$dec = base64_decode($ex);
echo file_put_contents("img.png", $dec);
?>
