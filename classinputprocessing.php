<?php
require 'functions.php';
sessionpage();
retrieveUserInfo();

$CRN= $_POST[CRN];
$ClassName=$_POST[ClassName];
$Time=$_POST[ClassTime];
$Professor=$_POST[Professor];
$Location=$_POST[Location];
echo $CRN;
echo $ClassName;
echo $Time;
echo $Professor;
echo $Location;

require 'DBconnection.php';

$CRN=mysqli_real_escape_string($conn, $CRN);
$ClassName=mysqli_real_escape_string($conn, $ClassName);
$Time=mysqli_real_escape_string($conn, $Time);
$Professor=mysqli_real_escape_string($conn, $Professor);
$Location=mysqli_real_escape_string($conn, $Location);

$CRNcheck=mysqli_query($conn, "SELECT Classes FROM UserInfo WHERE UserName= '$UniqueUser'");
print_r($CRNcheck);
$numClasses= mysqli_num_rows($CRNcheck);
print_r($numClasses);
mysqli_close($conn);

if ($pulledClass= unserialize($CRNcheck)) {
	$pulledClass= unserialize($CRNcheck);
	print_r($pulledClass);
	$count=0;
	while ($count < count($pulledClass)) {
		$search= array_search($CRN, $pulledClass[$count]);
		if ($search === FALSE) {
		}
		else {
			die("Class already exists please delete it first or use the tool below to update" . $conn->connect_error);
		}
		$count=$count+1;
	}
	$Class= array($CRN, $ClassName, $Time, $Professor, $Location);
	$length= count($pulledClass);
	$pulledClass[$length]= $Class;
	print_r($pulledClass);
	/*
	$temp2=array();
	foreach($pulledClass as $temp){
		if (array_search($CRN, $temp) === FALSE) {
			unset($temp);
			die("array_search returned False");
		}
		else {
			array_merge($temp2, $pulledClass[array_search($CRN, $temp)]);
			unset($temp);
		}
	}
	//Searches the inner arrays for the correct value
	foreach($temp2 as $temp){
		if ($temp !== FALSE) {
			die("Class already exists please delete it first or use the tool below to update" . $conn->connect_error);
		}
	}
	//searches the overall array for the correct arrays.
	*/
}
else {
	$Class= array($CRN, $ClassName, $Time, $Professor, $Location);
	$pulledClass=array($Class);
	print_r($pulledClass);
}

//This checks to see if they already have a class with the entered CRN


$serializedClass= serialize($pulledClass);
print_r($serializedClass);
require 'DBconnection.php';
if ($conn->query("UPDATE UserInfo SET Classes='$serializedClass' WHERE UserName='$UniqueUser'")=== TRUE) {
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