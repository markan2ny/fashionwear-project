<?php
	session_start();
	include_once('../core/function.php');
	$init = new manageFunction;

	$insert = $init->insertData(array(
		$_POST['name'],
		$_POST['email'],
		md5($_POST['password']),
		time(),
		$_POST['address'],
		$_POST['contact'],
		$_POST['username'],
		), "INSERT INTO users(name,email,password,account_id,address,contact,username) VALUES(?,?,?,?,?,?,?)"
	);


	if($insert > 0){
		echo json_encode(array(
		'success' => '<p class="alert alert-success">Registration Complete. You will redirect to login in 3 sec.</p>'
		)
	);
	}
	else {
		echo json_encode(array(
			'error' => 'Something wrong'
		)
	);
	}


 ?>
