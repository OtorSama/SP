<?php
	require("config.php");

	$id = $_GET["id"];

	$query = "SELECT * FROM dog_breeds
			WHERE breed_id = {$id}";

	$data = $SP_db->query($query)->fetch_assoc();

	echo json_encode($data);
?>