<?php 
unset($cookie_name['UserName']);
setcookie($cookie_name, $info, time() - 3600, "/");
//note: copy this text into html rather than referencing the page
?>