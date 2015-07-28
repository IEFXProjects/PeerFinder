<?php
require 'functions.php';
sessionpage();
retrieveUserInfo();

$CRN= $_POST['CRN'];
$ClassName=$_POST['ClassName'];
$Time=$_POST['Time'];
$Professor=$_POST['Professor'];
$Location=$_POST['Location'];

require 'DBconnection.php';
$CRN=mysqli_real_escape_string($conn, $CRN);
$ClassName=mysqli_real_escape_string($conn, $ClassName);
$Time=mysqli_real_escape_string($conn, $Time);
$Professor=mysqli_real_escape_string($conn, $Professor);
$Location=mysqli_real_escape_string($conn, $Location);

$CRNcheck=mysqli_query($conn, "SELECT Classes FROM UserInfo WHERE UserName= '$UniqueUser'");
$numClasses= mysqli_num_rows($CRNcheck);
$Classinfo=$CRNcheck->fetch_array();
mysqli_close($conn);
$pulledClass= unserialize($Classinfo);
if ($pulledClass['$CRN']) {
	die("Class already exists please delete it first or use the tool below to update" . $conn->connect_error);
}
//This checks to see if they already have a class with the entered CRN

$Class= array($CRN, $ClassName, $Time, $Professor, $Location);
if ($numClasses =='NULL') {
	$pulledClass= array($Class);
}
else {
	array_push($pulledClass, $Class);
}
if ($conn->query("UPDATE UserInfo SET Classes='$pulledClass' WHERE UserName='$UniqueUser'")=== TRUE) {
	mysqli_close($conn);
	header("Location: https://web125.secure-secure.co.uk/peerphinder.com/classinput.php");
}
else {
	die("Error.  Could not add Class.  Please try again" . $conn->connect_error);
}
//This adds the new class to their overall array of classes and pushes it to the database.






?>