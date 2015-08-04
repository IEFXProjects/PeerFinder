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
$sendto=mysqli_real_escape_string($sendto);
$sentby= $UniqueUser;
$message=mysqli_real_escape_string($message);
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
		$fetchreceived[0][0]=array($sentby, serialize($message))
	}
	if(empty($fetchsent[0])) {
		$fetchsent[0][0]=array($sentto, serialize($message));
	}
	else{
		$count=0;
		$countreceived= count(unserialize($fetchreceived[0]));
		while($count<$countreceived) {
			$fetchreceived[0][$count]=array($sentby, serialize($message));
			$count=$count+1;
		}
		$count2=0;
		$countsent=count($fetchsent[0]);
		while($count2<$countsent) {
			$fetchsent[0][$count]=array($sentto, serialize($message));
			$count2=$count2+1;
		}
	}
	require 'DBconnection.php';
	if($conn->query("UPDATE UserInfo SET Sent='$fetchsent[0]' WHERE UserName='$UniqueUser'")===TRUE) {
	}
	else {
		die("There was an error sending your message. Please try again" . $conn->connect_error)
	}
	if($conn->query("UPDATE UserInfo SET Received='$fetchreceived[0]' WHERE UserName='$sentto'")===TRUE) {
	}
	else{
		die("There was an error sending your message. Please try again" . $conn->connect_error);
	}
	mysqli_close($conn);
}

?>