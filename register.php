<?php 
  session_start();
  if(isset($_SESSION["logged"])){
    header("Location: ./index.php");
    die();
  }
  include './crud/auth.php';
  if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $repassword = $_POST['repassword'];

    $info = "";

    if(empty($username) || empty($email) || empty($password) || empty($repassword)){
      $info = "Vui lòng nhập đủ thông tin!";
    }else{
      if($password != $repassword){
        $info = "Mật khẩu không trùng khớp!";
      }else{
        if(checkUserIsset($username) == FALSE){
          $info = "Tài khoản đã tồn tại!";
        }else{
          if(insertUser($username, $email, md5($password)) != FALSE){
            $info = "Đăng ký tài khoản thành công!";
          }else{
            $info = "Có lỗi khi đăng ký tài khoản!";
          }
        }
      }
    }
  }
?>

<!DOCTYPE html>
<!-- Coding By CodingNepal - codingnepalweb.com -->
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" type="text/css" href="./static/auth.css">
  <title>Đăng Ký </title>
  <!---Custom CSS File--->
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="container">
    <div class="registration form">
      <header>Đăng Ký</header>
      <?php if(!empty($info)){ ?>
        <div class="signup">
          <span class="signup"><?php echo $info; ?></span>
        </div>
        <br> 
      <?php } ?>
      <form method="POST">
        <input type="text" placeholder="Nhập tài khoản..." name="username" required>
        <input type="email" placeholder="Nhập email..." name="email" required> 
        <input type="password" placeholder="Nhập mật khẩu..." name="password" required>
        <input type="password" placeholder="Xác nhận mật khẩu..." name="repassword" required>
        <input type="submit" class="button" value="Đăng Ký">
      </form>
      <div class="signup">
        <span class="signup">Đã có tài khoản?
         <a href="./login.php">Đăng Nhập</a>
        </span>
      </div>
    </div>
  </div>
</body>
</html>