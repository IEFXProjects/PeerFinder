<?php
require 'functions.php';
sessionpage();
retrieveUserInfo();
$byefriend= $_POST['ByeFriend'];
if (empty($byefriend)) {
	die("There was an error.  Please try again" . $conn->connect_error);
}
require 'DBconnection.php';
$PeerQuery= mysqli_query($conn, "SELECT Peers FROM UserInfo WHERE UserName= '$UniqueUser'");
$Peerpull= $PeerQuery->fetch_array(MYSQLI_NUM);
if ($Peerpull[0]== 0 OR $Peerpull[0]===NULL) {
	die("We ran into an error retrieving your information.  Please try again" . $conn->connect_error);
}
else {
	$Peercheck= unserialize($Peerpull[0]);
}
mysqli_close($conn);
$numpeers= count($Peercheck);
$count=0;
while ($count<= $Peercheck) {
	$search= array_search($byefriend, $Peercheck);
	unset($Peercheck[$search]);
}
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
}
else {
	die("There was an error connecting to the database please try again" . $conn->connect_error);
}
?>