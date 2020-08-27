<form action="" method="POST">
	<legend>Đăng ký tài khoản</legend>

	<div class="form-group">
		<label for="">Họ tên <span style="color: red;">(*)</span></label>
		<input type="text" required name="name" class="form-control" value="" placeholder="Nhập họ tên của bạn">
	</div>

	<div class="form-group">
		<label for="">Tài khoản (Email) <span style="color: red;">(*)</span></label>
		<input type="email" required name="user" class="form-control" value="" placeholder="Nhập email của bạn">
	</div>

	<div class="form-group">
		<label for="">Mật khẩu <span style="color: red;">(*)</span></label>
		<input type="password" required name="passw" class="form-control" placeholder="*******">
	</div>

	<div class="form-group">
		<label for="">Xác nhận lại mật khẩu <span style="color: red;">(*)</span></label>
		<input type="password" required name="confirm_pass" class="form-control" placeholder="******">
	</div>

	<button type="submit" name="sm_register" class="btn btn-danger">Đăng ký </button>
	<span>Bạn đã có tài khoản <a href="index.php">Đăng nhập</a></span>

</form>