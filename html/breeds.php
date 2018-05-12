<?
	require("config.php");
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Dog Bread Classifier</title>
		<?php require('require.php'); ?>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
	</head>
	<body>

		<?php require('navbar.php'); ?>
		<?php
			$query = "SELECT * FROM dog_breeds ORDER BY breed_name";   
			$data = $SP_db->query($query);
		?>
		<div id="panel2" class="panel col-xs-6 col-xs-offset-3 col-sm-6 col-sm-offset-3 col-md-6 col-md-offset-3 col-lg-6 col-lg-offset-3>
			<div id="predCont">
			<?php 
			$image_path = "../images/dog_breeds/";	
			while($row = $data->fetch_assoc()){
				echo "<div id='p{$row['breed_id']}' class='predicted breedList'><img id='imgbreed' src='../images/dog_breeds/".$row['breed_image']."'><span id='predName'>".$row['breed_name']."</span></div>";	
			}	
			?>
			</div>
		</div>
	
	</body>
</html>
