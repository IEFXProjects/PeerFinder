<?php
	$cookie_name= "UserName";
	//this is what the user will see if they look at their cookie list
	$result = explode(exec('python login.py'));
	//this pulls the information from the python script
	$info= array($result);
	//this places the python information into a php array
	setcookie($cookie_name, $info, time() + (86400/24), "/"); 
	//this places the cookie on their computer... note that time() equals the current time so the cookie expires after an hour
	// 86400= 1 day in seconds
?>
<html>
<body>
	<?php	
		if(!isset($_COOKIE[$cookie_name])) {
			echo "Log in process successful.";
			echo "Welcome " . $info[0];
			echo "<br><a href="Profilepage.html">Click Here to<br>Continue to<br>Profile page</a>";
			// it echos the link to the browser as html for the user to click on
			//if we can find a way to do this without having the user click it would be better
		}
		else {
			echo "Log in error";
			echo "<a href="index.html">Please try again</a>";
			echo "(note make sure that you have";
			echo "your cookies enabled)";
			// this is necessary to let plp know that they need to have cookies enabled to use our website.
		}
	?>
	