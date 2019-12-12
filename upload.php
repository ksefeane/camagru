<!--<body>
	<form action="upload.php" method="POST" enctype="multipart/form-data">
	<input type="file" name="the_file" id="the_file">
	<input type="submit" name="upload" value="upload">
	</form>
</body>
-->
<?php
//require_once 'classes/Uploads.php';

//if (isset($_POST['upload'])) {
//	$file = $_FILES['the_file'];
//	Post::imageUpload($file);
//} else {
$raw = $_POST['key'];
$raw = str_replace('data:image/png;base64,','', $raw);
$raw = str_replace(' ', '+', $raw);
$pic = base64_decode($raw);
file_put_contents("media/test.png", $pic);
?>
