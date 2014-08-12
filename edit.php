<!DOCTYPE html>
<html>
<head>
	<title>Edit</title>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/main.css">
	<script>
		function confirmForm() {
   			confirm("คุณแน่ใจที่จะทำต่อใช่หรือไม่");
		}
	</script>
</head>
<body>
<h2>Edit</h2>


<?php 
		require_once("database_config.php");

		$query = "SELECT * FROM std WHERE stdID = '".$_GET['std_id']."';";
		$results = mysql_query($query);

		$row = mysql_fetch_assoc( $results);

			if($row['stdDegree']=='0'){
				$std_degree = 'ไม่ได้เกียรตินิยม';
			}
			elseif ($row['stdDegree']=='1') {
				$std_degree = 'เกียรตินิยมอันดับ 1';
			}
			elseif ($row['stdDegree']=='2') {
				$std_degree = 'เกียรตินิยมอันดับ 2';
			}
		$std_name = $row['stdFn'];
		$std_surname = $row['stdLn'];
		$std_major_in = $row['stdMS'];
		$std_major_out = $row['stdME'];
		$std_status = $row['stdS'];
		$std_address = $row['stdAddress'];
		$std_phone1 = $row['stdPhone1'];
		$std_phone2 = $row['stdPhone2'];
		$std_phone3 = $row['stdPhone3'];
		$std_email = $row['stdEmail'];
		$std_facebook = $row['stdFacebook'];
			
?>

<form method="get" action="save.php" role="form">
		<div class="form-group">
    		<input type="text" class="form-control text_field" name="std_fn"  placeholder="ชื่อ" value = "<?php echo $std_name; ?>">

  		</div>
  		<div class="form-group">
    		<input type="text" class="form-control text_field" name="std_ln"  placeholder="นามสกุล" value = "<?php echo $std_surname; ?>">
  		</div>
  		<input type="hidden" name="std_id" value="<?php echo $_GET['std_id'] ?>">
  		<div class="form-group ">
 						<label for="std_major_in">สาขาวิชาแรกเข้า</label>
						<select name="std_major_in" id="std_major_in" class="form-control text_field">
							<option selected="selected" class = "selected"value="<?php echo $std_major_in; ?>"><?php echo $std_major_in; ?></option>

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
		<div class="form-group ">
 						<label for="std_major_out">สาขาวิชาที่จบ</label>
						<select name="std_major_out" id="std_major" class="form-control text_field">
							<option selected="selected" class = "selected"value="<?php echo $std_major_out;?>"><?php echo $std_major_out; ?></option>

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
		<div class="form-group ">
						<label for="std_status">สถานะนักศึกษา</label>
						<select name="std_status" id = 'std_status'  class="form-control text_field">
							<option selected="selected" class = "selected"value="<?php echo $std_status; ?>"><?php echo $std_status; ?></option>

							<option value="ปกติ">ปกติ</option>
							<option value="จบการศึกษา">จบการศึกษา</option>
							<option value="พ้นสภาพ">พ้นสภาพ</option>
						</select>
					</div>

		

		<div class="form-group ">
						<label for="std_degree">เกียรตินิยม</label>
						<select name="std_degree" id = 'std_degree' class="form-control text_field">
							<option selected="selected" class = "selected"value="<?php echo $std_degree; ?>"><?php echo $std_degree; ?></option>
							<option value="0">ไม่ได้เกียรตินิยม</option>
							<option value="1">เกียรตินิยมอันดับ 1</option>
							<option value="2">เกียรตินิยมอันดับ 2</option>
						</select>
					</div>

		<div class="form-group">
			<label for="std_status">ที่อยู่</label>
    		<textarea rows="3" class="form-control text_field" name="std_address"  placeholder="ที่อยู่" value = "<?php echo $std_address; ?>"></textarea>

  		</div>
  		<div class="form-group">
  			<label for="std_status">โทร 1</label>
    		<input type="text" class="form-control text_field" name="std_phone1"  placeholder="เบอร์โทร 1" value = "<?php echo $std_phone1; ?>">

  		</div>
  		<div class="form-group">
  			<label for="std_status">โทร 2</label>
    		<input type="text" class="form-control text_field" name="std_phone2"  placeholder="เบอร์โทร 2" value = "<?php echo $std_phone2; ?>">

  		</div>
  		<div class="form-group">
  			<label for="std_status">โทร 3</label>
    		<input type="text" class="form-control text_field" name="std_phone3"  placeholder="เบอร์โทร 3" value = "<?php echo $std_phone1; ?>">

  		</div>

  		<div class="form-group">
  			<label for="std_status">อีเมลล์</label>
    		<input type="text" class="form-control text_field" name="std_email"  placeholder="อีเมลล์" value = "<?php echo $std_email; ?>">

  		</div>
  		<div class="form-group">
  			<label for="std_status">เฟซบุ๊ค</label>
    		<input type="text" class="form-control text_field" name="std_facebook"  placeholder="เฟซบุ๊ค" value = "<?php echo $std_facebook;?>">

  		</div>
		
		<button type="submit" class="btn btn-primary" onclick="confirmForm()">บันทึก</button>


</form>
</body>
</html>