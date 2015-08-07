<?php
require 'functions.php';
sessionpage();
retrieveUserInfo();
if(!empty($PEers)) {
	$friendClasses=array();
	$PEers=array_values($PEers);
	require 'DBconnection.php';
	$peerfullinfo= array();
	foreach($PEers as $value=>$key) {
		$query= mysqli_query($conn, "SELECT Classes FROM UserInfo Where UserName='$key'");
		$fetch= mysqli_fetch_array($query);
		$fetch=array_values($fetch);
		$fetch= $fetch[0];
		$fetch=unserialize($fetch);
		$friendClasses[$value][0]= $key;
		if(is_array($fetch)) {
			foreach($fetch as $value2=>$key2) {
				$friendCRN= $fetch[$value2][0];
				$friendClassName= $fetch[$value2][1];
				$friendClasses[$value][1][$value2]= array($friendCRN, $friendClassName);
			}
		}
		else {
			$friendClasses[$value][1]= array();
		}
	}
	//the above double foreach statement finds the user that you are friends with and pulls his/her latest Class information and places it into an array structure
	//friendClasses= array( eachuserarray( Username, array(class(friendCRN, friendClassname), newclass(...,...),...)), ...)
}

$userCRN=array();
if(!empty($CLasses)) {
	$count3=0;
	$numuserclasses= count($CLasses);
	while($count3<$numuserclasses) {
		if(isset($CLasses[$count3][0])) {
			array_push($userCRN, $CLasses[$count3][0]);
			$userCRN=array_values($userCRN);
			$count3=$count3+1;
		}
	}
}
//the above code needs to give an array of all of the user's CRNs by themeselves so that we can compare with peers list and highlight below




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
			<p id="highlight"><FONT style="BACKGROUND-COLOR: yellow">Highlighted Classes</FONT> are the ones you have in common</p>
			<table>
				<thead>
					<tr>
						<th class="tableh tabler">Username</th>
						<th class="tableh tabler">Change Peer Status</th>
						<th class="tableh tabler">Classes</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$numpeers= count($PEers); 
					$count= 0; 
					?>
						<?php while ($count< $numpeers): ?>
						<?php
							$peer= $friendClasses[$count][0];
							$PeerClasses= $friendClasses[$count][1];
						?>
						<tr>
							<td>
								<?php print_r($peer);?> 
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
								<?php
									$count2=0;
									$numpeerclasses= count($friendClasses[$count][1]);
									$classdisplayarray=array();
									while($count2<$numpeerclasses) {
										if (in_array($friendClasses[$count][1][$count2][0], $userCRN)) {
											$classdisplayarray[$count2]= "<FONT style=\"BACKGROUND-COLOR: yellow\">" . $friendClasses[$count][1][$count2][1] . "</FONT>" . '(' . $friendClasses[$count][1][$count2][0] . ')';
										}
										else {
											$classdisplayarray[$count2]= $friendClasses[$count][1][$count2][1] . '(' . $friendClasses[$count][1][$count2][0] . ')';
										}
										$count2=$count2+1;
									}
									//the above while loop creates an array with each value being Class Name(CRN code)
								$classdisplaystring= implode("; ", $classdisplayarray); 
								//the implode merges all of the classes together from the while loop to create a string that will be displayed
								print_r($classdisplaystring);?>
							</td>
						</tr>
						<?php $count= $count+1; ?>
						<?php endwhile ?>
						<!-- the overall while loop will change the data for each row in the table -->
			</tbody>
			</table>	
		<?php else: ?>
			<p> You have not added any friends... yet</p>
		<?php endif; ?>
	</body>
	
	<!--<FONT style="BACKGROUND-COLOR: yellow">next </FONT> -->
</html>