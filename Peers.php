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
		<link type="text/css" rel="stylesheet" href="peers.css"/>
		<link type="text/css" rel="stylesheet" href="tabs.css"/>
		<title>Peers</title>
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
		<div id="pagehead">
			<a href="search.php" id="findpeers">Click here to find your peers</a>
		</div>
		<div id="table">
			<table>
				<thead>
					<tr>
						<th class="tableh">Your Peers</th>
						<th class="tableh">Common Classes</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td class="tablep">Peer1</td>
						<td class="tablec">Common_class1</td>
					</tr>
				</tbody>
	</body>
</html>