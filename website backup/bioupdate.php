<?php 
require 'functions.php';
sessionpage();
retrieveUserInfo();
echo '<h2>You posted:</h2><hr />'. $_POST['title'] . '<hr />' . stripslashes($_POST['myTextArea']);
$bioupdate= $_POST['myTextArea'];

require 'DBconnection.php';
$bioupdate= mysqli_real_escape_string($conn, $bioupdate);
$bioupdate= strval($bioupdate);
$checkbio= mysqli_query($conn, "SELECT Bio FROM UserInfo WHERE UserName= '$UniqueUser'");
if (!is_null($checkbio)) {
	$update = $mysqli_query($conn,"UPDATE UserInfo SET Bio='$bioupdate' WHERE UserName='$UniqueUser'");
	echo "Your biography has been successfully updated";
}
else {
	if ($mysqli_query($conn, "INSERT INTO UserInfo(Bio) VALUES('$bioupdate')") === TRUE) {
		echo "Your Biography has been successfully added";
		echo "<a href=\"https://web125.secure-secure.co.uk/peerphinder.com/biochange.php\"</a>";
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
	mysqli_close($conn);
}
?>