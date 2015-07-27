<?php
require 'functions.php';
sessionpage();
retrieveUserInfo();
?>
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
						<a href="Profilepage.php"><h3 class="tabs blue" id="Myprofile">My Profile</h3></a>
						<a href="aboutus.html"><h3 class="tabs orange" id="aboutus">About Us</h3></a>
						<a href="search.php"><h3 class="tabs blue" id="search">search</h3></a>
						<a href="logout2.php"><h3 class="tabs orange" id="logout">logout</h3></a>
				</div>
		</div>
		<div class="main">
			<h1 id="mycoursesmain">My Courses</h1>
						<?php if ($CLasses != 0): ?>
			<a href="classinput.php"> Click here to change your Class list</a>
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
			<?php else: ?>
			<p> This person has not added any classes yet</p>
			<?php endif; ?>
		</div>
	</body>
</html>