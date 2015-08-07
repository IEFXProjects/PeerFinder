<?php 
require 'functions.php';
sessionpage();
retrieveUserInfo();


if(isset($_POST[searchTerm]) AND isset($_POST[searchType])) {
	$Input= $_POST[searchTerm];
	$Radio= $_POST[searchType];
	if ($Radio != "UserName" AND $Radio != "CRN"){
		die("there was an error please try again");
	}
	if($Radio==="CRN"){
		if (!(ctype_digit($Input))) {
			die("CRN needs to be composed of only numbers. You inputed:  " . $Input);
		}
		if (strlen($Input) != 7) {
			die("CRN needs to be 7 numbers long. You inputed " . strlen($Input));
		}
	}
	
	require 'DBconnection.php';
	$Radio=mysqli_real_escape_string($conn, $Radio);
	$Input=mysqli_real_escape_string($conn, $Input);

	$query= mysqli_query($conn, "SELECT UserName, Classes FROM UserInfo");
	$fetcharray= mysqli_fetch_all($query, MYSQLI_NUM);
	$numquery= mysqli_num_rows($query);
	mysqli_close($conn);
	$count=0;
	while($count<$numquery) {
		$look= $fetcharray[$count][1];
		if(!empty($look)) {
			$fetcharray[$count][1]= unserialize($look);
		}	
		$count=$count+1;
	}
	if ($Radio=="CRN") {
		$count=0;
		$length= count($fetcharray);
		$Search=array();
		while ($count < $length) {
			$numclasses= count($fetcharray[$count][1]);
			$count2=0;
			while($count2<$numclasses) {
				if(!empty($fetcharray[$count][1])) {
					$search= array_keys($fetcharray[$count][1][$count2], $Input);
					if (!empty($search)) {
						$classresults=array();
						$count6=0;
						while($count6<$numclasses) {
							$userclass= $fetcharray[$count][1][$count6][0];
							$userclassName=$fetcharray[$count][1][$count6][1];
							$classresults[$count6]= array($userclass, $userclassName);
							$classresults= array_values($classresults);
							$count6=$count6+1;
						}
						$Search[$count]=array($fetcharray[$count][0], $classresults);
					}
				}
				$count2=$count2+1;
				}
			$count=$count+1;
		}
		
	}
	if($Radio=="UserName") {
		$Search=array();
		$count=0;
		while($count< count($fetcharray)) {
			if(!empty($fetcharray[$count][0])) {
				if($fetcharray[$count][0]==$Input) {
					if(is_array($fetcharray[$count][1])) {
						$searchnumclasses= count($fetcharray[$count][1]);
						if($searchnumclasses==0) {
							$Search[$count]= array($fetcharray[$count][0], array(array( 1=>"This person has not added any classes yet")));
						}
						else{
							$searchclasses= array();
							$count10= 0;
							while($count10<$searchnumclasses) {
								$userclassName=$fetcharray[$count][1][$count10][1];
								$eachclass= array($fetcharray[$count][1][$count10][0], $userclassName);
								array_push($searchclasses, $eachclass);
								$count10=$count10+1;
							}
							$Search[$count]=array($fetcharray[$count][0], $searchclasses);
						}
					}
					else{
						$Search[$count]=array($fetcharray[$count][0], array());
					}
				}
			}
		$count= $count+1;
		}
	}
}
$Search=array_values($Search);
if ($Search=== array()) {
	$noresults= TRUE;
}
//this resets the numbering of the array... it was getting some funky numbers but this seems to fix it



$userCRN=array();
if(!empty($CLasses)) {
	$count3=0;
	$numuserclasses= count($CLasses);
	while($count3<$numuserclasses) {
		if(isset($CLasses[$count3][0])) {
			array_push($userCRN, $CLasses[$count3][0]);
			$userCRN=array_values($userCRN);
			$count3=$count3+1;
		}
	}
}
//the above code needs to give an array of all of the user's CRNs by themeselves so that we can compare with peers list and highlight below

$_SESSION[SEarch]=$Search;
$_SESSION[userCRN]=$userCRN;
header("Location: https://web125.secure-secure.co.uk/peerphinder.com/search.php");
?>