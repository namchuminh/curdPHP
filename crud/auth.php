<?php
include __DIR__.'../../database/database.php';

function checkLogin($taiKhoan, $matKhau){
	$conn = connectDB();																	
	$sql = "SELECT * FROM sinhvien WHERE taiKhoan = '$taiKhoan' AND matKhau = '$matKhau'";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		return TRUE;
	} else {
	 	return FALSE;
	}
}

function checkRegister($tenSinhVien, $namSinh, $queQuan, $soDienThoai, $maLop, $taiKhoan, $matKhau){
	$conn = connectDB();
	$sql = "INSERT INTO sinhvien (tenSinhVien, namSinh, queQuan, soDienThoai, maLop, taiKhoan, matKhau)
		VALUES ('$tenSinhVien', '$namSinh', '$queQuan', '$soDienThoai', '$maLop', '$taiKhoan', '$matKhau')";
	if ($conn->query($sql) === TRUE) {
	  	return TRUE;
	} else {
	  	return FALSE;
	}
}


?>