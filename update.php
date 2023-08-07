<?php 
  include './crud/crud.php';

  if(empty($_GET['id'])){
    header("Location: index.php");
    exit();
  }

  $data = getById($_GET['id']);

  $image = $data[0]['image'];

  if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $id = $data[0]['id'];
    $productname = $_POST['productname'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    $categoryid = $_POST['categoryid'];

    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);

    $info = "";

    if(is_uploaded_file($_FILES["image"]["tmp_name"])){
      if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {            
          $image = $target_file;
          $updated = update($id, $productname, $image, $price, $description, $categoryid);
          if($updated){
            $info = "Successfully updated product information!";
          } else {
            $info = "Unsuccessful product information update!";
          }
          $data = getById($_GET['id']);
      } else {
          $info = "Sorry, an error occurred while uploading your file!";
      }
    }else{
      $updated = update($id, $productname, $image, $price, $description, $categoryid);
      if($updated){
        $info = "Successfully updated product information!";
      } else {
        $info = "Unsuccessful product information update!";
      }
      $data = getById($_GET['id']);
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
              <h2>Manage <b>Product</b></h2>
            </div>
            <div class="col-sm-6">
              <a href="./index.php" class="btn btn-success" ><i class="material-icons"></i> <span>Products List</span></a>
            </div>
          </div>
        </div>
      </div>   
      <form class="bg-white px-3 pb-2" method="POST" enctype="multipart/form-data">
          <div class="form-group">
            <label>Id</label>
            <input type="text" class="form-control" name="id" required value="<?php echo $data[0]['id']; ?>" disabled>
          </div>
          <div class="form-group">
            <label>Product Name</label>
            <input type="text" class="form-control" name="productname" required value="<?php echo $data[0]['productname']; ?>">
          </div>
          <div class="form-group">
            <label>Image</label>
            <input class="form-control" style="height: 44px;" name="image" type="file">
          </div>
          <div class="form-group">
            <label>Price</label>
            <input type="number" class="form-control" name="price" required value="<?php echo $data[0]['price']; ?>">
          </div>  
          <div class="form-group">
            <label>Description</label>
            <textarea class="form-control" name="description" required><?php echo $data[0]['description']; ?></textarea>
          </div>
          <div class="form-group">
            <label>Category Id</label>
            <input type="text" class="form-control" name="categoryid" required value="<?php echo $data[0]['categoryid']; ?>">
          </div>        
          <div class="form-group mt-5">
            <input type="submit" style="width: 100%;" class="btn btn-success" value="Update Product">
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
              <h4 class="modal-title">Notification</h4>
              <button type="button" class="close x" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">          
              <p><?php echo $info; ?></p>
            </div>
            <div class="modal-footer">
              <input type="button" class="btn btn-success x" data-dismiss="modal" value="Cancel">
            </div>
          </form>
        </div>
      </div>
    </div>
  <?php } ?>
  <script src="./static/index.js"></script>
</body>
</html>



