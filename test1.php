<?php
$insidearray= array("waffle", "computer", "CAT");
$array= array("potato", "narwal", "kitten", $insidearray);
$serialize= serialize($array);
require 'DBconnection.php';
$input= mysqli_query($conn, "UPDATE UserInfo SET Classes='$serialize' WHERE Email= 'iglue@horse.com'");
mysqli_close($conn);
require'DBconnection.php';
$result= mysqli_query($conn, "SELECT Classes FROM UserInfo WHERE Email='iglue@horse.com'");
$row = $result->fetch_array(MYSQLI_NUM);
mysqli_close($conn);
print_r($row);
$rowunserialized= unserialize($row[0]);
print_r($rowunserialized);
?>