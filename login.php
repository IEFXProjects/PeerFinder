<?php
	$usernameoremail= $_POST[usernameoremail];
	$lpassword= $_POST[lpassword];
	
	include_once 'DBconnection.php';
	connect();
	
	$usernameoremail= mysqli_real_escape_string($conn, $usernameoremail);
	$lpassword= mysqli_real_escape_string($conn, $lpassword);
	$DBlook= mysqli_query($conn, "SELECT * FROM UserInfo WHERE (Email = '$usernameoremail' AND Password= '$lpassword') OR (UserName= '$usernameoremail' AND Password='$lpassword')");
	$check=mysqli_num_rows($DBlook);
	if($check != 1) {
		die("incorrect please try again" . $conn->connect_error);
	}
	else {
		header ("Location: https://web125.secure-secure.co.uk/peerphinder.com/Profilepage.html");
		die();
	}
?>