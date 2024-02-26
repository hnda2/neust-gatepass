<?php
//session_start();
	$conn = new mysqli('localhost', 'root', '', 'VGMS_DB');

	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}
	
?>