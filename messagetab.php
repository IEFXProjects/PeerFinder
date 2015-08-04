<?php 
require 'functions.php';
sessionpage();
retrieveUserInfo();
?>
<html>
	<header>
		<link type="text/css" rel="stylesheet" href="messagetab.css"/>
		<link type="text/css" rel="stylesheet" href="tabs.css"/>
	</header>
	<body>
		<div id="header">
			<h1 id="PeerPhinder">PeerPhinder</h1>
			<img src="Pictures/PeerPhinderLogo.png" id="photo"/>
				<div id="largetab">
						<a href="mycourses.php"><h3 class="tabs blue" id="Mycourses">My Courses</h3></a>
						<a href="Peers.php"><h3 class="tabs orange" id="Peers">Peers</h3></a>
						<a href="Profilepage.php"><h3 class="tabs blue" id="Myprofile">My Profile</h3></a>
						<a href="messagetab.php"><h3 class="tabs color" id="messages">Messages</h3></a>
						<a href="aboutus.html"><h3 class="tabs orange" id="aboutus">About Us</h3></a>
						<a href="search.php"><h3 class="tabs blue" id="search">search</h3></a>
						<a href="logout2.php"><h3 class="tabs orange" id="logout">logout</h3></a>
				</div>
		</div>
		<div id="newmessage">
			<form method="POST" action="https://web125.secure-secure.co.uk/peerphinder.com/messages.php">
			Who are you sending this message to?
			<input type="text" placeholder="UserName" name="receiver"><br>
			<textarea name="messagecontent" rows="25" cols="80" placeholder="Type your message here"></textarea>
			<input type="submit" value="Send">
		</form>
		</div>
		<div id="content">
			<div id="sent">
				<p id="sent">Sent Mail</p>
				<?php if(!empty($SEnt)): ?>
					<table>
						<tr>
							<th>Sent To</th>
							<th>Message</th>
						</tr>
						<?php 
						$numsent= count($SEnt);
						$count=0;
						?>
						<?php while($count<$numsent): ?>
						<?php $peer= $SEnt[$count][0];
							  $message= $SEnt[$count][1];
						  ?>
							<tr>
								<td><?php print_r($peer); ?></td>
								<td><?php print_r($message); ?></td>
							</tr>
						<?php endwhile; ?>
					</table>
				<?php else: ?>
					<br>
					<p>You have not sent any mail</p>
				<?php endif; ?>
			</div>
			<div id="received">
				<p id="received">Received Mail</p>
				<?php if(!empty($Received)): ?>
					<table>
						<tr>
							<th>Sent By</th>
							<th>Message</th>
						</tr>
						<?php 
						$numreceived= count($REceived);
						$count=0;
						?>
						<?php while($count<$numreceived): ?>
						<?php $peer= $REceived[$count][0];
							  $message= $REceived[$count][1];
						  ?>
							<tr>
								<td><?php print_r($peer); ?></td>
								<td><?php print_r($message); ?></td>
							</tr>
						<?php endwhile; ?>
					</table>
				<?php else: ?>
					<br>
					<p>You do not have any incoming mail</p>
				<?php endif; ?>
			</div>
		</div>
	</body>
</html>