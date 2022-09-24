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



?>