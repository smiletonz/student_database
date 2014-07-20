<!DOCTYPE html>
<html>
<head>
	<title>Save</title>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/main.css">
</head>
</head>
<body>
	<?php 
		require_once("database_config.php");
    
		$selected = mysql_select_db("std");
  		mysql_query("SET NAMES UTF8");

  		$std_id = $_GET['std_id'];
  		$std_fn = $_GET['std_fn'];
  		$std_ln = $_GET['std_ln'];
  		$std_major_in = $_GET['std_major_in'];
  		$std_major_out = $_GET['std_major_out'];
  		$std_status = $_GET['std_status'];
  		$std_degree = $_GET['std_degree'];

  		echo "<br/>".$std_id;
  		echo "<br/>".$std_fn;
  		echo "<br/>".$std_ln;
  		echo "<br/>".$std_major_in;
  		echo "<br/>".$std_major_out;
  		echo "<br/>".$std_status;
  		echo $std_degree;

  		$query ="UPDATE `std` SET `stdFn` = '".$std_fn."', `stdLn` = '".$std_ln."', `stdMS` = '".$std_major_in."', `stdDegree` = '".$std_degree."', `stdME` = '".$std_major_out."', `stdS` = '".$std_status."' WHERE `stdID` = '".$std_id."';";
  		
  		echo "<br/>".$query;
  		mysql_query($query);
  		mysql_close($con);
	 ?>

<script type="text/javascript">
			//window.location.href = 'show_data.php?std_id="07530544"';
</script>
</body>
</html>