<?php 
	echo "<pre>";
	var_dump($_POST);

	// - if file exists, process image
	// - POSSIBLE ERROR VALUES: https://www.php.net/manual/en/features.file-upload.errors.php
	if (isset($_FILES["user_image"])) {
		var_dump($_FILES["user_image"]["name"]);
		var_dump($_FILES["user_image"]["type"]);
		var_dump($_FILES["user_image"]["tmp_name"]);
		var_dump($_FILES["user_image"]["error"]);
		var_dump($_FILES["user_image"]["size"]);
		
		// - move file to the assets folder.
		move_uploaded_file(
			$_FILES["user_image"]["tmp_name"], 
			_DIR_."assets/" . time() . ".jpg"
		);
	}
	echo "</pre>";
	echo "<hr>";
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<!--
	1. are you using post?
	2. did you set enctype?
	3. did you set name for input?
	-->
	<form method="POST" enctype="multipart/form-data">
		<input type="file" name="user_image">
		<input type="submit" name="btn_upload_image" value="UPLOAD IMAGE">
	</form>
</body>
</html>