<html>
<head>
	<?php 
		require "functions.php";
		retrieveUserInfo();
	?>
</head>
<body>
	<h3>Use the input boxes next to your Information to change it.</h3>
	<h3 strong>YOU MUST CLICK CHANGE AFTER EACH MODIFICATION<br> All at once will not work</h3>
	<h4>Profile Picture</h4>
		<p><?php 
				if ($Profile_Picture != 0) {
					echo $Profile_Picture;
				}
				else {
					echo "No Picture on record";
				}
			?>
		</p>
			<form action="PhotoUpload.php" method="post" enctype="multipart/form-data">
				<input type="file" name="fileToUpload" id="fileToUpload">
				<input type="submit" value="Change" name="submit">
			</form>
	<h4>Username</h4>
		<p><?php echo $user_name;?></p>
			<form  name="CUsername" action="https://web125.secure-secure.co.uk/peerphinder.com/accountchangeprocessing.php" method="post">
			<input type="text" name="CUsername"><br>
			<input type="submit" name="submit" value="Change">
	<h4>Email</h4>
		<p><?php echo $EMail;?></p>
			<form  name="CEmail" action="https://web125.secure-secure.co.uk/peerphinder.com/accountchangeprocessing.php" method="post">
			<input type="text" name="CEmail"><br>
			<input type="submit" name="submit" value="Change">
	<h4>Password</h4>
			<form  name="CPassword" action="https://web125.secure-secure.co.uk/peerphinder.com/accountchangeprocessing.php" method="post">
			Old Password<input type="text" name="COldPassword"><br>
			New Password<input type="text" name="CNewPassword"><br>
			<input type="submit" name="submit" value="Change">
	<h4>First Name</h4>
		<p><?php echo $FirstName;?></p>
			<form  name="CFirstName" action="https://web125.secure-secure.co.uk/peerphinder.com/accountchangeprocessing.php" method="post">
			<input type="text" name="CFirstName"><br>
			<input type="submit" name="submit" value="Change">
	<h4>Middle Name</h4>
		<p><?php 
				if ($MiddleName != 0) {
					echo $MiddleName;
				}
				else {
					echo "Middle Name not on record";
				}
			?>
		</p>
			<form  name="CMiddleName" action="https://web125.secure-secure.co.uk/peerphinder.com/accountchangeprocessing.php" method="post">
			<input type="text" name="CMiddleName"><br>
			<input type="submit" name="submit" value="Change">
	<h4>Last Name</h4>
		<p><?php 
				if ($LastName != 0) {
					echo $LastName;
				}
				else {
					echo "Last Name not on record";
				}
			?>
		</p>
			<form  name="CLastName" action="https://web125.secure-secure.co.uk/peerphinder.com/accountchangeprocessing.php" method="post">
			<input type="text" name="CLastName"><br>
			<input type="submit" name="submit" value="Change">
	<h4>Phone Number</h4>
		<p><?php 
				if ($Phone_Number != 0) {
					echo $Phone_Number;
				}
				else {
					echo "No phone number on record";
				}
			?>
		</p>
			<form  name="CPhoneNumber" action="https://web125.secure-secure.co.uk/peerphinder.com/accountchangeprocessing.php" method="post">
			<input type="text" name="CPhoneNumber"><br>
			<input type="submit" name="submit" value="Change">
	<h4>College</h4>
		<p><?php 
				if ($College != 0) {
					echo $College;
				}
				else {
					echo "No college on record";
				}
			?>
		</p>
			<form  name="CCollege" action="https://web125.secure-secure.co.uk/peerphinder.com/accountchangeprocessing.php" method="post">
			<input type="text" name="CCollege"><br>
			<input type="submit" name="submit" value="Change">
	<h4>Major</h4>
		<p><?php 
				if ($Major != 0) {
					echo $Major;
				}
				else {
					echo "No Major on record";
				}
			?>
		</p>
			<form  name="CMajor" action="https://web125.secure-secure.co.uk/peerphinder.com/accountchangeprocessing.php" method="post">
			<input type="text" name="CMajor"><br>
			<input type="submit" name="submit" value="Change">
	<h4>Minor</h4>
		<p><?php 
				if ($Minor != 0) {
					echo $Phone_Number;
				}
				else {
					echo "No Minor on record";
				}
			?>
		</p>
			<form  name="CMinor" action="https://web125.secure-secure.co.uk/peerphinder.com/accountchangeprocessing.php" method="post">
			<input type="text" name="CMinor"><br>
			<input type="submit" name="submit" value="Change">
</body>
</html>