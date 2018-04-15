<?php
	require("config.php");
	
	$file = fopen("descriptions.txt","r") or die("Unable to open file!");
	$content = fread($file, filesize("descriptions.txt"));
	$descriptions = explode("\n", $content);


	foreach( $descriptions as $index => $description) {
		$id = $index + 4;
		$update_query = "UPDATE dog_breeds 
					SET breed_description='{$description}'
					WHERE breed_id = '{$id}'";
		$SP_db->query($update_query);

	}
	echo "Done."
?>