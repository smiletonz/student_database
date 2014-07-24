﻿<!DOCTYPE html>
<html>
<head>
	<title>Show List</title>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/main.css">
</head>
<body>
	<?php
		require_once("database_config.php");
		
		
  		$where_status = true;

  		if ($_GET['std_id'] == '' && $_GET['std_name'] == '' && $_GET['std_surname'] == '') {
  			$query = "SELECT * FROM std";
  			$where_status = false;
  			// echo "กรุณาระบุรายการค้นหาใหม่";
    	// 	echo "</br><button type='submit' class='btn btn-primary' onclick='window.location=\"search.php\"';>กลับ</button>";
  			// exit();
  		}
		else if($_GET['std_id'] != '' && $_GET['std_name'] == '' && $_GET['std_surname'] == ''){
			$query = "SELECT * FROM std WHERE stdID LIKE '".$_GET['std_id']."%'";
			$where_status = true;
    	}
    	else if($_GET['std_id'] == '' && $_GET['std_name'] != '' && $_GET['std_surname'] == ''){
			$query = "SELECT * FROM std WHERE stdFn LIKE '".$_GET['std_name']."%'";
			$where_status = true;
    	}
    	else if($_GET['std_id'] == '' && $_GET['std_name'] == '' && $_GET['std_surname'] != ''){
			$query = "SELECT * FROM std WHERE stdLn LIKE '".$_GET['std_surname']."%'";
			$where_status = true;
    	}
    	else if($_GET['std_id'] != '' && $_GET['std_name'] != '' && $_GET['std_surname'] == ''){
			$query = "SELECT * FROM std WHERE stdFn LIKE '".$_GET['std_name']."%' AND stdID LIKE '".$_GET['std_id']."%'";
			$where_status = true;
    	}
    	else if($_GET['std_id'] != '' && $_GET['std_name'] == '' && $_GET['std_surname'] != ''){
			$query = "SELECT * FROM std WHERE stdLn LIKE '".$_GET['std_surname']."%' AND stdID LIKE '".$_GET['std_id']."%'";
			$where_status = true;
    	}
    	else if($_GET['std_id'] == '' && $_GET['std_name'] != '' && $_GET['std_surname'] != ''){
			$query = "SELECT * FROM std WHERE stdLn LIKE '".$_GET['std_surname']."%' AND stdFn LIKE '".$_GET['std_name']."%'";
			$where_status = true;
    	}
    	else if($_GET['std_id'] != '' && $_GET['std_name'] != '' && $_GET['std_surname'] != ''){
			$query = "SELECT * FROM std WHERE stdLn LIKE '".$_GET['std_surname']."%' AND stdFn LIKE '".$_GET['std_name']."%' AND stdID LIKE '".$_GET['std_id']."%'";
			$where_status = true;
    	}


    	if($_GET['std_gender']!='all'){
    		if(!$where_status){
    			$query.= " WHERE stdSex = '".$_GET['std_gender']."'";
    			$where_status = true;
    		}
    		else{
    			$query.= " AND stdSex = '".$_GET['std_gender']."'";
    		}
    	}

    	if($_GET['std_status']!='all'){
    		if(!$where_status){
    			$query.= " WHERE stdS = '".$_GET['std_status']."'";
    			$where_status = true;
    		}
    		else{
    			$query.= " AND stdS = '".$_GET['std_status']."'";
    		}
    	}

    	if($_GET['std_major']!='all'){
    		if(!$where_status){
    			$query.= " WHERE (stdMS = '".$_GET['std_major']."' OR stdME = '".$_GET['std_major']."')";
    			$where_status = true;
    		}
    		else{
    			$query.= " AND (stdMS = '".$_GET['std_major']."' OR stdME = '".$_GET['std_major']."')";
    		}
    	}

    	if($_GET['std_gen']!='all'){
    		if(!$where_status){
    			$query.= " WHERE stdID LIKE '".$_GET['std_gen']."%'";
    			$where_status = true;
    		}
    		else{
    			$query.= " AND stdID LIKE '".$_GET['std_gen']."%'";
    		}
    	}

    	if($_GET['std_degree']!='all'){
    		if(!$where_status){
    			$query.= " WHERE stdDegree = '".$_GET['std_degree']."'";
    			$where_status = true;
    		}
    		else{
    			$query.= " AND stdDegree = '".$_GET['std_degree']."'";
    		}
    	}




		$results = mysql_query($query) or die("กรุณาระบุรายการค้นหา");

  		if(mysql_num_rows($results)!=0){
	    	echo "<h2>รายชื่อนักศึกษา</h2>
	    			
	        <table class='table table-bordered' border='1' style='width:800px;padding-left:100px'>
	        	<tr>
	        		<th>รหัสนักศึกษา</th>
	        		<th>คำนำหน้า</th>
	        		<th>ชื่อ</th>
	        		<th>นามสกุล</th>
	        		<th>สาขาวิชาแรกเข้า</th>
	        		<th>สถานะ</th>
	        		<th>สาขาวิชาที่จบ</th>
	        		<th>เกียรตินิยม</th>
	        		
	        	</tr>
	    	";

	    	while( $row = mysql_fetch_assoc( $results)){
	    		$result_array[] = $row; // Inside while loop
	    		// echo '<pre>';
	    		// print_r ($result_array);
	    		// echo '</pre>';
			}

			// print_r ($result_array);
			// echo $result_array['stdID'];
			foreach ($result_array as $row) {
				if($row['stdDegree']==1){
					$degree = "เกียรตินิยมอันดับ 1";
				}
				else if($row['stdDegree']==2){
					$degree = "เกียรตินิยมอันดับ 2";
				}
				else{
					$degree = " - ";
				}
				echo "<tr>
	    				<td>".$row['stdID']."</a></td>
	    				<td>".$row['stdP']."</td>
	    				<td>".$row['stdFn']."</td>
	    				<td>".$row['stdLn']."</td>
	    				<td>".$row['stdMS']."</td>
	    				<td>".$row['stdS']."</td>
	    				<td>".$row['stdME']."</td>
	    				<td>".$degree."</td>
	    				
	    			</tr>";
	    	}
	    	echo "</table>";
	    }
    	else{
    		echo "ไม่มีข้อมูล";
    		
    	}
    	mysql_close($con);
	?>


</body>
</html>