<?php
require 'functions.php';
sessionpage();
retrieveUserInfo();

$sendto= $_POST['receiver'];
$message= $_POST['messagecontent'];

if(empty($message)) {
	die("The message had no content so it was not sent");
}

require 'DBconnection.php';
$sendto=mysqli_real_escape_string($conn, $sendto);
$sentby= $UniqueUser;
$message=mysqli_real_escape_string($conn, $message);
$query= mysqli_query($conn, "SELECT UserName FROM UserInfo WHERE UserName='$sendto'");
$usernamecheck= mysqli_num_rows($query);
$fetcharray= $query->fetch_array(MYSQLI_NUM);

if($usernamecheck !== 1) {
	die("We were unable to find the user that you requested. Please try again" . $conn->connect_error);
}
else {
	$query2=mysqli_query($conn, "SELECT Received FROM UserInfo WHERE UserName='$sendto'");
	$fetchreceived=$query2->fetch_array(MYSQLI_NUM);
	$query3=mysqli_query($conn, "SELECT Sent FROM UserInfo WHERE UserName='$sentby'");
	$fetchsent=$query3->fetch_array(MYSQLI_NUM);
	mysqli_close($conn);
	if(empty($fetchreceived[0])) {
		$sendreceived=serialize(array(array($sentby, $message)));
	}
	if(empty($fetchsent[0])) {
		$sendsent=serialize(array(array($sendto, $message)));
	}
	if(!empty($fetchreceived[0])){
		$unserializedreceived= unserialize($fetchreceived[0]);
		$unserializedreceived=array_values($unserializedreceived);
		$countreceived= count($unserializedreceived);
		$unserializedreceived[$countreceived]=array($sentby, $message);
		$unserializedreceived=array_values($unserializedreceived);
		$sendreceived= serialize($unserializedreceived);
	}
	if(!empty($fetchsent[0])) {
		$unserializedsent= unserialize($fetchsent[0]);
		$unserializedsent=array_values($unserializedsent);
		$countsent=count($unserializedsent);
		$unserializedsent[$countsent]=array($sendto, $message);
		$unserializedsent=array_values($unserializedsent);
		$sendsent= serialize($unserializedsent);
	}
	
	require 'DBconnection.php';
	if($conn->query("UPDATE UserInfo SET Sent='$sendsent' WHERE UserName='$UniqueUser'")===TRUE) {
	}
	else {
		die("There was an error sending your message. Please try again" . $conn->connect_error);
	}
	if($conn->query("UPDATE UserInfo SET Received='$sendreceived' WHERE UserName='$sendto'")===TRUE) {
		mysqli_close($conn);
		header("Location: https://web125.secure-secure.co.uk/peerphinder.com/messagetab.php");
	}
	else{
		die("There was an error sending your message. Please try again" . $conn->connect_error);
	}
}

?>