<?php
   session_start();
	// set time-out period (in seconds)
	
	$inactive = 600;
	 
	// check to see if $_SESSION["timeout"] is set
	if (isset($_SESSION["timeout"])) {
		// calculate the session's "time to live"
		$sessionTTL = time() - $_SESSION["timeout"];
		if ($sessionTTL > $inactive) {
			session_destroy();
			header("Location: /logout2.php");
		}
	}
	else {
	$_SESSION["timeout"] = time();
	//session_regenerate_id(true); 
	// This line regenerates the session and delete the old one. 
	// It also generates a new encryption key in the database. 
	}
?>