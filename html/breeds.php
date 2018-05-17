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

		<?php
			$page = (int)$_GET['page']*10;
			// $page = (int)$_GET['page']*15;
			$query = "SELECT * FROM dog_breeds ORDER BY breed_name";   
			$data = $SP_db->query($query);
		?>
		<div id="panel2" class="panel col-xs-8 col-xs-offset-2 col-sm-8 col-sm-offset-2 col-md-8 col-md-offset-2 col-lg-8 col-lg-offset-2">
			<div  class="row" style="text-align: center">
				<ul class="pagination" id="pagination-var">			    
				    <?php
				    $numRow = 120/10;

				    for($i = 1; $i <= $numRow; $i++){
				    	if($i == $_GET['page']){
				    		echo "<li class='active'><a href='breeds.php?page=".$i."'>".$i."</a></li>";
				    	}
				    	else{
				    		echo "<li><a href='breeds.php?page=".$i."'>".$i."</a></li>";
				    	}
				    }
				    ?>
				</ul>
			</div>
			<hr />
			<div id="predCont" style="padding: 1vw;">
			<?php 
			$image_path = "../images/dog_breeds/";
			$counter = 1;	
			while($row = $data->fetch_assoc()){
				if ($counter <= $page && $counter >= $page - 9){
				// if ($counter <= $page && $counter >= $page - 14){
					echo "<div id='p{$row['breed_id']}' class='predicted breedList'><img id='imgbreed' src='../images/dog_breeds/".$row['breed_image']."'><span id='predName'>".$row['breed_name']."</span></div>";
				}
				$counter++;	
			}	
			?>
			</div>
		</div>	
	</body>
</html>
