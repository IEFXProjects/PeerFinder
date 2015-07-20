<?php
	$usernameoremail= $_POST[usernameoremail];
	$lpassword= $_POST[lpassword];
	
	$servername = "localhost";
	$DBusername = "cl29-mjgppg";
	$DBpassword = "f4V-NrKV7";
	$DBname = "cl29-mjgppg";
	
	
	$conn = new mysqli($servername, $DBusername, $DBpassword, $DBname);
	//connects to the database based on the variables defined in the first lines
	if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
	}
	else {
		echo "connected";
	}
	$usernameoremail= mysqli_real_escape_string($conn, $usernameoremail);
	$lpassword= mysqli_real_escape_string($conn, $lpassword);
	$DBlook= mysqli_query($conn, "SELECT * FROM UserInfo WHERE (Email = '$usernameoremail' AND Password= '$lpassword') OR (UserName= '$usernameoremail' AND Password='$lpassword')");
	$check=mysqli_num_rows($DBlook);
	if($check=1) {
		header ("Location: Profilepage.html");
		die();
	}
	else {
		die("incorrect please try again" . $conn->connect_error);
	}
?>