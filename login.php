<?php 
  session_start();
  if(isset($_SESSION["logged"])){
    header("Location: ./index.php");
    die();
  }
  include './crud/auth.php';
  if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $info = "";

    if(empty($username) || empty($password)){
      $info = "Vui lòng nhập đủ thông tin!";
    }else{
      if(checkUserLogin($username, md5($password)) == TRUE){
        $_SESSION["logged"] = TRUE;
        $_SESSION["username"] = $username;
        header("Location: ./index.php");
      }else{
        $info = "Tài khoản hoặc mật khẩu không đúng!";
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
  <title>Đăng Nhập</title>
  <!---Custom CSS File--->
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="container">
    <div class="login form">
      <header>Đăng Nhập</header>
      <?php if(!empty($info)){ ?>
        <div class="signup">
          <span class="signup"><?php echo $info; ?></span>
        </div>
        <br> 
      <?php } ?>
      <form method="POST" action="#">
        <input type="text" placeholder="Nhập tài khoản..." name="username" required>
        <input type="password" placeholder="Nhập mật khẩu..." name="password" required>
        <a href="#">Quên mật khẩu?</a>
        <input type="submit" class="button" value="Đăng Nhập">
      </form>
      <div class="signup">
        <span class="signup">Không có tài khoản?
         <a href="./register.php">Đăng Ký</a>
        </span>
      </div>
    </div>
  </div>
</body>
</html>
