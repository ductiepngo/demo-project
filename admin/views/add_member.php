<!-- START Thêm thành viên mới -->
<?php  
	$fac = getFaculty();
	

	if (isset($_POST['add_member'])) {
		$name = $_POST['name'];
		$idKhoa = $_POST['faculty'];
		$phone = $_POST['phone'];
		$email = trim($_POST['e_mail']);
		$addres = $_POST['addres'];
		$birthday = $_POST['birthday'];


		$checkEMail = checkEMail($email);
		if ($checkEMail != 1) {
			$add = addMember($idKhoa, $name, $phone, $email, $addres, $birthday);
			if ($add) {
				$_SESSION['noti'] = 1;
				header("Location: index.php");
			}else{
				echo "Thêm mới thất bại!";
			}
		}else{
			$errorEMail = "Email đã tồn tại!";
		}

		

	}
?>
<form action="" method="POST" role="form">
	<legend>Thêm mới học viên</legend>

	<div class="form-group">
		<label for="">Họ tên<span style="color: red;">*</span></label>
		<input type="text" required class="form-control" name="name" placeholder="Họ tên học viên..." value="<?php if(isset($name)) { echo $name; } ?>">
	</div>

	<div class="form-group">
		<label for="">Khoa<span style="color: red;">*</span></label>
		<select class="form-control" name="faculty" id="">
			<?php  
				foreach ($fac as $keyFac => $valueFac) {
			?>
				<option value="<?php echo $valueFac['idKhoa']; ?>"><?php echo $valueFac['title']; ?></option>
			<?php
				}
			?>
		</select>
	</div>

	<div class="form-group">
		<label for="">Số điện thoại<span style="color: red;">*</span></label>
		<input type="number" required class="form-control" name="phone" placeholder="098569789" value="<?php if(isset($phone)) { echo $phone; } ?>">
	</div>

	<div class="form-group">
		<label for="">Email</label>
		<span class="txt_errror"><?php if(isset($errorEMail)){ echo $errorEMail; } ?></span>
		<input type="mail" class="form-control" name="e_mail" placeholder="it-plus@gmail.com" value="<?php if(isset($email)) { echo $email; } ?>">
	</div>

	<div class="form-group">
		<label for="">Địa chỉ<span style="color: red;">*</span></label>
		<input type="text" required class="form-control" name="addres" placeholder="Địa chỉ học viên..." value="<?php if(isset($addres)) { echo $addres; } ?>">
	</div>

	<div class="form-group">
		<label for="">Ngày sinh<span style="color: red;">*</span></label>
		<input type="date" required class="form-control" name="birthday">
	</div>

	<button type="submit" name="add_member" class="btn btn-primary" style="margin: 30px 0px;">
		Thêm mới
	</button>
</form>
<!-- END Thêm thành viên mới -->