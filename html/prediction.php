<?php
	require("config.php");

	$image_file = $_GET['image_file'];
	// $image_file = "placeholder.png";
	// $content = exec("/usr/bin/python ../bin/predictBreed.py");
	// $content = exec("python ../bin/predictBreed.py");

	$image_path = "/opt/lampp/htdocs/SP/images/temp/".$image_file;
	$deploy_path = "../../../../../home/user/Downloads/code/sp/deployPredict.py";
	$content = exec("/usr/bin/python ".$deploy_path." ".$image_path);

	$predictions = explode(" ",$content);
	$data = [];

	foreach($predictions as $pred){
		$query = "SELECT * FROM dog_breeds
				WHERE breed_id = {$pred}";

		$result = $SP_db->query($query);
		$data[] = $result->fetch_assoc();
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
	//var_dump($data);
	echo json_encode($data);
?>
