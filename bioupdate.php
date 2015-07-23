<?php 
echo '<h2>You posted:</h2><hr />'. $_POST['title'] . '<hr />' . stripslashes($_POST['myTextArea']);
$UserID= htmlentities($_SESSION['UserID']);
$bioupdate= $_POST['myTextArea']);

$servername = "localhost";
$DBusername = "cl29-mjgppg";
$DBpassword = "f4V-NrKV7";
$DBname = "cl29-mjgppg";


$conn = new mysqli($servername, $DBusername, $DBpassword, $DBname);
//connects to the database based on the variables defined in the first lines
if ($conn->connect_error) {
 die("Connection failed: " . $conn->connect_error);
}
else {
	echo "connected";
}
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