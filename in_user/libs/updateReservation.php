<?php 

	include_once('../../core/function.php');
	$init = new manageFunction;

	$c = $init->getData("SELECT * FROM reservation WHERE isRead = 1 AND status = 1 ");
	if(count($c) == 1){
		echo json_encode(array('error' => 'Not Available'));
	}
	else {



	$delete = $init->getSpecific(array($_POST['id']), "UPDATE reservation SET status = 1,isRead = 1 WHERE id = ?");

	if($delete > 0){
		echo json_encode(array("success" => "Update Successfully"));
	}
	else {
		echo json_encode(array("error" => "Failed to Update"));
	}
}

 ?>