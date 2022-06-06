<?php
	session_start();

	include_once '../core/mysqli_database.php';
	$init = new database;


	$name = $_POST['name'];
	$email = $_POST['email'];
	$password = md5($_POST['password']);
	$address = $_POST['address'];
	$contact = $_POST['contact'];
	$username = $_POST['username'];


	$register = $init->connect()->query("INSERT INTO users(name, email, password,address, contact,username) VALUES('$name', '$email', '$password', '$address', '$contact', '$username')");

	if($register) {
		echo json_encode(['success' => 'You has been registered!']);

	} else { 
		echo json_encode(['error' => 'Somethis is wrong..']);
	}


 ?>
