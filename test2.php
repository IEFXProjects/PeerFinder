<?php
include ($_SERVER['DOCUMENT_ROOT'].'/functions.php');
sessionpage();
retrieveUserInfo();
print_r($UniqueUser);
?>