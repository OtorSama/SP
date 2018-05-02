<?php
	require("config.php");

	//$image_file = $_GET['image_file'];
	$image_file = "Chihuahua.jpg";
	//$content = exec("python ../bin/predictBreed.py ".$image_file); 
	$content = exec("python ../bin/testpython.py"); 
	
	//$image_path = "/opt/lampp/htdocs/SP/images/temp".$image_file;
	//$deploy_path = "/home/user/Downloads/code/sp/deployPredict.py";
	//$content = exec("python ../../../../../home/user/Downloads/code/sp/deployPredict.py /opt/lampp/htdocs/SP/images/temp/Chihuahua.jpg");
	//$content = exec("python ../../../../../home/user/Downloads/code/sp/deletelater.py");  
       	echo "this ".$content."--";
	$predictions = explode(" ",$content);
	
	$data = [];

	/*foreach($predictions as $pred){
		$query = "SELECT * FROM dog_breeds
				WHERE breed_id = {$pred}";

		$result = $SP_db->query($query);
		$data[] = $result->fetch_assoc();
	} */
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
