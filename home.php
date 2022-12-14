<?php 
	session_start();
	include './crud/crud.php';
	if(!isset($_SESSION["taiKhoan"])){
		return header("Location: http://localhost/crud/");
	}
	$data = read();
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Trang Chủ - CURD Sinh Viên</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
	<div class="row">
		<div class="col-md-8">
			<h2>CURD Sinh Viên</h2>
  		<p>Chức năng gồm: hiển thị, thêm, sửa, xóa sinh viên!</p>   
		</div>
		<div class="col-md-4 text-right" style="padding-top: 25px;">
			<span>Xin chào, <?php echo $_SESSION['taiKhoan']; ?></span>
			<a href="http://localhost/crud/logout.php">| Đăng Xuất</a>
			<div style="margin-top: 15px;">
				<a href="http://localhost/crud/create.php">Thêm Sinh Viên</a>
			</div>
		</div>
	</div>
           
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Mã Sinh Viên</th>
        <th>Tên Sinh Viên</th>
        <th>Năm Sinh</th>
        <th>Quê Quán</th>
        <th>Số Điện Thoại</th>
        <th>Mã Lớp</th>
        <th>Tài Khoản</th>
        <th>Mật Khẩu</th>
        <th>Phân Quyền</th>
        <th>Chức Năng</th>
      </tr>
    </thead>
    <tbody>
    	<?php for($i = 0; $i < count($data); $i++){ ?>
			<tr>
				<td><?php echo $data[$i]["maSV"]; ?></td>
				<td><?php echo $data[$i]["tenSinhVien"]; ?></td>
				<td><?php echo $data[$i]["namSinh"]; ?></td>
				<td><?php echo $data[$i]["queQuan"]; ?></td>
				<td><?php echo $data[$i]["soDienThoai"]; ?></td>
				<td><?php echo $data[$i]["maLop"]; ?></td>
				<td><?php echo $data[$i]["taiKhoan"]; ?></td>
				<td><?php echo $data[$i]["matKhau"]; ?></td>
				<td><?php echo $data[$i]["phanQuyen"]; ?></td>
				<td>
					<a href="http://localhost/crud/update.php?maSV=<?php echo $data[$i]["maSV"]; ?>" >Sửa</a>
					<a href="#" style="margin-left: 15px;" class="xoa" value="<?php echo $data[$i]["maSV"]; ?>">Xóa</a>
				</td>
			</tr>
      	<?php }?>
    </tbody>
  </table>
</div>
<script src="static/index.js"></script>
</body>
</html>
