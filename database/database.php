<?php 

include  __DIR__.'../../config/config.php';

function connectDB(){
	$conn = new mysqli(SERVERNAME, USERNAME, PASSWORD, DATABASE, PORT);
	if ($conn->connect_error) {
	 	return die("Ket noi database that bai: " . $conn->connect_error);
	}
	return $conn;
}


