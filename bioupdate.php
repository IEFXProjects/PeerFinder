<?php 
require 'functions.php';
sessionpage();
retrieveUserInfo();
echo '<h4>You posted:</h4><hr /><hr />' . stripslashes($_POST[myTextArea]);
$bioupdate= $_POST[myTextArea];


require 'DBconnection.php';
var_dump($bioupdate);
$bioupdate= mysqli_real_escape_string($conn, $bioupdate);
var_dump($bioupdate);
$bioupdate= serialize($bioupdate);
if(($mysqli_query($conn,"UPDATE UserInfo SET Bio='$bioupdate' WHERE UserName='$UniqueUser'"))===TRUE) {
	print_r("Your biography has been successfully updated");
}
else {
	print_r("there was an error please try again" . $conn->connect_error);
}
?>