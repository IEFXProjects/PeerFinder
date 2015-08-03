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
		<form name="Photoform" action="https://web125.secure-secure.co.uk/peerphinder.com/test2.php" enctype="multipart/form-data" method="POST">
			Profile Picture:
			<?php if($Profile_Picture !== "NULL"):?>
				<img src="../UserPictureUploads/<?php print_r($UniqueUser); ?>"/><br>
				
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
</body>
</html>