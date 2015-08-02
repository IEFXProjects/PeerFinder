<?php
require 'functions.php';
sessionpage();
retrieveUserInfo();
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
						<a href="Peers.php"><h3 class="tabs orange" id="Peers">Peers</h3></a>
						<a href="Profilepage.php"><h3 class="tabs blue" id="Myprofile">My Profile</h3></a>
						<a href="aboutus.html"><h3 class="tabs orange" id="aboutus">About Us</h3></a>
						<a href="search.php"><h3 class="tabs blue" id="search">search</h3></a>
						<a href="logout2.php"><h3 class="tabs orange" id="logout">logout</h3></a>
				</div>

		</div>
		<div id="pageinfo">
			<p id="message">This page is what other users will see when they view you</p>
			<div id="name">
				<p class="name"><?php print_r($FirstName); ?></p>
				<p class="name"><?php print_r($MiddleName); ?></p>
				<p class="name"><?php print_r($LastName); ?></p>
			</div>
			<div id="biography">
				<p> biography</p>
				<p id="biotext"><?php echo $bio;?></p>
				<a href="biochange.php" id="biochange">
					<?php 
						if ($bio !=0) {
							echo "click here to make changes to your biography";
						}
						else {
							echo "click here to add a biography!";
						}
					?></a>
			</div>
			<img src="$Profile_Picture" id="ppic"/>
			<p id="space"></p> <!-- separates -->
			
			<?php if (!empty($CLasses)): ?>
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
					<?php $numclasses= count($CLasses); $count= 0; ?>
						<?php while ($count< $numclasses): ?>
						<tr>
							<?php
							$count2 = 0;

							while ($count2 <= 4) {
					//Change to 4 when CRN column is not shown
								print_r("<td class=\"tabler tableb\">" . $CLasses[$count][$count2+1] . "</td>");
								$count2= $count2 + 1;
							}
							?>
						</tr>
						<?php $count= $count+1; ?>
						<?php endwhile ?>
			</tbody>
			</table>	
			<?php else: ?>
			<p> This person has not added any classes yet</p>
			<?php endif; ?>
			<a href="https://web125.secure-secure.co.uk/peerphinder.com/schedule/home.html">GO schedule your life</a>
		</div>
	</body>
</html>			
