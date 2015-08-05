	<?php
	require 'functions2.php';
	sessionpage();
	retrieveUserInfo();
	UserSchedule($UniqueUser);
	$FreeTImeOption=$_POST['FreeTime'];
	$chooseActnum=$_Post['chooseActnum'];
	$chooseMH=$_Post['chooseMH'];

	$count=0;
	$Act= array();
	while($count<=$chooseActnum){
		$Act[$count]=array($_POST['"Act" . ($count+1)'], $_POST['"time" . ($count+1)'];
		$count=($count+1);
	}
	
	$Act = mysqli_real_escape_string($conn2, $Act);
	$sql="INSERT INTO Events(Act)" VALUES('$Act');
	if ($conn2->query($sql)===TRUE){
	header("Location:https://web125.secure-secure.co.uk/peerphinder.com/schedule/home.html");
}
	else{
	die("Connection failed dummy" . $conn2->connect_error);
}
	//converts form data to variables
	mysqli_close($conn2);
