<?php
header('Content-type: image/' . $Profile_Picture);
readfile('../UserPictureUploads/' . $UniqueUser . $Profile_Picture);
?>