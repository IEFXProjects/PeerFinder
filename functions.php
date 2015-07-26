<?php
function retrieveUserInfo() {
	global $UniqueUser= $_SESSION["UserID"];
	require 'DBconnection.php';
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
	global $user_name= htmlentities($getinfo[0]);
	global $EMail= htmlentities($getinfo[1]);
	global $PAssword= htmlentities($getinfo[2]);
	global $FirstName= htmlentities($getinfo[3]);
	global $MiddleName=htmlentities($getinfo[4]);
	global $LastName=htmlentities($getinfo[5]);
	global $College= htmlentities($getinfo[6]);
	global $Major= htmlentities($getinfo[7]);
	global $Minor= htmlentities($getinfo[8]);
	global $Phone_Number= htmlentities($getinfo[9]);
	global $Profile_Picture= htmlentities($getinfo[10]);
	global $bio= htmlentities($getinfo[11]);
	global $CLasses= array(htmlentities(unserialize($getinfo[12])));
}
function sessionpage() {
	session_name("Peerphinderlogin");
	session_start();
	if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 600)) {
		// last page request was more than 10 minutes ago
		session_unset();     // unset $_SESSION variable for the run-time 
		session_destroy();   // destroy session data in storage
		echo "<p>Session Timed out</p>";
		header("Location: http://peerphinder.com");
	}
	$_SESSION['LAST_ACTIVITY']= time(); // update last activity time stamp
}
?>