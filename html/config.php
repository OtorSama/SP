<?php
	$SP_db = new MySQLi("localhost", "root", "", "SP_db");

	// Check connection
	if (mysqli_connect_errno()) {
		echo "Failed to connect to MySQL: ".mysqli_connect_error();
	}
?>