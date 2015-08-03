<?php 
	require 'functions.php';
	sessionpage();
	retrieveUserInfo();
	
	$confirmation= "0";
	if (isset($_SESSION['photouploadconfirm'])) {
		$confirmation= $_SESSION['photouploadconfirm'];
	}
	
?>
<html>
<head>
</head>
<body>
	<h3>Use the input boxes next to your Information to change it.</h3>
	<h3 strong>YOU MUST CLICK CHANGE AFTER EACH MODIFICATION<br> All at once will not work</h3>
	<h4>Profile Picture</h4>
		<p><?php 
				if ($Profile_Picture =="NULL") {
					print_r("No Picture on record");
				}
			?>
		</p>
		<form name="Photoform" action="https://web125.secure-secure.co.uk/peerphinder.com/PhotoUpload.php" enctype="multipart/form-data" method="POST">
			Profile Picture:
			<?php if($Profile_Picture !== "NULL"):?>
				<img src="Pictures/UserPictureUploads/<?php print_r($UniqueUser); print_r($Profile_Picture); ?>"><br>
				<?php
				
				if($confirmation=="1") {
					echo"<h4> Your Photo has been Uploaded Successfully</h4>";
					unset($_SESSION['photouploadconfirm']);
					unset($confirmation);
				}
				
				?>
			<?php else: ?>
				<img src="Pictures/Photoplaceholder.png"/>
			<?php endif; ?>
			<input type="file" name="fileToUpload"/>
			<input type="submit" name="submit" value="Upload"/>
		</form>
	<h4>Username</h4>
		<p><?php print_r($user_name);?></p>
			<form  name="CUsername" action="https://web125.secure-secure.co.uk/peerphinder.com/accountchangeprocessing.php" method="post">
			<input type="text" name="CUsername"><br>
			<input type="submit" name="submit" value="Change">
			</form>
	<h4>Email</h4>
		<p><?php print_r($EMail);?></p>
			<form  name="CEmail" action="https://web125.secure-secure.co.uk/peerphinder.com/accountchangeprocessing.php" method="post">
			<input type="text" name="CEmail"><br>
			<input type="submit" name="submit" value="Change">
			</form>
	<h4>Password</h4>
			<form  name="CPassword" action="https://web125.secure-secure.co.uk/peerphinder.com/accountchangeprocessing.php" method="post">
			Old Password<input type="text" name="COldPassword"><br>
			New Password<input type="text" name="CNewPassword"><br>
			<input type="submit" name="submit" value="Change">
			</form>
	<h4>First Name</h4>
		<p><?php print_r($FirstName);?></p>
			<form  name="CFirstName" action="https://web125.secure-secure.co.uk/peerphinder.com/accountchangeprocessing.php" method="post">
			<input type="text" name="CFirstName"><br>
			<input type="submit" name="submit" value="Change">
			</form>
	<h4>Middle Name</h4>
		<p><?php 
				if ($MiddleName !== NULL) {
					print_r($MiddleName);
				}
				else {
					print_r("Middle Name not on record");
				}
			?>
		</p>
			<form  name="CMiddleName" action="https://web125.secure-secure.co.uk/peerphinder.com/accountchangeprocessing.php" method="post">
			<input type="text" name="CMiddleName"><br>
			<input type="submit" name="submit" value="Change">
			</form>
	<h4>Last Name</h4>
		<p><?php 
				if ($LastName !== NULL) {
					print_r($LastName);
				}
				else {
					print_r("Last Name not on record");
				}
			?>
		</p>
			<form  name="CLastName" action="https://web125.secure-secure.co.uk/peerphinder.com/accountchangeprocessing.php" method="post">
			<input type="text" name="CLastName"><br>
			<input type="submit" name="submit" value="Change">
			</form>
	<h4>Phone Number</h4>
		<p><?php 
				if ($Phone_Number !== NULL) {
					print_r($Phone_Number);
				}
				else {
					print_r("No phone number on record");
				}
			?>
		</p>
			<form  name="CPhoneNumber" action="https://web125.secure-secure.co.uk/peerphinder.com/accountchangeprocessing.php" method="post">
			<input type="text" name="CPhoneNumber"><br>
			<input type="submit" name="submit" value="Change">
			</form>
	<h4>College</h4>
		<p><?php 
				if ($College !== NULL) {
					print_r($College);
				}
				else {
					print_r("No college on record");
				}
			?>
		</p>
			<form  name="CCollege" action="https://web125.secure-secure.co.uk/peerphinder.com/accountchangeprocessing.php" method="post">
			<input type="text" name="CCollege"><br>
			<input type="submit" name="submit" value="Change">
			</form>
	<h4>Major</h4>
		<p><?php 
				if ($Major !== NULL) {
					print_r($Major);
				}
				else {
					print_r("No Major on record");
				}
			?>
		</p>
			<form  name="CMajor" action="https://web125.secure-secure.co.uk/peerphinder.com/accountchangeprocessing.php" method="post">
			<input type="text" name="CMajor"><br>
			<input type="submit" name="submit" value="Change">
			</form>
	<h4>Minor</h4>
		<p><?php 
				if ($Minor !== NULL) {
					print_r($Minor);
				}
				else {
					print_r("No Minor on record");
				}
			?>
		</p>
			<form  name="CMinor" action="https://web125.secure-secure.co.uk/peerphinder.com/accountchangeprocessing.php" method="post">
			<input type="text" name="CMinor"><br>
			<input type="submit" name="submit" value="Change">
			</form>
</body>
</html>