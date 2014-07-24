<!DOCTYPE html>
<html>

<head>
	<title>Student Data</title>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/main.css">
</head><?php
		$num_gen = 42;
		require_once("database_config.php");
		

	 ?>
<body>

	<h2>ข้อมูลนักศึกษา</h2>
	<table class="table table-bordered" border="1" style="width:800px;padding-left:100px">
		<tr>
			<th rowspan="2">รุ่น</th>
			<th rowspan="2">ปีการศึกษา</th>
  			<th colspan="3">ผู้มีสิทธิ์เข้าศึกษา</th>
  			<th colspan="3">ผู้สำเร็จการศึกษา</th>
  			<th colspan="3">พ้นสภาพ</th>
  			<th colspan="3">ปกติ</th>
  			<th colspan="3">รวม</th>
		</tr>
		<tr>
			<th>ชาย</th>
			<th>หญิง</th>
			<th>รวม</th>

			<th>ชาย</th>
			<th>หญิง</th>
			<th>รวม</th>

			<th>ชาย</th>
			<th>หญิง</th>
			<th>รวม</th>

			<th>ชาย</th>
			<th>หญิง</th>
			<th>รวม</th>

			<th>ชาย</th>
			<th>หญิง</th>
			<th>รวม</th>
		</tr>

		<?php
			function query_sql($query){
				$results = mysql_query($query);
				$rows = mysql_num_rows($results);
				return $rows;
			}
			$total_all = 0;
			$male_all = 0;
			$female_all = 0;

			$total_success_all = 0;
			$male_success_all = 0;
			$female_success_all = 0;

			$total_unsuccess_all = 0;
			$male_unsuccess_all = 0;
			$female_unsuccess_all = 0;

			$total_normal_all = 0;
			$male_normal_all = 0;
			$female_normal_all = 0;

			$total_status_all = 0;
			$male_status_all = 0;
			$female_status_all = 0;


			for($i = 1; $i<=$num_gen; $i++){
				$year = $i+2514;
				$yearid = "07".strval($i+14)."%";
				#query ผู้มีสิทธิ์เข้าศึกษาชาย
				$query = "SELECT * FROM std WHERE stdSex = 'ชาย' AND stdID LIKE '".$yearid."'";
				$male_in_year = query_sql($query);
				$male_all+=$male_in_year;
				#query ผู้มีสิทธิ์เข้าศึกษาหญิง
				$query = "SELECT * FROM std WHERE stdSex = 'หญิง' AND stdID LIKE '".$yearid."'";
				$female_in_year = query_sql($query);
				$female_all+=$female_in_year;
				#รวมผู้มีสิทธิ์เข้าศึกษา
				$total_in_year = $female_in_year + $male_in_year;
				$total_all+=$total_in_year;
// ######################################################################
				#query จบการศึกษาชาย
				$query = "SELECT * FROM std WHERE stdSex = 'ชาย' AND stdID LIKE '".$yearid."' AND stdS LIKE 'จบการศึกษา%'";
				$male_success_in_year = query_sql($query);
				$male_success_all+=$male_success_in_year;
				#query จบการศึกษาหญิง
				$query = "SELECT * FROM std WHERE stdSex = 'หญิง' AND stdID LIKE '".$yearid."' AND stdS LIKE 'จบการศึกษา%'";
				$female_success_in_year = query_sql($query);
				$female_success_all+=$female_success_in_year;
				#รวมจบการศึกษา
				$total_success_in_year = $female_success_in_year + $male_success_in_year;
				$total_success_all+=$total_success_in_year;
// ######################################################################
				#query พ้นสภาพชาย
				$query = "SELECT * FROM std WHERE stdSex = 'ชาย' AND stdID LIKE '".$yearid."' AND stdS LIKE 'พ้นสภาพ%'";
				$male_unsuccess_in_year = query_sql($query);
				$male_unsuccess_all+=$male_unsuccess_in_year;
				#query พ้นสภาพหญิง
				$query = "SELECT * FROM std WHERE stdSex = 'หญิง' AND stdID LIKE '".$yearid."' AND stdS LIKE 'พ้นสภาพ%'";
				$female_unsuccess_in_year = query_sql($query);
				$female_unsuccess_all+=$female_unsuccess_in_year;
				#รวมพ้นสภาพ
				$total_unsuccess_in_year = $female_unsuccess_in_year + $male_unsuccess_in_year;
				$total_unsuccess_all+=$total_unsuccess_in_year;
// ######################################################################
				#query ปกติชาย
				$query = "SELECT * FROM std WHERE stdSex = 'ชาย' AND stdID LIKE '".$yearid."' AND stdS LIKE 'ปกติ%'";
				$male_normal_in_year = query_sql($query);
				$male_normal_all+=$male_normal_in_year;
				#query ปกติหญิง
				$query = "SELECT * FROM std WHERE stdSex = 'หญิง' AND stdID LIKE '".$yearid."' AND stdS LIKE 'ปกติ%'";
				$female_normal_in_year = query_sql($query);
				$female_normal_all+=$female_normal_in_year;
				#รวมปกติ
				$total_normal_in_year = $female_normal_in_year + $male_normal_in_year;
				$total_normal_all+=$total_normal_in_year;
// ######################################################################
				#รวม
				$male_status_in_year = $male_success_in_year + $male_unsuccess_in_year + $male_normal_in_year;
				$male_status_all+=$male_status_in_year;
				#รวม
				$female_status_in_year = $female_success_in_year + $female_unsuccess_in_year + $female_normal_in_year;
				$female_status_all+=$female_status_in_year;
				#รวม
				$total_status_in_year = $female_status_in_year + $male_status_in_year;
				$total_status_all+=$total_status_in_year;
// ######################################################################
				$num_id = strval($i+14);
				echo "<tr>
						<td><a href='show_list.php?std_id=&std_name=&std_surname=&std_gender=all&std_status=all&std_major=all&std_gen=07".$num_id."&std_degree=all'>".$i."</a></td>
						<td><a href='show_list.php?std_id=&std_name=&std_surname=&std_gender=all&std_status=all&std_major=all&std_gen=07".$num_id."&std_degree=all'>".$year."</a></td>

						<td><a href='show_list.php?std_id=&std_name=&std_surname=&std_gender=ชาย&std_status=all&std_major=all&std_gen=07".$num_id."&std_degree=all'>".$male_in_year."</a></td>
						<td><a href='show_list.php?std_id=&std_name=&std_surname=&std_gender=หญิง&std_status=all&std_major=all&std_gen=07".$num_id."&std_degree=all'>".$female_in_year."</a></td>
						<td class='info'><a href='show_list.php?std_id=&std_name=&std_surname=&std_gender=all&std_status=all&std_major=all&std_gen=07".$num_id."&std_degree=all'>".$total_in_year."</a></td>

						<td><a href='show_list.php?std_id=&std_name=&std_surname=&std_gender=ชาย&std_status=จบการศึกษา&std_major=all&std_gen=07".$num_id."&std_degree=all'>".$male_success_in_year."</a></td>
						<td><a href='show_list.php?std_id=&std_name=&std_surname=&std_gender=หญิง&std_status=จบการศึกษา&std_major=all&std_gen=07".$num_id."&std_degree=all'>".$female_success_in_year."</a></td>
						<td class='success'><a href='show_list.php?std_id=&std_name=&std_surname=&std_gender=all&std_status=จบการศึกษา&std_major=all&std_gen=07".$num_id."&std_degree=all'>".$total_success_in_year."<a/></td>

						<td><a href='show_list.php?std_id=&std_name=&std_surname=&std_gender=ชาย&std_status=พ้นสภาพ&std_major=all&std_gen=07".$num_id."&std_degree=all'>".$male_unsuccess_in_year."<a/></td>
						<td><a href='show_list.php?std_id=&std_name=&std_surname=&std_gender=หญิง&std_status=พ้นสภาพ&std_major=all&std_gen=07".$num_id."&std_degree=all'>".$female_unsuccess_in_year."<a/></td>
						<td class='danger'><a href='show_list.php?std_id=&std_name=&std_surname=&std_gender=all&std_status=พ้นสภาพ&std_major=all&std_gen=07".$num_id."&std_degree=all'>".$total_unsuccess_in_year."<a/></td>

						<td><a href='show_list.php?std_id=&std_name=&std_surname=&std_gender=ชาย&std_status=ปกติ&std_major=all&std_gen=07".$num_id."&std_degree=all'>".$male_normal_in_year."<a/></td>
						<td><a href='show_list.php?std_id=&std_name=&std_surname=&std_gender=หญิง&std_status=ปกติ&std_major=all&std_gen=07".$num_id."&std_degree=all'>".$female_normal_in_year."<a/></td>
						<td class='warning'><a href='show_list.php?std_id=&std_name=&std_surname=&std_gender=all&std_status=ปกติ&std_major=all&std_gen=07".$num_id."&std_degree=all'>".$total_normal_in_year."<a/></td>

						<td>".$male_status_in_year."</td>
						<td>".$female_status_in_year."</td>
						<td class='info'>".$total_status_in_year."</td>
					</tr>";
			}
			// $query = "SELECT * FROM std";
			// $total_all = query_sql($query);
			echo "<tr>
					<td colspan=2>รวม</td>

					<td>".$male_all ."</td>
					<td>".$female_all ."</td>
					<td class='info'>".$total_all ."</td>

					<td>".$male_success_all ."</td>
					<td>".$female_success_all ."</td>
					<td class='success'>".$total_success_all ."</td>

					<td>".$male_unsuccess_all ."</td>
					<td>".$female_unsuccess_all ."</td>
					<td class='danger'>".$total_unsuccess_all ."</td>

					<td>".$male_normal_all ."</td>
					<td>".$female_normal_all ."</td>
					<td class='warning'>".$total_normal_all ."</td>

					<td>".$male_status_all ."</td>
					<td>".$female_status_all ."</td>
					<td class='info'>".$total_status_all ."</td>
		</tr>";
		mysql_close($con);
		 ?>
	</table>
</body>
</html>