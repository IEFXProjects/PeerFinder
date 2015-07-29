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
/*
$CRN=mysqli_real_escape_string($conn, $CRN);
$ClassName=mysqli_real_escape_string($conn, $ClassName);
$Time=mysqli_real_escape_string($conn, $Time);
$Professor=mysqli_real_escape_string($conn, $Professor);
$Location=mysqli_real_escape_string($conn, $Location);
*/
$CRNcheck=mysqli_query($conn, "SELECT Classes FROM UserInfo WHERE UserName= '$UniqueUser'");
$numClasses= mysqli_num_rows($CRNcheck);
print_r($numClasses);
$Classinfo=$CRNcheck->fetch_array();
mysqli_close($conn);
if ($Classinfo= NULL) {
	$pulledClass=array();
}
else {
	$pulledClass= unserialize($Classinfo);
	$temp2=array();
	foreach($pulledClass as $temp){
		array_merge($temp2, array_search($CRN, $temp));
	}
	//Searches the inner arrays for the correct value
	foreach($temp2 as $temp){
		if ($temp !== FALSE) {
			die("Class already exists please delete it first or use the tool below to update" . $conn->connect_error);
		}
	}
	//searches the overall array for the correct arrays.
}


//This checks to see if they already have a class with the entered CRN

$Class= array($CRN, $ClassName, $Time, $Professor, $Location);
array_push($pulledClass, $Class);
serialize($pulledClass);
if ($conn->query("UPDATE UserInfo SET Classes='$pulledClass' WHERE UserName='$UniqueUser'")=== TRUE) {
	mysqli_close($conn);
	/*
	header("Location: https://web125.secure-secure.co.uk/peerphinder.com/classinput.php");
	*/
}
else {
	die("Error.  Could not add Class.  Please try again" . $conn->connect_error);
}
//This adds the new class to their overall array of classes and pushes it to the database.




?>