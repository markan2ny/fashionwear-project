<?php 

	include_once('../../core/function.php');
	$init = new manageFunction;
	
	$d = $init->getSpecific(array(':status' => $_POST['status'], 'id' => $_POST['id']), "UPDATE users SET status = :status WHERE user_id = :id");


	if($d > 0){
		echo json_encode(array('success' => 'Account has been block'));
	}
	else {
		echo json_encode(array('error' => 'Something wrong'));
	}



 ?>