<?php 
require 'functions.php';
sessionpage();
retrieveUserInfo();
echo '<h2>You posted:</h2><hr />'. $_POST['title'] . '<hr />' . stripslashes($_POST['myTextArea']);
$UserID= htmlentities($_SESSION['UserID']);
$bioupdate= $_POST['myTextArea']);

require 'DBconnection.php';
$checkbio= mysqli_query($conn, "SELECT Biography FROM UserInfo WHERE UserName= '$UserID'");
if (!$checkbio=0) {
	$stmt = $mysqli->prepare("UPDATE UserInfo SET Biography = ?"); 
	$stmt->bind_param($bioupdate);
	$stmt->execute(); 
	$stmt->close();
	mysqli_close($conn);
}
else {
	$sql= "INSERT INTO UserInfo(Biography) VALUES('$bioupdate')";
	//pushes refined data to database table based on header values

	if ($conn->query($sql) === TRUE) {
		echo "New record created successfully";
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
	mysqli_close($conn);
}
?>