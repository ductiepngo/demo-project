<?php

	if (isset($_POST['sm_login'])) {
		$users = $_POST['user'];
		$user = strip_tags($users); // Loại bỏ thẻ html
		$user = mysqli_real_escape_string($conn, $user); // loai bo  ki tu dac biet
// $conn ket noi co so lieu
		$passw = $_POST['passw'];
		$passw = strip_tags($passw);
		$passw = mysqli_real_escape_string($conn, $passw);
		$passw = md5($passw);// ma hoa passs thanh dang ko doc dc

		$sql = "SELECT *FROM tbl_users WHERE email = '$user' AND passw = '$passw'";
		$query = mysqli_query($conn, $sql); // thực thi truy vấn
		$row = mysqli_fetch_assoc($query); // lấy ra dữ liệu người đăng nhập đúng
		$num = mysqli_num_rows($query); // đếm số bản ghi trả ra

		if ($num == 1) {
			$_SESSION['id'] 	= $row['id_users'];
			$_SESSION['name'] 	= $row['name'];
			$_SESSION['status'] = $row['status'];
			header("Location: admin/index.php");
		}else{
			$error = "Tài khoản hoặc mật khẩu không đúng!";
		}
		
	}	

?>


<form action="" method="POST">
	<legend>Đăng nhập hệ thống</legend>
	<span style="color: red;">
		<?php if(isset($error)) { echo $error; } ?>
	</span>

	<div class="form-group">
		<label for="">Username</label>
		<input type="email" required name="user" class="form-control" value="<?php if(isset($users)){ echo $users; } ?>" placeholder="Nhập email của bạn">
	</div>

	<div class="form-group">
		<label for="">Password</label>
		<input type="password" required name="passw" class="form-control" value="" placeholder="Nhập pass">
	</div>

	<button type="submit" name="sm_login" class="btn btn-primary">Đăng nhập</button>
	<span>Nếu bạn chưa có tài khoản? <a href="index.php?page=register" style="color: red;">Đăng ký</a></span>
	

</form>