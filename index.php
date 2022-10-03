<?php 
	session_start();
	
	if(isset($_SESSION['taiKhoan'])){
		return header("Location: http://localhost/crud/home.php");
	}

	include "./crud/auth.php";
	$error = "";
	if(isset($_POST['taiKhoan']) && isset($_POST['matKhau'])){
		$taiKhoan = $_POST['taiKhoan'];
		$matKhau = $_POST['matKhau'];
		if(checkLogin($taiKhoan, $matKhau) == TRUE){
			$_SESSION["taiKhoan"] = $taiKhoan;
			header("Location: http://localhost/crud/home.php");
		}else{
			$error = "Sai tài khoản hoặc mật khẩu!";
		}
	}	

 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Đăng Nhập Hệ Thống CRUD Sinh Viên</title>
	<link rel="stylesheet" href="static/index.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<body>
	<div class="login-page">
		<div class="form">
			<form class="login-form" method="post">
			  <input type="text" placeholder="tài khoản" name="taiKhoan" />
			  <input type="password" placeholder="mật khẩu" name="matKhau" />
			  <button type="submit">Đăng Nhập</button>
			  <span style="color: red; font-size: 15px; margin-top: 15px; ">
			  		<?php 
			  			if(!empty($error) && isset($error)){ 
			  				echo $error; 
			  			} 
			  		?>
			  </span>
			  <p class="message">Not registered? <a href="register.php">Create an account</a></p>
			</form>
		</div>
	</div>
	<script src="static/index.js"></script>
</body>
</html>