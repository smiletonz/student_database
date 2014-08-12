<!DOCTYPE html>
<html>
<head>
	<title>Check Update</title>
	<meta http-equiv=Content-Type content="text/html; charset=windows-874">
</head>
<body>
	<?php
		ini_set('max_execution_time', 900); //15 minute
		
		require_once("database_config.php");

		
  		$year4 = strval(idate('Y') - 1961);
  		$year5 = strval(idate('Y') - 1962);
  		$year6 = strval(idate('Y') - 1963);
  		$year7 = strval(idate('Y') - 1964);
  		$year8 = strval(idate('Y') - 1965);

  		$query = "SELECT stdID FROM std WHERE stdS = 'ปกติ' AND (stdID LIKE '07".$year4."%' OR stdID LIKE '07".$year5."%' OR stdID LIKE '07".$year6."%' OR stdID LIKE '07".$year7."%' OR stdID LIKE '07".$year8."%') ;";
  		echo $query;
  		$results = mysql_query($query) or die("Result Error");

  		while( $row = mysql_fetch_assoc( $results)){
	    		$result_array[] = $row['stdID'];
		}
		$count = 0;
		foreach ($result_array as $std_id) {
			echo $std_id;
			echo "<br/>";
			$data = file_get_contents("http://reg2.su.ac.th/registrar/learn_time.asp?f_cmd=1&f_studentcode=".$std_id, "r");
			$status = iconv( 'UTF-8', 'windows-874', 'จบการศึกษา');

			if (strpos($data, $status) !== false) {
	    		
	    		$count++;
	    		$query = "UPDATE std SET stdS = 'จบการศึกษา' WHERE stdID = '".$std_id."'";
	    		mysql_query($query) or die("Result Error");
			}

		}
		$message =  "มีผู้สำเร็จการศึกษาใหม่ทั้งหมด ".$count."คน";
		echo "<script type='text/javascript'>alert('$message');</script>";
	 ?>
	 <script type="text/javascript">
			window.location.href = 'index.php';
	</script>
</body>
</html>