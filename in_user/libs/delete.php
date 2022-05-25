<?php 

	include_once('../../core/function.php');
	$init = new manageFunction;

	$delete = $init->getSpecific(array($_POST['id']), "DELETE FROM image_location WHERE id = ?");

	if($delete > 0){
		echo json_encode(array("success" => "Item ID has been deleted!"));
	}
	else {
		echo json_encode(array("error" => "Failed to delete"));
	}


 ?>