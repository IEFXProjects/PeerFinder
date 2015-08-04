<?php 
require 'functions.php';
sessionpage();
retrieveUserInfo();



if(isset($_POST[searchTerm]) AND isset($_POST[searchType])) {
	$Input= $_POST[searchTerm];
	$Radio= $_POST[searchType];
	if ($Radio != "UserName" AND $Radio != "CRN"){
		die("there was an error please try again");
	}
	if($Radio==="CRN"){
		if (!(ctype_digit($Input))) {
			die("CRN needs to be composed of only numbers. You inputed:  " . $Input);
		}
		if (strlen($Input) != 7) {
			die("CRN needs to be 7 numbers long. You inputed " . strlen($Input));
		}
	}
	
	require 'DBconnection.php';
	$Radio=mysqli_real_escape_string($conn, $Radio);
	$Input=mysqli_real_escape_string($conn, $Input);

	$query= mysqli_query($conn, "SELECT UserName, Classes FROM UserInfo");
	$fetcharray= mysqli_fetch_all($query, MYSQLI_NUM);
	$numquery= mysqli_num_rows($query);
	mysqli_close($conn);
	$count=0;
	while($count<$numquery) {
		$look= $fetcharray[$count][1];
		if(!empty($look)) {
			$fetcharray[$count][1]= unserialize($look);
		}	
		$count=$count+1;
	}
	if ($Radio=="CRN") {
		$count=0;
		$length= count($fetcharray);
		$Search=array();
		while ($count < $length) {
			$numclasses= count($fetcharray[$count][1]);
			$count2=0;
			while($count2<$numclasses) {
				if(!empty($fetcharray[$count][1])) {
					$search= array_keys($fetcharray[$count][1][$count2], $Input);
					if (!empty($search)) {
						$classresults=array();
						$count6=0;
						while($count6<$numclasses) {
							$userclass= $fetcharray[$count][1][$count6][0];
							array_push($classresults, $userclass);
							$count6=$count6+1;
						}
						$Search[$count]=array($fetcharray[$count][0], $classresults);
					}
				}
				$count2=$count2+1;
				}
			$count=$count+1;
		}
		
	}
	if($Radio=="UserName") {
		$Search=array();
		$count=0;
		while($count< count($fetcharray)) {
			if(!empty($fetcharray[$count][0])) {
				$search=array();
				if($fetcharray[$count][0]==$Input) {
					$searchnumclasses= count($fetcharray[$count][1]);
					$searchclasses= array();
					$count10= 0;
					while($count10<$searchnumclasses) {
						$eachclass=$fetcharray[$count][1][$count10][0];
						array_push($searchclasses, $eachclass);
						$count10=$count10+1;
					}
					$Search[$count]=array($fetcharray[$count][0], $searchclasses);
					array_push($search, $fetcharray[$count][0]);
				}
			}
		$count= $count+1;
		} 
	}
}
$Search=array_values($Search);
if ($Search=== array()) {
	$noresults= TRUE;
}
//this resets the numbering of the array... it was getting some funky numbers but this seems to fix it
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
						<a href="mycourses.php"><h3 class="tabs blue" id="Mycourses">My Courses</h3></a>
						<a href="Peers.php"><h3 class="tabs orange" id="Peers">Peers</h3></a>
						<a href="Profilepage.php"><h3 class="tabs blue" id="Myprofile">My Profile</h3></a>
						<a href="aboutus.html"><h3 class="tabs orange" id="aboutus">About Us</h3></a>
						<a href="search.php"><h3 class="tabs blue" id="search">search</h3></a>
						<a href="logout2.php"><h3 class="tabs orange" id="logout">logout</h3></a>
				</div>
		</div>
		<form method="POST" action="https://web125.secure-secure.co.uk/peerphinder.com/search.php">
			<input type="radio" name="searchType" value="CRN" checked>search by CRN code
			<br>
			<input type="radio" name="searchType" value="UserName">search by UserName
			<input type="text" placeholder="search" name="searchTerm">
			<input type="submit" value="search">
		</form>
		<?php if(!empty($Search)): ?>
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
							print_r($Search[$count][1]);
							$classesincommon= implode(",", $Search[$count][1]);
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
									print_r($classesincommon);
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