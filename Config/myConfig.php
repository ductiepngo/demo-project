<?php  
	// Kết nối cơ sở dữ liệu
	$host = "localhost";
	$user = "root";
	$pass = "";
	$database = "php0620e_manager_itplus";

	$conn = mysqli_connect($host, $user, $pass, $database) or die("Can't connect database!");

	if ($conn){
		mysqli_set_charset($conn, 'utf8');
	}else{
		echo "Can't connect database!";
	}
?>