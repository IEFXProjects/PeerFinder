<?php
	$ClassName= $_POST[ClassName];
	$halftime= $_POST[halftime];
	$halftime2= $_POST[halftime2];
	$Snacks= $_POST[Snacks];
	$password= $_POST[password];
	$passwordConfirmed= $_POST[passwordConfirmed];
	$firstName= $_POST[firstName];
	$middleName= $_POST[middleName];
	$lastName= $_POST[lastName];
	$college= $_POST[college];
	$major= $_POST[major];
	$minor= $_POST[minor];
	$phoneNumber= $_POST[phoneNumber];
	$image= $_POST[image];
	//converts form data to variables
	
	$arrayinfo = array($username, $email, $emailConfirmed, $password, $passwordConfirmed, $firstName, $middleName, $lastName, $college, $major, $minor, $phoneNumber, $image);
	//organizes the data into an array so that it is easier to run tests.
	if ($arrayinfo==0) {
		die("No data submitted.  Please try again ");
	}
	//if the user tries to submit a blank form it will not take it
	$passlength= strlen($password);
	if ($passlength <= 7 or $passlength >= 15) {
		die("password does not meet length requirements");
	}
	if ($email !== $emailConfirmed) {
		die("emails do not match");
	}
	if ($password !== $passwordConfirmed) {
		die("passwords do not match");
	}	
	
	$email = filter_var($email, FILTER_SANITIZE_EMAIL);
	//removes any illegal characters from the email
	if (!filter_var($email, FILTER_VALIDATE_EMAIL) === false) {}
	else {
		die("email is not valid");
	}
	//tests to see if the user inputed a valid email...if they did it will do nothing...if they did not it will end the script
	//all of the if statements test to make sure the user inputed the form data correctly
	
	$servername = "localhost";
	$DBusername = "cl29-mjgppg";
	$DBpassword = "f4V-NrKV7";
	$DBname = "cl29-mjgppg";
	
	
	$conn = new mysqli($servername, $DBusername, $DBpassword, $DBname);
	//connects to the database based on the variables defined in the first lines
	if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
	}
	
	$username = mysqli_real_escape_string($conn, $username);
	$ClassName = mysqli_real_escape_string($conn, $ClassName);
	$halftime = mysqli_real_escape_string($conn, $halftime);
	$halftime2 = mysqli_real_escape_string($conn, $halftime2);
	$passwordConfirmed = mysqli_real_escape_string($conn, $passwordConfirmed);
	$firstName = mysqli_real_escape_string($conn, $firstName);
	$middleName = mysqli_real_escape_string($conn, $middleName);
	$lastName = mysqli_real_escape_string($conn, $lastName);
	$college = mysqli_real_escape_string($conn, $college);
	$major = mysqli_real_escape_string($conn, $major);
	$minor = mysqli_real_escape_string($conn, $minor);
	$phoneNumber = mysqli_real_escape_string($conn, $phoneNumber);
	$image = mysqli_real_escape_string($conn, $image);
	//prevents sql injection attacks by removing special characters
	
	$checkUsername = mysqli_query($conn, "SELECT UserName from UserInfo WHERE UserName = '$username'");
	$checkemail= mysqli_query($conn, "SELECT Email from UserInfo WHERE Email = '$email'");
	if (mysqli_num_rows($checkUsername)>0 and mysqli_num_rows($checkemail)>0) {
		die("Username and Email are both taken please try again" . $conn->connect_error);
	}
	if (mysqli_num_rows($checkUsername)>0) {
		die("Username taken please try again" . $conn->connect_error);
	}
	if (mysqli_num_rows($checkemail)>0) {
		die("email associated with another account! please use a valid email or go to the log in page to recover your account" . $conn->connect_error);
	}
	//runs two queries on the database to determine if the email address or username are used for a different account.  if they are it then disconnects and displays an error message as well as logging the error in the server error-log.
	
	$sql= "INSERT INTO UserInfo(UserName, Email, Password, FirstName, MiddleName, LastName, College, Major, Minor, CellNum, ProfilePic) VALUES('$username', '$email', '$password', '$firstName', '$middleName', '$lastName', '$college', '$major', '$minor', '$phoneNumber', '$image')";
	//pushes refined data to database table based on header values
	if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
	mysqli_close($conn);
