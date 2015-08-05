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
							<a href="mycourses.php"><h3 class="tabs bgreen" id="Mycourses">My Courses</h3></a>
							
							<a href="Peers.php"><h3 class="tabs red" id="Peers">Peers</h3></a>
							<a href="Profilepage.php"><h3 class="tabs yellow" id="Myprofile">My Profile</h3></a>
							<a href="messagetab.php"><h3 class="tabs messagecolor" id="messages">Messages</h3></a>
							<a href="aboutus.html"><h3 class="tabs orange" id="aboutus">About Us</h3></a>
							<a href="search.php"><h3 class="tabs blue" id="search">search</h3></a>
							<a href="logout2.php"><h3 class="tabs green" id="logout">logout</h3></a>
			</div>
		</div>
		<div id="pagehead">
			<a href="search.php" id="findpeers">Click here to find your peers</a>
		</div>
		<div id="table">
		<?php if (!empty($PEers)): ?>
			<table>
				<thead>
					<tr>
						<th class="tableh tabler">Username</th>
						<th class="tableh tabler">Classes in Common</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$numpeers= count($PEers); 
					$count= 0; 
					?>
						<?php while ($count< $numpeers): ?>
						<?php
							$peer= $SEarch[$count][0];
							$classesincommon= $PEers[$count][1];
						?>
						<tr>
							<td>
								<?php print_r($peer); print_r($count); ?> 
							</td>
							<td>
								<form method="POST" action="peerdelete.php">
									<input type="hidden" name="ByeFriend" value="<?php print_r($peer); ?>" />
									<input type="submit" name="submit" value="Delete from my Peers list">
								</form>
								<!-- Must use a form to send data to script using POST -->
							</td>
						<!-- the above code should take the results from the search and display in the first cell the username and a button that adds the user to their peer favorites list on the peers.php tab -->
							<td>
								<?php $classincommonlist= implode(", ", $classesincommon); 
								print_r($classincommonlist);?>
							</td>
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