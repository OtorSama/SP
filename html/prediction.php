<?php
	require("config.php");

	$image_file = $_GET['image_file'];
	$content = exec("python ../bin/predictBreed.py ".$image_file);
	$predictions = explode(" ",$content);

	$data = [];

	foreach($predictions as $pred){
		$query = "SELECT * FROM dog_breeds
				WHERE breed_id = {$pred}";
		
		$result = $SP_db->query($query)->fetch_assoc();
		$data[] = $result;
	}
/*
	echo "<table border = '1'>";
	foreach($data as $d){
		echo"<tr>";
		foreach($d as $cell){
			echo "<td>".$cell."</td>" ;
		}
		echo "</tr>";
	}
	echo "</table>";
*/
	echo json_encode($data);
?>