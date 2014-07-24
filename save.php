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
    

  		$std_id = $_GET['std_id'];
  		$std_fn = $_GET['std_fn'];
  		$std_ln = $_GET['std_ln'];
  		$std_major_in = $_GET['std_major_in'];
  		$std_major_out = $_GET['std_major_out'];
  		$std_status = $_GET['std_status'];
  		$std_degree = $_GET['std_degree'];

      $std_address = $_GET['std_address'];
      $std_phone1 = $_GET['std_phone1'];
      $std_phone2 = $_GET['std_phone2'];
      $std_phone3 = $_GET['std_phone3'];
      $std_email = $_GET['std_email'];
      $std_facebook = $_GET['std_facebook'];


  		$query ="UPDATE `std` SET `stdFacebook` = '".$std_facebook."',`stdEmail` = '".$std_email."',`stdPhone3` = '".$std_phone3."',`stdPhone2` = '".$std_phone2."',`stdPhone1` = '".$std_phone1."',`stdAddress` = '".$std_address."',`stdFn` = '".$std_fn."', `stdLn` = '".$std_ln."', `stdMS` = '".$std_major_in."', `stdDegree` = '".$std_degree."', `stdME` = '".$std_major_out."', `stdS` = '".$std_status."' WHERE `stdID` = '".$std_id."';";
  		
  		//echo "<br/>".$query;
      echo "Update Complete !!!";

  		mysql_query($query);
  		mysql_close($con);
	 ?>
  <button type="button" class="btn btn-info" onclick="window.location='search.php';">กลับหน้าค้นหา</button>
</body>
</html>