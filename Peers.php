<?php
require 'functions.php';
sessionpage();
retrieveUserInfo();
?>
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
					<a href="Peers.php"><h3 class="tabs orange" id="Peers">Peers</h3></a>
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
						<?php if ($PEers != 0): ?>
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
					<?php $numpeers= count($PEers); $count= 0; ?>
						<?php while ($count<= $numpeers): ?>
						<tr>
							<?php
							$count2 = 0;

							while ($count2 <= 2) {
								print_r("<td class=\"tabler tableb\">" . $PEers[$count][$count2] . "</td>");
								$count2= $count2 + 1;
							}
							?>
						</tr>
						<?php $count= $count+1; ?>
						<?php endwhile ?>
			</tbody>
			</table>	
			<?php else: ?>
			<p> You have not added any friends... yet</p>
			<?php endif; ?>
	</body>
</html>