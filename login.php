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
	
		$usernameoremail= mysqli_real_escape_string($conn, $usernameoremail);
		$lpassword= mysqli_real_escape_string($conn, $lpassword);
		
		
		$DBlook= mysqli_query($conn, "SELECT UserName FROM UserInfo WHERE (Email = '$usernameoremail' AND Password= '$lpassword') OR (UserName= '$usernameoremail' AND Password='$lpassword')");
		$check=mysqli_num_rows($DBlook);
		$DBconvert= mysqli_fetch_row($DBlook);
		mysqli_close($conn);
		$DBconvert2= $DBconvert[0];
		if($check != 1) {
			die("incorrect please try again" . $conn->connect_error);
		}
		else {		
			
			session_name("Peerphinderlogin");
			session_start();
			$_SESSION["UserID"]= $DBconvert2;

			//session_regenerate_id(true);
			header ("Location: https://web125.secure-secure.co.uk/peerphinder.com/Profilepage.php");
			//exit();
			echo "redirected";
		}
	}
?>