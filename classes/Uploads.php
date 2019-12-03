<?php
require_once 'classes/DB.php';

class Post {
	public static function imageUpload($file) {
		$dir = "media/";
		$f_name = basename($file['name']);
		$tmp_name = $file['tmp_name'];
		$img_type = strtolower(pathinfo($dir.$f_name, PATHINFO_EXTENSION));
		$img_size = $file['size'];
		$customs = getimagesize($tmp_name);
		$error = $file['error'];
		$uploadOK = 1;
		echo "type ".$img_type."<br/>";
		echo "size ".$img_size."<br/>";
		echo "error ".$error."<br/>";
		print_r($file);
		//check error equal 0
		if ($error !== 0) {
			echo "image error<br/>";
			$uploadOK = 0;
		}
		//check if actual image or fake
		if ($customs !== false) {
			echo "image file <br />";
		} else {
			echo "not image file<br/>";
			$uploadOK = 0;
		}
		//check if already exists
		if (file_exists($dir.$f_name)) {
			echo "file already exists <br/>";
			$upload = 0;
		}
		//check file size
		if ($img_size > 500000) {
			echo "file size too big<br/>";
			$uploadOK = 0;
		}
		//allow certain file formats
		if ($img_type != "jpg" && $img_type != "jpeg" && $img_type != "png" && $img_type != "gif") {
			echo "unacceptable image type<br/>";
			$uploadOK = 0;
		}
		//check if uploadOK 0 by error
		if ($uploadOK == 0) {
			echo "failed to upload. uploadOK = 0 <br/>";
			return false;
		} else if (move_uploaded_file($tmp_name, $dir.$f_name)) {
			echo "file uploaded to $dir.$f_name <br/>";
			return true;
		} else {
			echo "something went wrong<br/>";
			return false;
		}
		//upload file
	}
}
?>
