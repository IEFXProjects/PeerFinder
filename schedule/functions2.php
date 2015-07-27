<?php
function retrieveUserInfo() {
	global $UniqueUser, $user_name, $EMail, $PAssword, $FirstName, $MiddleName, $LastName, $College, $Major, $Minor, $Phone_Number, $Profile_Picture, $bio, $CLasses;
	$UniqueUser= $_SESSION["UserID"];
	require '../DBconnection.php';
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
	$user_name= htmlentities($getinfo[1]);
	$EMail= htmlentities($getinfo[2]);
	$PAssword= htmlentities($getinfo[3]);
	$FirstName= htmlentities($getinfo[4]);
	$MiddleName=htmlentities($getinfo[5]);
	$LastName=htmlentities($getinfo[6]);
	$College= htmlentities($getinfo[7]);
	$Major= htmlentities($getinfo[8]);
	$Minor= htmlentities($getinfo[9]);
	$Phone_Number= htmlentities($getinfo[10]);
	$Profile_Picture= htmlentities($getinfo[11]);
	$bio= htmlentities($getinfo[12]);
	$CLasses= array(htmlentities(unserialize($getinfo[13])));
}
function sessionpage() {
	session_name("Peerphinderlogin");
	session_start();
	if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 600)) {
		// last page request was more than 10 minutes ago
		session_unset();     // unset $_SESSION variable for the run-time 
		session_destroy();   // destroy session data in storage
		echo "<p>Session Timed out</p>";
		header("Location: http://peerphinder.com/timedout.html");
	}
	$_SESSION['LAST_ACTIVITY']= time(); // update last activity time stamp
	session_regenerate_id(true);
}
function UserSchedule($UniqueUser) {
	global $Act, $time;
	require 'DBconnection2.php';
	$query= mysqli_query($conn, "SELECT * FROM Events WHERE UserName= '$UniqueUser'");
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
	$Act= htmlentities(unserialize($Act));
}
?>