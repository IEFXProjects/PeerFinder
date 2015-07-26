<?php
error_reporting(E_ALL);
session_start();
$_SESSION["breakfast"]= "waffle";
?>
<html>
	<body>
	<a href="test2.php"><?php echo "test2";?></a>
	</body>
</html>