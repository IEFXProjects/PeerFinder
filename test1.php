<?php
require 'functions.php';
sessionpage();
retrieveUserInfo();
$peer= "fishtacosyuck";
?>
<html>
<?php $count=0; ?>
<?php while($count<= count($PEers)): ?>
<?php $peer= $PEers[$count]; ?>
<form method="POST" action="Peeradd.php">
	<input type="hidden" name="NewFriend" value="<?php echo $peer; ?>" />
	   <input type="submit" name="submit" value="Add to my Peers list">
</form>
<?php $count= $count+1; ?>
<?php endwhile ?>
</html>
