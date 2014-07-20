<!DOCTYPE html>
<html>
<head>
	<title>Student Data</title>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/main.css">
</head>
<body>
	<h2>ข้อมูลนักศึกษา</h2>
	<?php 
		require_once("database_config.php");
		$selected = mysql_select_db("std");
		mysql_query("SET NAMES UTF8");

		$query = "SELECT * FROM std WHERE stdID = '".$_GET['std_id']."';";
		$results = mysql_query($query);
		
		$row = mysql_fetch_assoc( $results);
		echo "<strong>รหัสนักศึกษา : </strong>".$row['stdID']."</br>";
		echo "<strong>ชื่อ : </strong>".$row['stdFn']."</br>";
		echo "<strong>นามสกุล : </strong>".$row['stdLn']."</br>";
		echo "<strong>เพศ : </strong>".$row['stdSex']."</br>";
		echo "<strong>สถานะ : </strong>".$row['stdS']."</br>";
		echo "<strong>สาขาวิชาแรกเข้า : </strong>".$row['stdMS']."</br>";
		echo "<strong>สาขาวิชาที่จบ : </strong>".$row['stdME']."</br>";
		if($row['stdDegree']=='0'){
			echo "<strong>สถานะเกียรตินิยม : </strong>ไม่ได้เกียรตินิยม</br>";
		}
		else if($row['stdDegree']=='1'){
			echo "<strong>สถานะเกียรตินิยม : </strong>เกียรตินิยมอันดับหนึ่ง</br>";
		}
		else if($row['stdDegree']=='2'){
			echo "<strong>สถานะเกียรตินิยม : </strong>เกียรตินิยมอันดับสอง</br>";
		}
		echo "<strong>ที่อยู่ : </strong>".$row['stdAddress']."</br>";
		echo "<strong>อีเมลล์ : </strong>".$row['stdEmail']."</br>";
		echo "<strong>เฟซบุ๊ก : </strong>".$row['stdFacebook']."</br>";
	 ?>

</body>
</html>