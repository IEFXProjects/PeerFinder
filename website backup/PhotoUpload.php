<?php
require 'functions.php';
sessionpage();
retrieveUserInfo();

$target_dir = "Pictures/UserPictureUploads/";
$image_name= $_FILES['fileToUpload']['name'];
$image_type= $_FILES['fileToUpload']['type'];
$image_size= $_FILES['fileToUpload']['size'];
$image_tmp_name= $_FILES['fileToUpload']['tmp_name'];
$error= $_FILES['fileToUpload']['error'];

if (!empty($error)) {
	die("There was an error processing your picture. Please try again");
}
$extension= "." . substr($image_type, 6);
if($extension == ".jpeg") {
	$extension= ".jpg";
}
if (!($extension== ".jpg" or $extension== ".gif" or $extension== ".jpg" or $extension== ".png")) {
	unset($_FILES);
	die("that file type is not supported");
}

if (move_uploaded_file($image_tmp_name, $target_dir . $UniqueUser . $extension)) {
	require 'DBconnection.php';
	if ($conn->query("UPDATE UserInfo SET ProfilePic='$extension' WHERE UserName='$UniqueUser'")=== TRUE) {
		mysqli_close($conn);
		$_SESSION['photouploadconfirm']= "1";
		header("Location: https://web125.secure-secure.co.uk/peerphinder.com/accountsettings.php");
	}
	else {
		die("There was an error connecting to the database.  Please make sure that you are logged in and try again" . $conn->connect_error);
	}
}
else {
	die("The file was not successfully uploaded. Please try again");
}

?>