<?php
	require 'functions2.php';
	sessionpage();
	retrieveUserInfo();
	UserSchedule($UniqueUser);
	$breakfast= $_POST['time1'];
	$lunch=$_POST['time2'];
	$dinner=$_POST['time3'];
	$breaktime=$_POST['chooseMH1'];
	$lunchtime=$_POST['chooseMH2'];
	$dinnertime=$_POST['chooseMH3'];

	require '$DBconnection2.php';
	$query=mysqli_query($conn2, "SELECT Meals FROM Events WHERE Username='$UniqueUser'");
	$fetch= $query->fetch_array(MYSQLI_ASSOC);
	$meals= unserialize($fetch[0]);
	$nummeals=count($meals);
	if($nummeals=0) {
		$meals=array( 'breakfast'=>NULL, 'lunch'=>NULL, 'dinner'=>NULL);
	}
	if (isset($_POST['time1'])) {
		$meals['breakfast']= array($breakfast, $breaktime);
	}
	$nummeals=count($meals);
	elseif (isset($_POST['time2'])) {
		$meals['lunch']=array($lunch, $lunchtime);
	}
	$nummeals=count($meals);
	elseif (isset($_POST['time3'])) {
		$meals['dinner']=array($dinner, $dinnertime);
	}
	$nummeals=count($meals);
	else {
		die("Nothing was entered please try again");
	}
	$serialize=serialize($meals);
	$sql="INSERT INTO Events(Meals) VALUES('$serialize') WHERE Username= '$UniqueUser'";
	if ($conn2->query($sql)){
		mysqli_close($conn2);
		header("Location:https://web125.secure-secure.co.uk/peerphinder.com/schedule/home.html");
	}
	else{
	die("Connection failed dummy" . $conn2->connect_error);
	}
	//converts form data to variables
	
	?>
