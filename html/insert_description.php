<?php
	require("config.php");
	
	/*$file = fopen("descriptions.txt","r") or die("Unable to open file!");
	$content = fread($file, filesize("descriptions.txt"));
	$descriptions = explode("\n", $content);


	foreach( $descriptions as $index => $description) {
		$id = $index + 4;
		$update_query = "UPDATE dog_breeds 
					SET breed_description='{$description}'
					WHERE breed_id = '{$id}'";
		$SP_db->query($update_query);

	}*/
	$temp_description = "Lorem ipsum dolor sit amet, copiosae tincidunt at vel, eu expetenda erroribus eum. Accusata torquatos ei vim, dolore conceptam usu ad, id augue nobis qui. Impedit imperdiet in mel, pro nulla iudicabit disputando no, dicunt theophrastus interpretaris no pro. At nibh errem probatus vim, in vim soleat placerat platonem, eum no dolor mollis praesent. Ex congue accusam epicuri duo.";

	for($i = 14; $i < 120; $i++) {
		
		$update_query = "UPDATE dog_breeds
						SET breed_description = '{$temp_description}'
						WHERE breed_id = '{$i}'";
		$SP_db->query($update_query);

	}
	echo "Done."
?>