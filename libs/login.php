<?php

session_start();
include_once('../core/function.php');
$init = new manageFunction;


$useremail = $_POST['useremail'];
$password = md5($_POST['password']);

$login = $init->login(array(
	':useremail' => $useremail,
	':password' => md5($password)),
	"SELECT * FROM users WHERE email=:useremail OR username=:useremail LIMIT 1"
);

if( count($login) > 0 ) {
	if($login[0]->password === $password) {
		echo json_encode($login);
		foreach($login as $row){
			$_SESSION['email'] = $row->email;
			$_SESSION['user_id'] = $row->user_id;
			$_SESSION['account_id'] = $row->account_id;
			$_SESSION['name'] = $row->name;
		}
	} else {
		echo json_encode(['message' => 'Invalid Credetials']);
	}
} else {
	echo json_encode(['error' => 'Invalid Credetials']);
}






?>