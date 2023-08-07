<?php 
	include './crud/crud.php';
	$data = read();
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
						<a href="./create.php" class="btn btn-success" ><i class="material-icons">&#xE147;</i> <span>Add New Product</span></a>
					</div>
				</div>
			</div>
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th>Id</th>
						<th>Image</th>
						<th>Product Name</th>
						<th>Price</th>
						<th>Create Date</th>
						<th>Description</th>
						<th>Category Id</th>
						<th>Actions</th>
					</tr>
				</thead>
				<tbody>
					<?php if($data == true){ ?>
						<?php foreach ($data as $key => $value): ?>
							<?php 
								$array = explode(" ", $value['createdate']);
								$date = $array[0];
							 ?>
							<tr>
								<td style="color: blueviolet; cursor: pointer;"><?php echo $value['id']; ?></td>
								<td>
									<img src="<?php echo $value['image']; ?>" width="100" height="100">
								</td>
								<td><?php echo $value['productname']; ?></td>
								<td><?php echo number_format($value['price']); ?>đ</td>
								<td><?php echo $date; ?></td>
								<td><?php echo $value['description']; ?></td>
								<td><?php echo $value['categoryid']; ?></td>
								<td>
									<a href="./update.php?id=<?php echo $value['id']; ?>" class="edit" ><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
									<a value="<?php echo $value['id']; ?>" href="#deleteEmployeeModal" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
								</td>
							</tr>
						<?php endforeach ?>
					<?php } ?>
				</tbody>
			</table>
			<?php if($data == false){ ?>
				<p class="text-center mt-4">Empty product list!</p>
			<?php } ?>
		</div>
	</div>        
</div>

<!-- Delete Modal HTML -->
<div id="deleteEmployeeModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form>
				<div class="modal-header">						
					<h4 class="modal-title">Delete Product</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">					
					<p>Are you sure you want to delete these Records?</p>
					<p class="text-warning"><small>This action cannot be undone.</small></p>
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
					<a href="#" class="btn btn-danger delete_action">Delete</a>
				</div>
			</form>
		</div>
	</div>
</div>

<script src="./static/index.js"></script>
</body>
</html>