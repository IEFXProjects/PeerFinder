<?php 
require 'functions.php';
sessionpage();
retrieveUserInfo();

$Search=$_SESSION[SEarch];
$userCRN= $_SESSION[userCRN];
?>
<html>
	<header>
		<link type="text/css" rel="stylesheet" href="search.css"/>
		<link type="text/css" rel="stylesheet" href="tabs.css"/>
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
		<form method="POST" action="https://web125.secure-secure.co.uk/peerphinder.com/searchprocessing.php">
			<input type="radio" name="searchType" value="CRN" checked>search by CRN code
			<br>
			<input type="radio" name="searchType" value="UserName">search by UserName
			<input type="text" placeholder="search" name="searchTerm">
			<input type="submit" value="search">
		</form>
		<?php if(!empty($Search)): ?>
			<p id="highlight"><FONT style="BACKGROUND-COLOR: yellow">Highlighted Classes</FONT> are the ones you have in common</p><br>
			<p>Note: We are matching based on CRN.  If you notice anything inappropriate or inaccurate about someone else's profile, please notify us and we will review the issue.</p>
					<table>
				<thead>
					<tr><h1>
						<th class="tableh tabler">Username</th>
						<th class="tableh tabler">Add button</th>
						<th class="tableh tabler">Classes</th>
						</h1>
					</tr>
				</thead>
				<tbody>
					<?php
					$numsearchresults= count($Search); 
					$count= 0;					
					?>
						<?php while ($count< $numsearchresults): ?>
						<?php
							$peer= $Search[$count][0];
							$count5=0;
									$numpeerclasses= count($Search[$count][1]);
									$classdisplayarray=array();
									while($count5<$numpeerclasses) {
										if (in_array($Search[$count][1][$count5][0], $userCRN)) {
											$classdisplayarray[$count5]= "<FONT style=\"BACKGROUND-COLOR: yellow\">" . $Search[$count][1][$count5][1] . "</FONT>" . '(' . $Search[$count][1][$count5][0] . ')';
										}
										else {
											$classdisplayarray[$count5]= $Search[$count][1][$count5][1] . '(' . $Search[$count][1][$count5][0] . ')';
										}
										$count5=$count5+1;
									}
									//the above while loop creates an array with each value being Class Name(CRN code)
								$classdisplaystring= implode("; ", $classdisplayarray); 
								//the implode merges all of the classes together from the while loop to create a string that will be displayed
						?>
						<tr>
							<td>
								<div id="Usernames"><?php print_r($peer) ?></div> 
							</td>
							<td>
								<div id="addPeerbutton">
									
									<form method="POST" action="Peeradd.php">
										<input type="hidden" name="NewFriend" value="<?php print_r($peer); ?>" />
										<input type="submit" name="submit" value="Add to my Peers list">
									</form>
									<!-- Must use a form to send data to script using POST -->
								</div>
							</td>
						<!-- the above code should take the results from the search and display in the first cell the username and a button that adds the user to their peer favorites list on the peers.php tab -->
							<td>
								<?php 
									print_r($classdisplaystring);
								?>
							</td>
						</tr>
						<?php $count= $count+1; ?>
						<?php endwhile ?>
			</tbody>
			</table>	
			<?php else: ?>
				<p>
					<?php 
						if($noresults== TRUE) {
							print_r("We could not find any match for that.  Please ensure that you typed it correctly and try again");
						}
						else {
							print_r("Use the search bar above to find people who are in the same classes that you are");
						}
					?>
				</p>
			<?php endif; ?>
	</body>
</html>