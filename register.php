<?php 
	session_start();
	if(isset($_SESSION['taiKhoan'])){
		return header("Location: http://localhost/crud/home.php");
	}

	include "./crud/auth.php";
	$error = "";
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$taiKhoan = $_POST['taiKhoan'];
		$matKhau = $_POST['matKhau'];
		$tenSinhVien = $_POST['hoTen'];
		$maLop = $_POST['maLop'];
		$soDienThoai = $_POST['soDienThoai'];
		$queQuan = $_POST['queQuan'];
		$namSinh = $_POST['namSinh'];
		if(checkRegister($tenSinhVien, $namSinh, $queQuan, $soDienThoai, $maLop, $taiKhoan, $matKhau) == TRUE){
			header("Location: http://localhost/crud/index.php");
		}else{
			$error = "Đăng ký không thành công, vui lòng kiểm tra lại thông tin!";
		}
	}	

 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Ký Tài Khoản Hệ Thống CRUD Sinh Viên</title>
	<link rel="stylesheet" href="static/index.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<body>
	<div class="login-page">
		<div class="form">
			<form method="post">
			  <input type="text" placeholder="Tài khoản" name="taiKhoan" />
			  <input type="password" placeholder="Mật khẩu" name="matKhau" />
			  <input type="text" placeholder="Họ tên" name="hoTen" />
			  <input type="text" placeholder="Mã lớp" name="maLop" />
			  <input type="text" placeholder="Số điện thoại" name="soDienThoai" />
			  <input type="text" placeholder="Quê quán" name="queQuan" >
			  <input type="date" placeholder="Năm sinh" name="namSinh" >
			  <button>Đăng Ký</button>
			  <span style="color: red; font-size: 15px; margin-top: 15px; ">
			  		<?php 
			  			if(!empty($error) && isset($error)){ 
			  				echo $error; 
			  			} 
			  		?>
			  </span>
			  <p class="message">Already registered? <a href="index.php">Sign In</a></p>
			</form>
		</div>
	</div>
	<script src="static/index.js"></script>
</body>
</html>