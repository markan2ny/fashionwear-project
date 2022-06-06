<?php
session_start();
include_once '../core/mysqli_database.php';
$init = new database;

$useremail = $_POST['useremail'];
$password = md5($_POST['password']);


$login = $init->connect()->query("SELECT * FROM users WHERE username = '$useremail' OR email = '$useremail' LIMIT 1");

if($login->num_rows > 0) {

$result = $login->fetch_object();

if($password === $result->password) {

	echo json_encode(['success' => 'Login success', 'data' => $result]);
    
	$_SESSION['id'] = $result->id;
	$_SESSION['name'] = $result->name;
	$_SESSION['email'] = $result->email;


} else {
	echo json_encode(['error' => 'Invalid credentials']);
}


} else {
	echo json_encode(['error' => 'Invalid credentials']);
}

?>