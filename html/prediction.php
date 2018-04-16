<?php
	require("config.php");

	//$image_file = $_GET['image_file'];
	$content = exec("python ../bin/predictBreed.py");
	$predictions = explode(" ",$content);

	$data = [];

	foreach($predictions as $pred){
		$query = "SELECT * FROM dog_breeds
				WHERE breed_id = {$pred}";
		
		$result = $SP_db->query($query)->fetch_assoc();
		$data[] = $result;
	}

	foreach($data as $d){
		foreach($d as $cell){
			echo $cell." | " ;
		}
		echo "<br/>";
	}
?>