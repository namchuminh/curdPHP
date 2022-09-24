<?php 
  session_start();
  include './crud/crud.php';
  if(!isset($_SESSION["taiKhoan"])){
    return header("Location: http://localhost/crud/");
  }else if(!isset($_GET['maSV'])){
    return header("Location: http://localhost/crud/home.php");
  }

  $data = getByMaSV($_GET['maSV']);

  if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $maSV = $_GET['maSV'];
    $tenSinhVien = $_POST['tenSinhVien'];
    $namSinh = $_POST['namSinh'];
    $queQuan = $_POST['queQuan'];
    $soDienThoai = $_POST['soDienThoai'];
    $maLop = $_POST['maLop'];
    $taiKhoan = $_POST['taiKhoan'];
    $matKhau = $_POST['matKhau'];
    $phanQuyen = $_POST['phanQuyen'];
    if(update($tenSinhVien, $namSinh, $queQuan, $soDienThoai, $maLop, $taiKhoan, $matKhau, $phanQuyen, $maSV) == TRUE){
      echo "<script>alert('Cập nhật thành công!')</script>";
      header("Location: http://localhost/crud/home.php");
    }else{
      echo "<script>alert('Cập nhật không thành công!')</script>";
    }
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Sửa Sinh Viên</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Sửa Thông Tin Sinh Viên</h2>
  <form method="POST">
    <div class="row">
      <div class="form-group col-md-6">
        <label for="tenSinhVien">Tên Sinh Viên</label>
        <input type="text" class="form-control"  placeholder="Tên sinh viên" name="tenSinhVien">
      </div>
      <div class="form-group col-md-6">
        <label for="namSinh">Năm Sinh</label>
        <input type="text" class="form-control" placeholder="Năm sinh" name="namSinh">
      </div>
    </div>
    <div class="row">
      <div class="form-group col-md-6">
        <label for="queQuan">Quê Quán</label>
        <input type="text" class="form-control" placeholder="Quê quán" name="queQuan">
      </div>
      <div class="form-group col-md-6">
        <label for="soDienThoai">Số Điện Thoại</label>
        <input type="text" class="form-control" placeholder="Số điện thoại" name="soDienThoai">
      </div>
    </div>
    <div class="row">
      <div class="form-group col-md-6">
        <label for="maLop">Mã Lớp</label>
        <input type="text" class="form-control"  placeholder="Mã lớp" name="maLop">
      </div>
      <div class="form-group col-md-6">
        <label for="taiKhoan">Tài Khoản</label>
        <input type="text" class="form-control"  placeholder="Tài khoản" name="taiKhoan">
      </div>
    </div>
    <div class="row">
      <div class="form-group col-md-6">
        <label for="matKhau">Mật Khẩu</label>
        <input type="text" class="form-control" placeholder="Mật khẩu" name="matKhau">
      </div>
      <div class="form-group col-md-6">
        <label for="phanQuyen">Phân Quyền</label>
        <input type="text" class="form-control" id="pwd" placeholder="Phân quyền" name="phanQuyen">
      </div>
    </div>
    <button type="submit" class="btn btn-default ">Sửa</button>
  </form>
</div>

</body>
</html>
