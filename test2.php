<?php
require 'functions.php';
sessionpage();
retrieveUserInfo();

$target_dir = "../UserPictureUploads/";
$image_name= $_FILES['fileToUpload']['name'];
$image_type= $_FILES['fileToUpload']['type'];
$image_size= $_FILES['fileToUpload']['size'];
$image_tmp_name= $_FILES['fileToUpload']['tmp_name'];
$error= $_FILES['fileToUpload']['error'];

if (!empty($error)) {
	die("There was an error adding your picture. Please try again");
}

move_uploaded_file($image_tmp_name, $target_dir . basename($UniqueUser));

?>