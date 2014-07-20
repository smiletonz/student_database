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
<form method="get" action="save.php" role="form">
		<div class="form-group">
    		<input type="text" class="form-control text_field" name="std_fn"  placeholder="ชื่อ" value = "<?php echo $_GET['std_name'] ?>">

  		</div>
  		<div class="form-group">
    		<input type="text" class="form-control text_field" name="std_ln"  placeholder="นามสกุล" value = "<?php echo $_GET['std_surname'] ?>">
  		</div>
  		<input type="hidden" name="std_id" value="<?php echo $_GET['std_id'] ?>">
  		<div class="form-group ">
 						<label for="std_major_in">สาขาวิชาแรกเข้า</label>
						<select name="std_major_in" id="std_major_in" class="form-control text_field">
							<option selected="selected" class = "selected"value="<?php echo $_GET['std_major_in'] ?>"><?php echo $_GET['std_major_in'] ?></option>

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
							<option selected="selected" class = "selected"value="<?php echo $_GET['std_major_out'] ?>"><?php echo $_GET['std_major_out'] ?></option>

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
						<label for="std_status">สถานะ</label>
						<select name="std_status" id = 'std_status'  class="form-control text_field">
							<option selected="selected" class = "selected"value="<?php echo $_GET['std_status'] ?>"><?php echo $_GET['std_status'] ?></option>

							<option value="ปกติ">ปกติ</option>
							<option value="จบการศึกษา">จบการศึกษา</option>
							<option value="พ้นสภาพ">พ้นสภาพ</option>
						</select>
					</div>

		<?php 
			if($_GET['std_degree']=='0'){
				$std_degree = 'ไม่ได้เกียรตินิยม';
			}
			elseif ($_GET['std_degree']=='1') {
				$std_degree = 'เกียรตินิยมอันดับ 1';
			}
			elseif ($_GET['std_degree']=='2') {
				$std_degree = 'เกียรตินิยมอันดับ 2';
			}
			
		 ?>

		<div class="form-group ">
						<label for="std_degree">เกียรตินิยม</label>
						<select name="std_degree" id = 'std_degree' class="form-control text_field">
							<option selected="selected" class = "selected"value="<?php echo $std_degree ?>"><?php echo $std_degree ?></option>
							<option value="0">ไม่ได้เกียรตินิยม</option>
							<option value="1">เกียรตินิยมอันดับ 1</option>
							<option value="2">เกียรตินิยมอันดับ 2</option>
						</select>
					</div>
		
		<button type="submit" class="btn btn-primary" onclick="confirmForm()">บันทึก</button>


</form>
</body>
</html>