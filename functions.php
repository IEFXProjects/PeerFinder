<?php
function retrieveUserInfo() {
	$UniqueUser= $_SESSION["UserID"];
	require "DBconnection.php";
	$query= mysqli_query($conn, "SELECT * FROM UserInfo WHERE UserName= '$UniqueUser'");
	if ($query) {
		echo "query successful";
		echo mysqli_num_rows($query);
	}
	$getinfo= $query->fetch_array();
	echo $getinfo;
	mysqli_close($conn);
	echo $getinfo;
	if ($getinfo) {
		echo "info gathered";
	}
	echo $getinfo;
	$user_name= htmlentities($getinfo[0]);
	$EMail= htmlentities($getinfo[1]);
	$PAssword= htmlentities($getinfo[2]);
	$FirstName= htmlentities($getinfo[3]);
	$MiddleName=htmlentities($getinfo[4]);
	$LastName=htmlentities($getinfo[5]);
	$College= htmlentities($getinfo[6]);
	$Major= htmlentities($getinfo[7]);
	$Minor= htmlentities($getinfo[8]);
	$Phone_Number= htmlentities($getinfo[9]);
	$Profile_Picture= htmlentities($getinfo[10]);
	$bio= htmlentities($getinfo[11]);
}
?>