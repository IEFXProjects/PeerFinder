<?php
require 'functions.php';
sessionpage();
retrieveUserInfo();

$CRN= $_POST[CRN];
if (!(ctype_digit($CRN))) {
	die("CRN needs to be composed of only numbers. You inputed:  " . $CRN);
}
if (strlen($CRN) != 7) {
	die("CRN needs to be 7 numbers long. You inputed " . strlen($CRN));
}
require 'DBconnection.php';

$CRN=mysqli_real_escape_string($conn, $CRN);

$Classquery=mysqli_query($conn, "SELECT Classes FROM UserInfo WHERE UserName= '$UniqueUser'");
$CRNcheck= $Classquery->fetch_array(MYSQLI_NUM);
mysqli_close($conn);
$pulledClass= unserialize($CRNcheck[0]);

$count=0;
$length= count($pulledClass);
$falses= array();
while ($count < $length) {
	$search= array_search($CRN, $pulledClass[$count]);
	if(!($search === FALSE)){
		unset($pulledClass[$count]);
		$pulledClass=array_values($pulledClass);
		break;
		//break ends the while loop so that it only deletes one class with that CRN code rather than all duplicates.  The insert function should not let duplicates into the database, but this is a good time to double check.
	}
	else {
		array_push($falses, $count);
		$falses=array_values($falses);
	}
	$count=$count+1;
}
if (count($falses)== $length) {
		die("We were unable to find a class with that CRN code. Please check the table and match the CRN column's code with the class you would like to delete");
}
$serializedClass=serialize($pulledClass);
require 'DBconnection.php';
if ($conn->query("UPDATE UserInfo SET Classes='$serializedClass' WHERE UserName='$UniqueUser'")=== TRUE) {
	mysqli_close($conn);
	header("Location: https://web125.secure-secure.co.uk/peerphinder.com/classinput.php");
}
else {
	die("Error.  Could not delete Class.  Please try again" . $conn->connect_error);
}
?>