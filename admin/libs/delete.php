<?php 

	include_once('../../core/function.php');
	$init = new manageFunction;

	$delete = $init->deleteData(array($_POST['id']), "UPDATE image_location SET isDeleted = 1 WHERE id = ?");

	if($delete > 0){
		echo json_encode(array('success' => '<p class="alert alert-success">Delete Successfully</p>'));
	}
	else {
		echo json_encode(array('error' => '<p class="alert alert-danger">Failed to Delete</p>'));
	}





 ?>