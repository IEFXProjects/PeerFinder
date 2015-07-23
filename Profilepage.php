<?php
session_name("Peerphinderlogin");
session_start();
session_regenerate_id(TRUE);
if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 600)) {
    // last request was more than 10 minutes ago
    session_unset();     // unset $_SESSION variable for the run-time 
    session_destroy();   // destroy session data in storage
}
$_SESSION['LAST_ACTIVITY']= time(); // update last activity time stamp

$servername = "localhost";
$DBusername = "cl29-mjgppg";
$DBpassword = "f4V-NrKV7";
$DBname = "cl29-mjgppg";


$conn = new mysqli($servername, $DBusername, $DBpassword, $DBname);
//connects to the database based on the variables defined in the first lines
if ($conn->connect_error) {
 die("Connection failed: " . $conn->connect_error);
}
else {
	echo "connected";
}
$UserID= htmlentities($_SESSION['UserID']);
$getinfo= mysqli_query($conn, "SELECT * FROM UserInfo WHERE UserName= '$UserID'");
mysqli_close($conn);

$user_name= htmlentities($getinfo[0]);
$EMail= htmlentities($getinfo[1]);
$FirstName= htmlentities($getinfo[3]);
$MiddleName=htmlentities($getinfo[4]);
$LastName=htmlentities($getinfo[5]);
$College= htmlentities($getinfo[6]);
$Major= htmlentities($getinfo[7]);
$Minor= htmlentities($getinfo[8]);
$Phone_Number= htmlentities($getinfo[9]);
$Profile_Picture= htmlentities($getinfo[10]);
/*
$user_name= $_SESSION["User_Name"];
$EMail= $_SESSION["Email"];
$FirstName= $_SESSION["First_Name"];
$MiddleName= $_SESSION["Middle_Name"];
$LastName= $_SESSION["Last_Name"];
$COllege= $_SESSION["College"];
$MAjor= $_SESSION["Major"];
$MInor= $_SESSION["Minor"];
$Phone_Number= $_SESSION["Phone_Number"];
$Profile_Picture= $_SESSION["Profile_Picture"];
*/
?>
<html>
	<head>
		<link type="text/css" rel="stylesheet" href="Profilepage.css"/>
		<link type="text/css" rel="stylesheet" href="tabs.css"/>
		<title>Profilepage</title>
	</head>
	<body>
		<div id="header">
			<h1 id="PeerPhinder">PeerPhinder</h1>
			<img src="Pictures/PeerPhinderLogo.png" id="photo"/>
				<div id="largetab">
						<a href="mycourses.php"><h3 class="tabs blue" id="Mycourses">My Courses</h3></a>
						<a href="peers.php"><h3 class="tabs orange" id="Peers">Peers</h3></a>
						<a href="Profilepage.php"><h3 class="tabs blue" id="Myprofile">My Profile</h3></a>
						<a href="aboutus.html"><h3 class="tabs orange" id="aboutus">About Us</h3></a>
						<a href="search.php"><h3 class="tabs blue" id="search">search</h3></a>
						<a href="logout2.php"><h3 class="tabs orange" id="logout">logout</h3></a>
				</div>

		</div>
		<div id="pageinfo">
			<p id="message">This page is what other users will see when they view you</p>
			<div id="name">
				<p class="name"><?php print($FirstName); ?></p>
				<p class="name"><?php print($MiddleName); ?></p>
				<p class="name"><?php print($LastName); ?></p>
			</div>
			<div id="biography">
				<p> biography</p>
				<p id="biotext">b_i_o</p>
				<a href="biochange.php" id="biochange">click here to make changes to your biography</a>
			</div>
			<img src="Profile_pic" id="ppic"/>
			<p id="space"></p> <!-- separates -->
			<table>
					<thead>
						<tr>
							<th class="tableh tabler">Class</th>
							<th class="tableh tabler">Time</th>
							<th class="tableh tabler">Professor</th>
							<th class="tableh">Location</th>
						</tr>
					</thead>
				
				<tbody>
					<tr>
						<td class="tabler tableb">Class1</td>
						<td class="tabler tableb">time1</td>
						<td class="tabler tableb">professor1</td>
						<td class="tableb">location1</td>
					</tr>
				</tbody>

			
			
		</div>
	</body>
</html>			
