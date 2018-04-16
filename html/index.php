<?
	require("config.php");
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Dog Bread Classifier</title>
	</head>
	<body>
		<p>This is a sample body</p>
		<?php 
			$var1 = exec("python testpython.py hello.jpeg");
			echo $var1;

			$var2 = exec("python testpython.py world.jpeg");
			echo $var2;
		?>
	</body>
</html>