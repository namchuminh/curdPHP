<?php 

include  __DIR__.'../../database/database.php';

function create($id, $productname, $image, $price, $description, $categoryid){
	$conn = connectDB();
	$sql = "INSERT INTO products (`id`, `productname`, `image`, `price`, `description`, `categoryid`)
		VALUES ('$id', '$productname', '$image', '$price', '$description', '$categoryid')";
	if ($conn->query($sql) === TRUE) {
	  	return $conn->insert_id;
	} else {
	  	return FALSE;
	}
}

function read(){
	$data = array();
	$conn = connectDB();																																										
	$sql = "SELECT * FROM products";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			array_push($data,$row);
		}
		return $data;
	} else {
	 	return FALSE;
	}
}

function update($id, $productname, $image, $price, $description, $categoryid){
	$conn = connectDB();
	$sql = "UPDATE products SET productname = '$productname', image = '$image', price = '$price', description = '$description', categoryid = '$categoryid' WHERE id = '".$id."'";
	if ($conn->query($sql) === TRUE) {
		return TRUE;
	} else {
		return FALSE;
	}
}

function delete($id){
	$conn = connectDB();
	$sql = "DELETE FROM products WHERE id = '".$id."'";
	if ($conn->query($sql) === TRUE) {
	 	return TRUE;
	} else {
		return FALSE;
	}
}

function getById($id){
	$data = array();
	$conn = connectDB();																																										
	$sql = "SELECT * FROM products WHERE id = '".$id."'";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			array_push($data,$row);
		}
		return $data;
	} else {
	 	return FALSE;
	}
}

