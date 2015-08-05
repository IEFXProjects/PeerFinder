<?php
require 'functions.php';
sessionpage();
retrieveUserInfo();

$CRN= $_POST[CRN];
$ClassName=$_POST[ClassName];
$Time=$_POST[ClassTime];
$Professor=$_POST[Professor];
$Location=$_POST[Location];

if (!(ctype_digit($CRN))) {
	die("CRN needs to be composed of only numbers. You inputed:  " . $CRN);
}
if (strlen($CRN) != 7) {
	die("CRN needs to be 7 numbers long. You inputed " . strlen($CRN));
}
require 'DBconnection.php';

$CRN=mysqli_real_escape_string($conn, $CRN);
$ClassName=mysqli_real_escape_string($conn, $ClassName);
$Time=mysqli_real_escape_string($conn, $Time);
$Professor=mysqli_real_escape_string($conn, $Professor);
$Location=mysqli_real_escape_string($conn, $Location);

$Classquery=mysqli_query($conn, "SELECT Classes FROM UserInfo WHERE UserName= '$UniqueUser'");
$CRNcheck= $Classquery->fetch_array(MYSQLI_NUM);
$numClasses= mysqli_num_rows($Classquery);
mysqli_close($conn);

if ($pulledClass= unserialize($CRNcheck[0])) {
	//CRNcheck comes back as an array with only one value which is the serialized array that we inserted... So the [0] is needed
	$count=0;
	$length= count($pulledClass);
	while ($count < $length) {
		$search= array_search($CRN, $pulledClass[$count]);
		if ($search === FALSE) {
		}
		else {
			die("Class already exists please delete it first or use the tool below to update" . $conn->connect_error);
		}
		$count=$count+1;
	}
	$Class= array($CRN, $ClassName, $Time, $Professor, $Location);
	$pulledClass[$length]= $Class;
	//this adds the new array to the end of the current array
}
else {
	$Class= array($CRN, $ClassName, $Time, $Professor, $Location);
	$pulledClass=array($Class);
}

//This checks to see if they already have a class with the entered CRN


$serializedClass= serialize($pulledClass);
require 'DBconnection.php';
if ($conn->query("UPDATE UserInfo SET Classes='$serializedClass' WHERE UserName='$UniqueUser'")=== TRUE) {
	mysqli_close($conn);
	header("Location: https://web125.secure-secure.co.uk/peerphinder.com/classinput.php");
}
else {
	die("Error.  Could not add Class.  Please try again" . $conn->connect_error);
}
//This adds the new class to their overall array of classes and pushes it to the database.



?>