<?php
require 'functions.php';
sessionpage();
retrieveUserInfo();
$confirmation= $_SESSION['photouploadconfirm'];
?>
<html>
<head>
</head>
<body>
	<form name="Photoform" action="http://peerphinder.com/PhotoUpload.php" enctype="multipart/form-data" method="POST">
	Profile Picture:
	<?php if($Profile_Picture != NULL):?>
		<img src="../UserPictureUploads/<?php print_r($UniqueUser); ?>"/><br>
		
		<?php
		if($confirmation=1) {
		echo"<h4> Your Photo has been Uploaded Successfully</h4>";
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
