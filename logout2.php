<?php
	session_start();
	session_unset();
	session_destroy();
	header(Location: 'http://peerphinder.com/index.html');
?>
	
	