<?php
$CUsername= $_POST['CUsername'];
$CEmail= $_POST['CEmail'];
$COldPassword= $_POST['COldPassword'];
$CNewPassword= $_POST['CNewPassword'];
$CFirstName= $_POST['CFirstName'];
$CMiddleName= $_POST['CMiddleName'];
$CLastName= $_POST['CLastName'];
$CPhoneNumber= $_POST['CPhoneNumber'];
$CCollege= $_POST['CCollege'];
$CMajor= $_POST['CMajor'];
$CMinor= $_POST['CMinor'];



require 'DBconnection.php';

$CUsername = mysqli_real_escape_string($conn, $CUsername);
$CEmail = mysqli_real_escape_string($conn, $CEmail);
$COldPassword = mysqli_real_escape_string($conn, $COldPassword);
$CNewPassword = mysqli_real_escape_string($conn, $CNewPassword);
$CFirstName = mysqli_real_escape_string($conn, $CFirstName);
$CMiddleName = mysqli_real_escape_string($conn, $CMiddleName);
$CLastName = mysqli_real_escape_string($conn, $CLastName);
$CCollege = mysqli_real_escape_string($conn, $CCollege);
$CMajor = mysqli_real_escape_string($conn, $CMajor);
$CMinor = mysqli_real_escape_string($conn, $CMinor);
$CPhoneNumber = mysqli_real_escape_string($conn, $CPhoneNumber);
mysqli_close($conn);


require 'functions.php';
sessionpage();
retrieveUserInfo();
if ($CUsername != $UniqueUser) {
	$checkUsername = mysqli_query($conn, "SELECT UserName from UserInfo WHERE UserName = '$CUsername'");
	if (mysqli_num_rows($checkUsername)>0) {
		die("Username taken please try again" . $conn->connect_error);
	}
	$column= "UserName";
	$change= $CUsername;
}
if ($CEmail != $EMail) {
	$CEmail = filter_var($CEmail, FILTER_SANITIZE_EMAIL);
	//removes any illegal characters from the email
	if (!filter_var($CEmail, FILTER_VALIDATE_EMAIL) === false) {}
	else {
		die("email is not valid");
	}
	$checkemail= mysqli_query($conn, "SELECT Email from UserInfo WHERE Email = '$CEmail'");
	if (mysqli_num_rows($checkemail)>0) {
		die("email associated with another account! please use a valid email or go to the log in page to recover your account" . $conn->connect_error);
	}
	$column= "Email";
	$change= $CEmail;
}if (($COldPassword == $CNewPassword) and ($CNewPassword != $PAssword) {
	$passlength= strlen($CNewPassword);
	if ($passlength <= 7 or $passlength >= 15) {
		die("password does not meet length requirements(7-15 characters)");
	}
	$column= "Password";
	$change= $COldPassword;
}if ($CFirstName != $FirstName) {
	$column= "FirstName";
	$change= $CFirstName;
}if ($CMiddleName != $MiddleName) {
	$column= "MiddleName";
	$change= $CMiddleName;
}if ($CLastName != $LastName) {
	$column= "LastName";
	$change= $CLastName;
}if ($CCollege != $College) {
	$column= "College";
	$change= $CCollege;
}if ($CMajor != $Major) {
	$column= "Major";
	$change= $CMajor;
}if ($CMinor != $Minor) {
	$column= "Minor";
	$change= $CMinor;
}if ($CPhoneNumber != $Phone_Number) {
	$column= "CellNum";
	$change= $CPhoneNumber;
}if ($CP != $user_name) {
	$column= "ProfilePic";
	$change= $CUsername;
}
//compare the super global session variable to the posts above to determine which one changed.  set the column heading as a variable and change as a variable to only have one mysqli statement.  
require 'DBconnection.php';
$update = mysqli_query($conn, "UPDATE UserInfo SET $column= $change)
mysqli_close($conn);
header("Location:  https://web125.secure-secure.co.uk/peerphinder.com/bioupdate.php");
exit();
?>

