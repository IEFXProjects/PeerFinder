<?php
	$servername = "localhost";
	$username = "cl29-mjgppg";
	$password = "f4V-NrKV7";
	$DBname = "cl29-mjgppg";
	
	
	$conn = new mysqli($servername, $username, $password, $DBname);
	//connects to the database based on the variables defined in the first lines
	if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
	} 
	$sql= "INSERT INTO UserInfo(UserName, Email, Password, FirstName, MiddleName, LastName, College, Major, Minor, CellNum, ProfilePic) VALUES('$_POST[username]', '$_POST[email]', '$_POST[password]', '$_POST[firstName]', '$_POST[middleName]', '$_POST[lastName]', '$_POST[college]', '$_POST[major]', '$_POST[minor]', '$_POST[phoneNumber]', '$_POST[image]')";
	//pushes data to database table based on header values
	if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}

	$conn->close();
	?> 