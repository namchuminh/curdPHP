<?php 
	include './crud/crud.php';
	delete($_GET['id']);
	header("Location: index.php");
 ?>