<?php
  session_start();
  if(!isset($_SESSION["logged"])){
    header("Location: ./login.php");
    die();
  }
  include './crud/crud.php';
  
  if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $id = $_POST['id'];
    $productname = $_POST['productname'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    $categoryid = $_POST['categoryid'];

    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);

    $info = "";

    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {            
        $image = $target_file;
        $last_id = create($id, $productname, $image, $price, $description, $categoryid);
        if(is_numeric($last_id)){
          $info = "Thêm sản phẩm thành công!";
        } else {
          $info = "Mã sản phẩm đã tồn tại!";
        }
    } else {
        $info = "Có lỗi khi thực hiện tải hình ảnh!";
    }
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Product Manage</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="./static/index.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</head>
<body>
  <div class="container-xl">
    <div class="table-responsive">
      <div class="table-wrapper">
        <div class="table-title">
          <div class="row">
            <div class="col-sm-6">
              <a href="./index.php" style="color: unset;"><h2>Quản Lý <b>Sản Phẩm</b></h2></a>
            </div>
            <div class="col-sm-3">
              
            </div>
            <div class="col-sm-3">
              <a href="./logout.php" class="btn" ><i class="material-icons"></i> <span>Đăng Xuất</span></a>
              <a class="btn" ><i class="material-icons"></i> <span>Chào, <?php echo $_SESSION['username']; ?></span></a>
            </div>
          </div>
        </div>
      </div>   
      <form class="bg-white px-3 pb-2" method="POST" enctype="multipart/form-data">
          <div class="form-group">
            <label>Id</label>
            <input type="text" class="form-control" name="id" required>
          </div>
          <div class="form-group">
            <label>Product Name</label>
            <input type="text" class="form-control" name="productname" required>
          </div>
          <div class="form-group">
            <label>Image</label>
            <input class="form-control" style="height: 44px;" name="image" type="file" required>
          </div>
          <div class="form-group">
            <label>Price</label>
            <input type="number" class="form-control" name="price" required>
          </div>  
          <div class="form-group">
            <label>Description</label>
            <textarea class="form-control" name="description" required></textarea>
          </div>
          <div class="form-group">
            <label>Category Id</label>
            <input type="text" class="form-control" name="categoryid" required>
          </div>        
          <div class="form-group mt-5">
            <input type="submit" style="width: 100%;" class="btn btn-success" value="Thêm Sản Phẩm">
          </div>
      </form>
    </div>
  </div>

  <?php if(!empty($info)){ ?>
    <div class="modal fade show" style="display: block;">
      <div class="modal-dialog">
        <div class="modal-content">
          <form>
            <div class="modal-header">            
              <h4 class="modal-title">Thông Báo</h4>
              <button type="button" class="close x" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">          
              <p><?php echo $info; ?></p>
            </div>
            <div class="modal-footer">
              <input type="button" class="btn btn-success x" data-dismiss="modal" value="Thoát">
            </div>
          </form>
        </div>
      </div>
    </div>
  <?php } ?>
  <script src="./static/index.js"></script>
</body>
</html>



