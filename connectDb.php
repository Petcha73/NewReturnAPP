<?php
	//*****connect to database********connect to database********connect to database********connect to database********connect to database********connect to database****
	
	include 'config.php';
	
	// Create connection
	$mysqli = new mysqli($servername, $username, $password, $db);
	
	
	// Check connection
	if ($mysqli->connect_errno) {
		printf("Connect failed: %s\n", $mysqli->connect_error);
		exit();
	}
	
?>