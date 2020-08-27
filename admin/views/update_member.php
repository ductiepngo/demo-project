<!-- START Sua thành viên mới -->
<?php 
	$fac = getFaculty(); // Lấy thông tin khoa

	// Lấy id sinh viên cần sửa
	if (isset($_GET['id'])) {
		$id = (int)$_GET['id'];//ep du lieu sang kieu so nguyen
		$row = getMember_id($id);
		if (isset($_POST['update_member'])) {
			$name = $_POST['name'];
			$idKhoa = $_POST['faculty'];
			$phone = $_POST['phone'];
			$addres = $_POST['addres'];
			$birthday = $_POST['birthday'];
			echo $birthday;

			$add = updateMember($id, $idKhoa, $name, $phone, $addres, $birthday);
			if ($add) {
				$_SESSION['noti'] = 2;
				header("Location: index.php");
			}else{
				echo "Cập nhật không thành công!!";
			}
		}
	}else{
		header("Location: index.php");
	}
?>
<form action="" method="POST" role="form">
	<legend>Sửa thông tin học viên</legend>

	<div class="form-group">
		<label for="">Họ tên<span style="color: red;">*</span></label>
		<input type="text" required class="form-control" name="name" placeholder="Họ tên học viên..." value="<?php echo $row['name']; ?>">
	</div>

	<div class="form-group">
		<label for="">Khoa<span style="color: red;">*</span></label>
		<select class="form-control" name="faculty" id="">
			<?php  
				foreach ($fac as $keyFac => $valueFac) {
			?>
				<option <?php if($valueFac['idKhoa'] == $row['idKhoa']) { echo "selected"; } ?> value="<?php echo $valueFac['idKhoa']; ?>" >
					<?php echo $valueFac['title']; ?>
				</option>
			<?php
				}
			?>
		</select>
	</div>

	<div class="form-group">
		<label for="">Số điện thoại<span style="color: red;">*</span></label>
		<input type="number" required class="form-control" name="phone" placeholder="098569789" value="<?php echo $row['phone']; ?>">
	</div>

	<div class="form-group">
		<label for="">Email</label>
		<input disabled="" type="mail" class="form-control" name="e_mail" placeholder="it-plus@gmail.com" value="<?php echo $row['email']; ?>">
	</div>

	<div class="form-group">
		<label for="">Địa chỉ<span style="color: red;">*</span></label>
		<input type="text" required class="form-control" name="addres" placeholder="Địa chỉ học viên..." value="<?php echo $row['addres']; ?>">
	</div>

	<div class="form-group">
		<?php 
			$births = $row['birthday'];
			$birth = date('Y-m-d', strtotime($births));
		?>
		<label for="">Ngày sinh<span style="color: red;">*</span></label>
		<input type="date" required class="form-control" name="birthday" value="<?php echo $birth; ?>">
	</div>

	<button type="submit" name="update_member" class="btn btn-primary" style="margin: 30px 0px;">
		Cập nhật
	</button>
</form>
<!-- END Thêm thành viên mới -->