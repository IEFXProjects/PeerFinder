<?php 
require 'functions.php';
sessionpage();
retrieveUserInfo();
echo '<h4>You posted:</h4><hr /><hr />' . stripslashes($_POST[myTextArea]);
$bioupdate= $_POST[myTextArea];


require 'DBconnection.php';
var_dump($bioupdate);
$bioupdate= mysqli_real_escape_string($conn, $bioupdate);
$bioupdate=strval($bioupdate);
var_dump($bioupdate);
$bioupdate= json_encode($bioupdate);
if (strlen($bioupdate)>=4294967295) {
	die("The bio that you entered takes up too much space. Try to reduce the number of words and formatting");
}
else{
	if((mysqli_query($conn,"UPDATE UserInfo SET Bio='$bioupdate' WHERE UserName='$UniqueUser'"))===TRUE) {
		mysqli_close($conn);
		header("Location: https://web125.secure-secure.co.uk/peerphinder.com/biochange.php");
	}
	else {
		print_r("there was an error please try again" . $conn->connect_error);
	}
}
?>