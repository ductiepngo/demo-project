<?php 
	session_start(); 
	if (!isset($_SESSION['id'])) {
		header("Location: ../index.php");
	}

	include_once '../Config/myConfig.php';
	include_once 'myFunction/myFunction.php';

?>

<!DOCTYPE html>
<html lang="">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Học viên IT-Plus</title>
		<link rel="stylesheet" href="../css/bootstrap.min.css" />
		<link rel="stylesheet" href="../css/my_css.css">


	</head>
	<body>
		
		<div class="container">
			<?php include_once 'layout/header.php'; ?>
			<!-- Start Banner website -->
			<?php include_once 'layout/banner.php'; ?>
			<!-- End banner website -->

			<!-- Start main -->
			<div class="row main_member">
				<div class="col-md-12">
					<?php include_once 'layout/col_left.php'; ?>
					
					
					<div class="col-md-9 col-sm-9 col-xs-12">
					<!-- START Nội dung thân website -->
						

						<?php  
							if (isset($_GET['page'])) {
								$page = $_GET['page'];
							}else{
								$page = 'list_member';
							}

							if (file_exists('views/'.$page.'.php')) {//  kiem tra xem trong thu muc view co file nao ten voi bien $page va extention la .php
								include_once 'views/'.$page.'.php';
							}else{
								echo "Error 404, trang không tồn tại.";
								echo "<a href='index.php'>Quay lại</a>";
							}

						?>
						
						

					<!-- START Nội dung thân website -->
					</div>
				</div>
			</div>
			<!-- End main -->

			<!-- Start Footer -->
			<?php include_once 'layout/footer.php'; ?>
			<!-- End Footer -->

		</div>

		<script src="../js/jquery.js"></script>
		<script src="../js/bootstrap.min.js"></script>
		<script src="js/myJava.js"></script>
	</body>
</html>