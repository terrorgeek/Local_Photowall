<?php @session_start();
$fn = (isset($_SERVER['HTTP_X_FILENAME']) ? $_SERVER['HTTP_X_FILENAME'] : false);
$fn=iconv("UTF-8","gb2312",$fn);
if ($fn) {

	// AJAX call
	file_put_contents(
		'../Project_Images/photos/' . $fn,
		file_get_contents('php://input')
	);
	echo "$fn uploaded";
	exit();

}
else {

	// form submit
	$files = $_FILES['selectImgToAlbum'];

	foreach ($files['error'] as $id => $err) {
		if ($err == UPLOAD_ERR_OK) {
			$fn = iconv("UTF-8","gb2312",$files['name'][$id]);
			move_uploaded_file(
				$files['tmp_name'][$id],
				'../Project_Images/photos/' . $fn
			);
			echo "<p>File $fn uploaded.</p>";
		}
	}

}
?>