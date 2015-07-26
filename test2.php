<?php
error_reporting(E_ALL);
session_start();
print_r($_SESSION["breakfast"]);
$test2= $_SESSION["breakfast"];
print_r($test2);
?>
<html>
	<body>
	<a href="test1.php"><?php echo "test1";?></a>
	</body>
</html>