<?php
	session_name("Peerphinderlogin");
	session_start();
	$_SESSION["UserID"]= array();
	$_SESSION["LAST_ACTIVITY"]= array();
	session_unset("Peerphinderlogin");
	session_destroy("Peerphinderlogin");
	header(Location: 'http://peerphinder.com/index.html');
	exit();
	echo "session destroyed";
?>
	
	