<?php 
require 'functions.php';
sessionpage();
retrieveUserInfo();







if(isset($_POST[searchTerm]) AND isset($_POST[searchType])) {
$Input= $_POST[searchTerm];
$Radio= $_POST[searchType];


if ($Radio != "UserName" or $Radio != "CRN"){
	die("there was an error please try again");
}
if($Radio==="CRN"){
	if (!(ctype_digit($CRN))) {
		die("CRN needs to be composed of only numbers. You inputed:  " . $CRN);
	}
	if (strlen($CRN) != 7) {
		die("CRN needs to be 7 numbers long. You inputed " . strlen($CRN));
	}
}

$Radio=mysqli_real_escape_string($conn, $Radio);
require 'DBconnection.php';
$query= mysqli_query($conn, "SELECT UserName and Classes FROM UserInfo");
$fetcharray= $query->fetch_array();
mysqli_close($conn);
if ($Radio==="CRN") {
	$count=0;
	$length= count($fetcharray[1]);
	
	while ($count < $length) {
		$count2=0;
		$results=array();
		while($count2<$classlength) {
				$search= array_search($Input, $fetcharray[1][$count]);
				if (empty($search)) {
					array_push($results, array($fetcharray[0][$count],$fetcharray[1][$search]));
				}
			$count2=$count2+1;
		}

		$count=$count+1;
	}
}
if($Radio==="UserName") {
$results=array();
$count=0
while($count< count(fetcharray[0])) {
	$search= array_search($Input, $fetcharray[0][$count]);
	if(!empty($search)) {
		array_push($results, array(fetcharray[0][$search], fetcharray[1]);
	}
	$count+1;
}
}
}









//HEY Kemraj... when you write the Search function can you please add it to the database in a serialized representation of this $SEarch= array( array(username, array(classes in common)), array(...),...)
// If you output it like this, the code below should work for displaying the results.
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
		<?php if(!empty($SEarch)): ?>
					<table>
				<thead>
					<tr>
						<th class="tableh tabler">Username</th>
						<th class="tableh tabler">Classes in common</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$numsearchresults= count($SEarch); $count= 0; 

					
					?>
						<?php while ($count< $numsearchresults): ?>
						<?php
							$peer= $SEarch[$count][0];
							$classesincommon= $SEarch[$count][1];
						?>
						<tr>
							<td>
								<div id="Usernames"><?php print_r($peer     ) ?></div> 
								<!-- Leave spaces in the php print_r in order to separate username from button -->
								<div id="addPeerbutton">
									<?php $peer= $SEarch[$count][0]; ?>
									
									<form method="POST" action="Peeradd.php">
										<input type="hidden" name="NewFriend" value="<?php print_r($peer); ?>" />
										<input type="submit" name="submit" value="Add to my Peers list">
									</form>
									<!-- Must use a form to send data to script using POST -->
								</div>
							</td>
						<!-- the above code should take the results from the search and display in the first cell the username and a button that adds the user to their peer favorites list on the peers.php tab -->
							<td>
								<?php print_r(implode(",", $classesincommon)); ?>
							</td>
						</tr>
						<?php $count= $count+1; ?>
						<?php endwhile ?>
						<!-- The while statement is around the row tags so that the program will repeat the display code row by row until all of the seach results have been shown.  This will continue to run until the user either cancels the browser load or it finishes.  Kemraj you might want to add something where it only calculates like 100 per time and then they could click a button to show more. -->
			</tbody>
			</table>	
			<?php else: ?>
				<p>Use the search bar above to find people who are in the same classes that you are</p>
			<?php endif; ?>
	</body>
</html>