<!DOCTYPE html>
<html>
<head>
	<title>Search Student</title>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/main.css">
</head>
<body style="padding-left: 215px;">
	<h2>ค้นหาข้อมูลนักศึกษา</h2>
	<form  method="get" action="get_result.php" role="form">
  		<div class="form-group">
    		<input type="text" class="form-control text_field" name="std_id" id="std_id" placeholder="รหัสนักศึกษา">
  		</div>
  		<div class="form-inline form-group">
    		<div class="form-group"><input type="text" class="form-control" name="std_name" id="std_name" placeholder="ชื่อ"></div>
    		<div class="form-group"><input type="text" class="form-control" name="std_surname" id="std_surname" placeholder="นามสกุล"></div>
  		</div>
  		<div class="form-group " >
  						<label for="std_gender">เพศ</label>
						<select name="std_gender" id='std_gender' class="form-control text_field">
							<option value="all" selected="">ทั้งหมด</option>
							<option value="ชาย">ชาย</option>
							<option value="หญิง">หญิง</option>
						</select>
		</div>
		<div class="form-group ">
						<label for="std_status">สถานะนักศึกษา</label>
						<select name="std_status" id = 'std_status' class="form-control text_field">
							<option value="all" selected="">ทั้งหมด</option>
							<option value="ปกติ">ปกติ</option>
							<option value="จบการศึกษา">จบการศึกษา</option>
							<option value="พ้นสภาพ">พ้นสภาพ</option>
						</select>
					</div>
 		<div class="form-group ">
 						<label for="std_major">สาขาวิชาเอก</label>
						<select name="std_major" id="std_major" class="form-control text_field">
							<option value="all" selected="">ทั้งหมด</option>
							<option value="คณิตศาสตร์">คณิตศาสตร์</option>
							<option value="ชีววิทยา">ชีววิทยา</option>
							<option value="เคมี">เคมี</option>
							<option value="ฟิสิกส์">ฟิสิกส์</option>
							<option value="สถิติประยุกต์">สถิติประยุกต์</option>
							<option value="วิทยาศาสตร์สิ่งแวดล้อม">วิทยาศาสตร์สิ่งแวดล้อม</option>
							<option value="วิทยาการคอมพิวเตอร์">วิทยาการคอมพิวเตอร์</option>
							<option value="จุลชีววิทยา">จุลชีววิทยา</option>
							<option value="เทคโนโลยีสารสนเทศ">เทคโนโลยีสารสนเทศ</option>
							<option value="คณิตศาสตร์ประยุกต์">คณิตศาสตร์ประยุกต์</option>
						</select>
		</div>
    	<div class="form-group">

    		<label for="std_gen">รุ่น/ปีการศึกษา</label>
    		<select name="std_gen" id="std_gen" class="form-control text_field">
							<option value="all" selected="">ทั้งหมด</option>

    						<?php
    							$num_year = idate('Y') - 1971 ;

 								for($i=1;$i<=$num_year;$i++){
 									$value = 714+$i;
 									$preid = '0'.$value;
 									$year = 2514+$i;
 									echo "<option value='".$preid."'>SC".$i." / ".$year."</option>";
 								}
    	 					?>
						</select>
    	</div>
    	<div class="form-group ">
						<label for="std_degree">เกียรตินิยม</label>
						<select name="std_degree" id = 'std_degree' class="form-control text_field">
							<option value="all" selected="">ทั้งหมด</option>
							<option value="0">ไม่ได้เกียรตินิยม</option>
							<option value="1">เกียรตินิยมอันดับ 1</option>
							<option value="2">เกียรตินิยมอันดับ 2</option>
						</select>
					</div>
  		<button type="submit" class="btn btn-primary">ค้นหา</button>
	</form>
</body>
</html>