<?php
require 'functions.php';
sessionpage();
retrieveUserInfo();
$newfriend= $_POST['NewFriend'];
if (empty($newfriend)) {
	die("There was an error.  Please try again" . $conn->connect_error);
}
require 'DBconnection.php';
$PeerQuery= mysqli_query($conn, "SELECT Peers FROM UserInfo WHERE UserName= '$UniqueUser'");
$Peerpull= $PeerQuery->fetch_array(MYSQLI_NUM);
if ($Peerpull[0]== 0 OR $Peerpull[0]===NULL) {
	$Peercheck= array();
}
else {
	$Peercheck= unserialize($Peerpull[0]);
}
mysqli_close($conn);
$numPeers= count($Peercheck);
if (in_array($newfriend, $Peercheck)) {
	die("You are already friends with this person");
}
array_push($Peercheck, $newfriend);
$serialized= serialize($Peercheck);
require 'DBconnection.php';
if ((mysqli_query($conn, "UPDATE UserInfo SET Peers='$serialized' WHERE UserName='$UniqueUser'")) ===TRUE){
	mysqli_close($conn);
	if (isset($_SERVER['HTTP_REFERER'])) {
		header("Location: " . $_SERVER['HTTP_REFERER']);
	}
	else {
		header("Location: https://web125.secure-secure.co.uk/peerphinder.com/Peers.php");
	}
	//$_SERVER['HTTP_REFERER'] finds out the user's last url... this allows us to return them to the search page or the peers.php page depending on where they made the change to their friend list.
}
else {
	die("There was an error connecting to the database please try again" . $conn->connect_error);
}
?>