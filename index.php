<?php 
	session_start(); 
	if (isset($_SESSION['id'])) {
		// $sessionID = $_COOKIE['sessionID'] // 'asdfhsadfjkwer'
		// if(is_valid_token($sessionID)){
			header("Location: admin/index.php");
		// }
	}

	include_once 'Config/myConfig.php'; // Kết nối CSDL

?>
<!DOCTYPE html>
<html lang="">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>HỆ THỐNG IT-PLUS</title>
		<link rel="stylesheet" href="css/bootstrap.min.css" />
		<link rel="stylesheet" href="css/my_css.css">
	</head>
	<body>

		<div class="container">
			
			<div class="row" style="margin-top: 150px;">
				<div class="col-md-6 col-md-push-3">
					<!-- Đây là phần thân trang, phần thay đổi nhiều nhất khi người click qua lại các trang -->

					<?php  
						if (isset($_GET['page'])) {
							$page = $_GET['page'];
						}else{
							$page = 'login';
						}

						switch ($page) {
							case 'register':
								include_once 'views/register.php';
								break;

							case 'login':
								include_once 'views/login.php';
								break;

							default:
								echo "Error 404, trang không tồn tại.";
								echo "<a href='index.php'>Quay lại</a>";
								break;
						}
					?>

				</div>
			</div>

		</div>

		<script src="js/jquery.js"></script>
		<script src="js/myJava.js"></script>
		<script src="js/bootstrap.min.js"></script>
	</body>
</html>