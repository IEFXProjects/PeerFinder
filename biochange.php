<?php
require 'functions.php';
sessionpage();
retrieveUserInfo();
?>
<html>
	<head>
		<script src="texteditorfunctions.js"></script>
		<link type="text/css" rel="stylesheet" href="tabs.css"/>
		<title> Edit Biography </title>
	</head>
	<body onLoad="iFrameOn();">
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
		<form action="bioupdate.php" name="myform" id="myform" method="post">
		<p>Enter your text here!  Use the buttons below for formatting<br>
		<div id="wysiwyg_cp" style="padding:8px; width:700px;">
		  <input type="button" onClick="iBold()" value="Bold"> 
		  <input type="button" onClick="iUnderline()" value="Underline">
		  <input type="button" onClick="iItalic()" value="Italicize">
		  <input type="button" onClick="iFontSize()" value="Text Size">
		  <input type="button" onClick="iForeColor()" value="Text Color">
		  <input type="button" onClick="iUnorderedList()" value="Numbered List">
		  <input type="button" onClick="iOrderedList()" value="Bullets">
		</div>
		<!-- Hide(but keep)your normal textarea and place in the iFrame replacement for it -->
		<textarea style="display:none;" name="myTextArea" id="myTextArea" cols="100" rows="14">
			<?php
				if ($bio != 0) {
					echo $bio;
				}		
			?>
		</textarea>
		<iframe name="richTextField" id="richTextField" style="border:#000000 1px solid; width:700px; height:300px;"></iframe>
		<!-- End replacing your normal textarea -->
		</p>
		<br /><br /><input name="myBtn" type="button" value="Submit Data" onClick="javascript:submit_form();"/>
		</form>
	</body>
</html>