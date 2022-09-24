<?php 

include  __DIR__.'../../database/database.php';

function create($tenSinhVien, $namSinh, $queQuan, $soDienThoai, $maLop, $taiKhoan, $matKhau){
	$conn = connectDB();
	$sql = "INSERT INTO sinhvien (tenSinhVien, namSinh, queQuan, soDienThoai, maLop, taiKhoan, matKhau)
		VALUES ('$tenSinhVien', '$namSinh', '$queQuan', '$soDienThoai', '$maLop', '$taiKhoan', '$matKhau')";
	if ($conn->query($sql) === TRUE) {
	  	return TRUE;
	} else {
	  	return FALSE;
	}
}

function read(){
	$data = array();
	$conn = connectDB();																																										
	$sql = "SELECT * FROM sinhvien";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			array_push($data,$row);
		}
		return $data;
	} else {
	 	return FALSE;
	}
}

function update($tenSinhVien, $namSinh, $queQuan, $soDienThoai, $maLop, $taiKhoan, $matKhau, $phanQuyen, $maSV){
	$conn = connectDB();
	$sql = "UPDATE sinhvien SET tenSinhVien = '$tenSinhVien', namSinh = '$namSinh', queQuan = '$queQuan', soDienThoai = '$soDienThoai', maLop = '$maLop', taiKhoan = '$taiKhoan', matKhau = '$matKhau', phanQuyen = '$phanQuyen'  WHERE maSV = ".$maSV;
	if ($conn->query($sql) === TRUE) {
		return TRUE;
	} else {
		return FALSE;
	}
}

function delete($maSV){
	$conn = connectDB();
	$sql = "DELETE FROM sinhvien WHERE maSV =".$maSV;
	if ($conn->query($sql) === TRUE) {
	 	return TRUE;
	} else {
		return FALSE;
	}
}

function getByMaSV($maSV){
	$data = array();
	$conn = connectDB();																																										
	$sql = "SELECT * FROM sinhvien WHERE maSV =".$maSV;
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			array_push($data,$row);
		}
		return $data;
	} else {
	 	return FALSE;
	}
}

