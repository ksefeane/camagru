<!--<body>
	<form action="upload.php" method="POST" enctype="multipart/form-data">
	<input type="file" name="the_file" id="the_file">
	<input type="submit" name="upload" value="upload">
	</form>
</body>
-->
<?php
require_once 'classes/Uploads.php';

if (isset($_POST['upload'])) {
	$file = $_FILES['the_file'];
	Post::imageUpload($file);
} else {
	$img = $_FILES['img'];
	echo "<img src=\"$img\"/>";
}
?>
