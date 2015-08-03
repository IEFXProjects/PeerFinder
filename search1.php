if(isset($_POST[searchTerm]) AND isset($_POST[searchType])) {
$Input= $_POST[searchTerm];
$Radio= $_POST[searchType];


if ($Radio != "UserName" or $Radio != "CRN"){
	die("there was an error please try again");
}
if($Radio==="CRN"){
	if (!(ctype_digit($CRN))) {
		die("CRN needs to be composed of only numbers. You inputed:  " . $CRN);
	}
	if (strlen($CRN) != 7) {
		die("CRN needs to be 7 numbers long. You inputed " . strlen($CRN));
	}
}

$Radio=mysqli_real_escape_string($conn, $Radio);
require 'DBconnection.php';
$query= mysqli_query($conn, "SELECT UserName and Classes FROM UserInfo");
$fetcharray= $query->fetch_array();
mysqli_close($conn);
if ($Radio==="CRN") {
	$count=0;
	$length= count($fetcharray[1]);
	
	while ($count < $length) {
		$count2=0;
		$results=array();
		while($count2<$classlength) {
				$search= array_search($Input, $fetcharray[1][$count]);
				if (empty($search)) {
					array_push($results, array($fetcharray[0][$count],$fetcharray[1][$search]));
				}
			$count2=$count2+1;
		}

		$count=$count+1;
	}
}
if($Radio==="UserName") {
$results=array();
$count=0
while($count< count(fetcharray[0])) {
	$search= array_search($Input, $fetcharray[0][$count]);
	if(!empty($search)) {
		array_push($results, array(fetcharray[0][$search], fetcharray[1]);
	}
	$count+1;
}
}
}