<?php  
	
	function getMember(){
		global $conn;

		$sql = "SELECT * FROM tbl_sinhvien, tbl_khoa
				WHERE tbl_sinhvien.idKhoa = tbl_khoa.idKhoa 
				ORDER BY tbl_sinhvien.idHV DESC";
		$query = mysqli_query($conn, $sql);

		$result = array();
		while ($row = mysqli_fetch_assoc($query)) {
			// $result[] = $row;
			array_push($result, $row) ;
		}
		return $result;
	}

	// Lấy ra thông tin khoa
	function getFaculty(){
		global $conn;

		$sql = "SELECT *FROM tbl_khoa"; // khai bao cau lenh truy van 
		$query = mysqli_query($conn, $sql);//thuc thi cau lenh truy van 

		$result = array();
		while ($row = mysqli_fetch_assoc($query)) {
			$result[] = $row;
		}
		return $result;
	} 

	// Thêm mới sinh viên
	function addMember($idKhoa, $name, $phone, $email, $addres, $birthday){

		global $conn;

		$sql = "INSERT INTO tbl_sinhvien(idKhoa, name, phone, email, addres, birthday) VALUES($idKhoa, '$name', '$phone', '$email', '$addres', '$birthday')";
		return mysqli_query($conn, $sql);
	}

	// Kiểm tra email
	function checkEMail($mail){
		global $conn;

		$sql = "SELECT *FROM tbl_sinhvien WHERE email = '$mail'";
		$query = mysqli_query($conn, $sql);
		$num = mysqli_num_rows($query);
		return $num;
	}

	// Lấy thông tin học viên qua id
	function getMember_id($id){
		global $conn;

		$sql = "SELECT *FROM tbl_sinhvien WHERE idHV = $id";
		$query = mysqli_query($conn, $sql);
		return mysqli_fetch_assoc($query);
	}

	// Cập nhật thông tin học viên
	function updateMember($id, $idKhoa, $name, $phone, $addres, $birthday){

		global $conn;
		$sql = "UPDATE tbl_sinhvien 
				SET idKhoa = $idKhoa, name = '$name', phone = '$phone', addres = '$addres', birthday = '$birthday' 
				WHERE idHV = $id";
		return mysqli_query($conn, $sql);
	}

	// Tìm kiếm học viên qua SĐT
	function searchMember($phone){
		global $conn;

		$sql = "SELECT *FROM tbl_sinhvien, tbl_khoa
				WHERE tbl_sinhvien.idKhoa = tbl_khoa.idKhoa AND phone LIKE '%$phone%'";
		$query = mysqli_query($conn, $sql);
		$result = array();

		while ($row = mysqli_fetch_assoc($query)) {
			$result[] = $row;
		}
		return $result;
	}

?>