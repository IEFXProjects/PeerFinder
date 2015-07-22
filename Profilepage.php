<?php
session_start();
session_regenerate_id(true);
?>
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
						<a href="profilepage.php"><h3 class="tabs blue" id="Myprofile">My Profile</h3></a>
						<a href="aboutus.html"><h3 class="tabs orange" id="aboutus">About Us</h3></a>
						<a href="search.html"><h3 class="tabs blue" id="search">search</h3></a>
						<a href="logout2.php"><h3 class="tabs orange" id="logout">logout</h3></a>
				</div>

		</div>
		<div id="pageinfo">
			<p id="message">This page is what other users will see when they view you</p>
			<div id="name">
				<p class="name"><?php $_SESSION["session_USER_info"][3]?></p>
				<p class="name"><?php $_SESSION["session_USER_info"][4]?></p>
				<p class="name"><?php $_SESSION["session_USER_info"][5]?></p>
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
			