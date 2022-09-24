<?php 
	session_start();
	include './crud/crud.php';
	if(!isset($_SESSION["taiKhoan"])){
		return header("Location: http://localhost/crud/");
	}else if(!isset($_GET['maSV'])){
		return header("Location: http://localhost/crud/home.php");
	}
	delete($_GET['maSV']);
	header("Location: http://localhost/crud/home.php");
 ?>