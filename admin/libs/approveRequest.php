<?php 

	include_once('../../core/function.php');
	$init = new manageFunction;

	$data = $init->getSpecific(array($_POST['id']), "UPDATE image_location SET status = 'verified' WHERE id = ?");

	if($data > 0){

		echo json_encode(array('success' => '<p class="alert alert-success"><i class="mdi mdi-check"></i> Item has been Verified!</p>'));
	}
	else {
		echo json_encode(array('error' => '<p class="alert alert-danger">SOMETHING IS WRONG!!</p>'));

	}



 ?>