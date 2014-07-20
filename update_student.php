<!DOCTYPE html>
<html>
	<head>
	<title>Update Student</title>
		<link rel="stylesheet" href="">
	</head>	
	<body>
		<?php 
		require_once("database_config.php");

		$selected = mysql_select_db("std");
  		mysql_query("SET NAMES UTF8");
  		$num_year = idate('Y') + 543 - 2500 ;
  		$data = file_get_contents("http://reg.su.ac.th/registrar/learn_time.asp?f_cmd=1&f_studentcode=07".$num_year."*&f_studentstatus=all&f_maxrows=1000", "r");
  		echo $data;
		?>
	</body>
</html>