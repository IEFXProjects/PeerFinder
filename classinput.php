<?php
require 'functions.php';
sessionpage();
retrieveUserInfo();
?>
<html>
	<header>
		<link type="text/css" rel="stylesheet" href="classinput.css"/>
		<link type="text/css" rel="stylesheet" href="tabs.css"/>
	</header>
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
		<a id="goback" href="mycourses.php">Go back</a>
		<p class="space"></p>
		<div id="enterdelete">
			<div id="entercrn">
				<h1>Add Class</h1>
				<p id="message">Enter your CRN codes here<br> We will fill in the rest<br> of your class information<br>automatically<br></p>
				<form action="classinput.py">
				<input id="add" type="text" placeholder="CRNcode" name="CRN1">
				<input type="submit" value="add">
			</div>
			<div id="deletecrn">
				<h1>Delete Class</h1>
				<p id="message"> Enter your CRN code here<br> We will delete<br> the class<br> from your profile</p>
				<form action="classdelete.py">
				<input type="text" placeholder="CRNcode" name="dCRN">
				<input type="submit" value="delete">
			</div>
		</div>
		<p class="space"></p>
		<div class="main">
			<h1 id="mycoursesmain">My Courses</h1>
				<table>
					<thead>
						<tr>
							<th class="tableh tabler">CRN</th>
							<th class="tableh tabler">Class</th>
							<th class="tableh tabler">Time</th>
							<th class="tableh tabler">Professor</th>
							<th class="tableh">Location</th>
						</tr>
					</thead>
				
				<tbody>
					<?php
						$numclasses= count($CLasses);
						$count=0;
						while ($count< $numclasses+1) {
						echo "<tr>
							<td class=\"tabler tableb\">$CLasses[$count]
							</td>
						</tr>";
						$count= $count+1;
						}
					?>
				</tbody>
			</table>				
		</div>		
	</body>