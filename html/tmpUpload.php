
<!DOCTYPE html>
<html>
<head>
	<title>Temporary Upload</title>
</head>
<body>
	<?php
		$fileName = $_FILES['imgFile']['name'];
		$fileTemp = $_FILES['imgFile']['tmp_name'];
		$folder = "../images/temp/";
		$dest = $folder.$fileName;

		move_uploaded_file($fileTemp, $dest);
	?>
	<form action="index.php" id="upImg" method="post">
		<input type="text" id="imgName" name="imgName" value="<?php echo $dest ?>" hidden />
	</form>

		<script type="text/javascript">
			var form = document.getElementById("upImg");
			form.submit();
		</script>
</body>
</html>