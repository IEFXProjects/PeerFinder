<?php
if(!isset($_COOKIE['cookie'])){
    echo: "usercookie is not present";
	echo: "please login";
	header("Location: http://www.peerphinder.com"); /* Redirects browser back to index if the cookie is not present*/
	exit();
}
?>
<!doctype html>
<html>
	<head>
		<link type="text/css" rel="stylesheet" href="mycourses.css"/>
		<link type="text/css" rel="stylesheet" href="tabs.css"/>
		<title>mycourses</title>
	</head>
	<body>
		<div id="header">
				<h1 id="PeerPhinder">PeerPhinder</h1>
				<img src="Pictures/PeerPhinderLogo.png" id="photo"/>
				<div id="largetab">
						<a href="mycourses.php"><h3 class="tabs blue" id="Mycourses">My Courses</h3></a>
						<a href="peers.php"><h3 class="tabs orange" id="Peers">Peers</h3></a>
						<a href="profilepage.php"><h3 class="tabs blue" id="Myprofile">My Profile</h3></a>
						<a href="aboutus.html"><h3 class="tabs orange" id="aboutus">About Us</h3></a>
						<a href="search.html"><h3 class="tabs blue" id="search">search</h3></a>
						<a href="logout2.php"><h3 class="tabs orange" id="logout">logout</h3></a>
				</div>
		</div>
		<div class="main">
			<h1 id="mycoursesmain">My Courses</h1>
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
						<!-- if we cant get a program to automatically fill out the table for us, we will have to code a row for the maximum number of CRN codes somebody can have at one time -->
					</tr>
				</tbody>
			<a id="enterCRNS" href="classinput.php">To enter or change classes click here</a>
			
		</div>
	</body>
</html>