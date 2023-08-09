<?php 

include  __DIR__.'../../database/database.php';

function checkUserIsset($username){
	$data = array();
	$conn = connectDB();																																										
	$sql = "SELECT * FROM user WHERE username = '$username'";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		return FALSE;
	} else {
	 	return TRUE;
	}
}

function insertUser($username, $email, $password){
	$conn = connectDB();
	$sql = "INSERT INTO user (`username`, `email`, `password`)
		VALUES ('$username', '$email', '$password')";
	if ($conn->query($sql) === TRUE) {
	  	return $conn->insert_id;
	} else {
	  	return FALSE;
	}
}

function checkUserLogin($username, $password){
	$data = array();
	$conn = connectDB();																																										
	$sql = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		return TRUE;
	} else {
	 	return FALSE;
	}
}





