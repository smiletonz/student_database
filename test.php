<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="UTF-8">
</head>
<body>
	
</body>
</html>


<?php

require_once("database_config.php");
		
$year = '57';
$url = 'http://reg2.su.ac.th/registrar/learn_time.asp?f_cmd=1&f_studentcode=07'. $year .'*&backto=learn_time&f_studentname=&f_studentsurname=&f_studentstatus=all&f_maxrows=30000';
$homepage = file_get_contents($url);

// echo var_dump($homepage);echo "<br>";
// echo htmlspecialchars($homepage);
// echo $homepage;
$list_profile = array();
$title = array();
$title = explode('table', $homepage);
$title = explode("<a href=", $title[5]);
$list_name = $title[1];
$list_name = explode("<TABLE", $list_name);
$list_name = explode("<TD>", $list_name[2]);//<TD WIDTH=10></TD><TD width=250 valign=top>
unset($list_name[0]);
foreach ($list_name as $key => $value) {
	// echo var_dump($value)."<br>";
	$name = '';
	$status = '';
	$code = '';
	$name = explode("<TD WIDTH=10></TD><TD width=250 valign=top>", $value);
	if (count($name) == 2) {
		$profile = array();
		$tmp = array();
		$name = explode("<br>", $name[1]);
		$tmp = $name[2];
		$name = $name[0];//<---
		// $name = utf8_encode($name);
		$tmp = explode("</TD>", $tmp);
		$status = explode(">", $tmp[0])[1];//<---
		// $status = utf8_encode($status);
		if (count($tmp) == 5) {
			$code = explode("</A>", $tmp[4]);
			$code = explode(">", $code[0])[2];//<---		
			// $code = utf8_encode($code);	
		}
		
	}
	$profile = array('name' => $name, 'status' => $status, 'code' => $code);
	array_push($list_profile, $profile);
}

foreach ($list_profile as $std_array) {
	foreach ($std_array as $key => $value) {
		
		if($key=="name"){
			$std_name = split(" ",$value);
			$std_fn = iconv( 'windows-874', 'UTF-8', $std_name[0]);
			$std_ln = iconv( 'windows-874', 'UTF-8', $std_name[1]);
		}
		elseif ($key=="status") {
			$std_status = iconv( 'windows-874', 'UTF-8', $value);
		}
		elseif ($key=="code") {
			$std_id = iconv( 'windows-874', 'UTF-8', $value);
		}

	}
	echo $std_fn." : ".$std_ln." : ".$std_status.": ".$std_id."</br>";
	$query = "INSERT INTO `std` (`stdID`, `stdFn`, `stdLn`, `stdS`) VALUES ('$std_id','$std_fn','$std_ln','$std_status')";
	
	mysql_query($query)or die ("Error in query: $query. ".mysql_error());
	echo "+++++++++++++++++++++++++</br>";
}
mysql_close($con);
//echo var_dump($list_profile);
?>