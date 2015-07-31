<?php
require 'functions.php';
sessionpage();
retrieveUserInfo();

$CRN= $_POST[CRN];
print_r($CRN);
if (!(ctype_digit('$CRN'))) {
	print_r($CRN);
	die($CRN);
}
if (strlen('$CRN') != 7) {
	die("CRN needs to be 7 numbers long");
}
require 'DBconnection.php';

$CRN=mysqli_real_escape_string($conn, $CRN);

$Classquery=mysqli_query($conn, "SELECT Classes FROM UserInfo WHERE UserName= '$UniqueUser'");
$CRNcheck= $Classquery->fetch_array(MYSQLI_NUM);
$numClasses= mysqli_num_rows($CRNcheck);
mysqli_close($conn);
$pulledClass= unserialize($CRNcheck[0]);

$count=0;
$length= count($pulledClass);
while ($count < $length) {
	$search= array_search($CRN, $pulledClass[$count]);
	if ($search === FALSE) {
		die("We were unable to find a class with that CRN code. Please check the table and match the CRN column code with the class you would like to delete");
	}
	else {
		unset($pulledClass[$count]);
	}
	$count=$count+1;
}
$serializedClass=serialize($pulledClass);
require 'DBconnection';
if ($conn->query("UPDATE UserInfo SET Classes='$serializedClass' WHERE UserName='$UniqueUser'")=== TRUE) {
	mysqli_close($conn);
	header("Location: https://web125.secure-secure.co.uk/peerphinder.com/classinput.php");
}
else {
	die("Error.  Could not delete Class.  Please try again" . $conn->connect_error);
}
?>