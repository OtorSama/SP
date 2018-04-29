<?php
	$fileName = $_FILES['imgFile']['name'];
	$fileTemp = $_FILES['imgFile']['tmp_name'];
	$folder = "../images/temp/";
	$dest = $folder.$fileName;

	move_uploaded_file($fileTemp, $dest);
	
	echo $dest;
?>