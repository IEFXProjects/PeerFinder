<?php
	global $servername, $DBusername, $DBpassword, $DBname, $conn;
	$servername = "localhost";
	$DBusername = "cl29-vative";
	$DBpassword = "f4V-NrKV8";
	$DBname = "cl29-vative";
	
	$conn2 = new mysqli($servername, $DBusername, $DBpassword, $DBname);
	//connects to the database based on the variables defined in the first lines
	if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
	}
	else {
	}
?>