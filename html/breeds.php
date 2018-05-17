<?
	require("config.php");
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Dog Breed Classifier</title>
		<?php require('config.php'); ?>
		<?php require('require.php'); ?>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
	</head>
	<body>

		<?php require('navbar.php'); ?>


		<ul class="pagination pagination">
		    <li><a href="breeds.php?page=1">1</a></li>
		    <li><a href="breeds.php?page=2">2</a></li>
		    <li><a href="breeds.php?page=3">3</a></li>
		    <li><a href="breeds.php?page=4">4</a></li>
		    <li><a href="breeds.php?page=5">5</a></li>
		    <li><a href="breeds.php?page=6">6</a></li>
		    <li><a href="breeds.php?page=7">7</a></li>
		    <li><a href="breeds.php?page=8">8</a></li>
		    <li><a href="breeds.php?page=9">9</a></li>
		    <li><a href="breeds.php?page=10">10</a></li>
		    <li><a href="breeds.php?page=11">11</a></li>
		    <li><a href="breeds.php?page=12">12</a></li>
  		</ul>
		<?php
			$page = (int)$_GET['page']*10;
			$query = "SELECT * FROM dog_breeds ORDER BY breed_name";   
			$data = $SP_db->query($query);
		?>
		<div id="panel2" class="panel col-xs-6 col-xs-offset-3 col-sm-6 col-sm-offset-3 col-md-6 col-md-offset-3 col-lg-6 col-lg-offset-3>
			<div id="predCont">
			<?php 
			$image_path = "../images/dog_breeds/";
			$counter = 1;	
			while($row = $data->fetch_assoc()){
				if ($counter <= $page && $counter >= $page - 9){
					echo "<div id='p{$row['breed_id']}' class='predicted breedList'><img id='imgbreed' src='../images/dog_breeds/".$row['breed_image']."'><span id='predName'>".$row['breed_name']."</span></div>";
				}
				$counter++;	
			}	
			?>
			</div>
		</div>
	
	</body>
</html>
