<?php
	session_name("Peerphinderlogin");
	session_start();
	$_SESSION= array();
	$_SESSION= array();
	session_unset("Peerphinderlogin");
	session_destroy("Peerphinderlogin");
	header(Location: 'http://peerphinder.com/index.html');
	exit();
	echo "session destroyed";
?>
	
	