<?php 
	include_once('../../core/function.php');
	$init = new manageFunction;

	$data = $init->updateData(array($_POST['id']), "UPDATE image_location SET status = 'verified' WHERE id = ?");

	if($data > 0 ){
		echo json_encode(array('success' => 'Entry ID <b>'.$_POST['id'].'</b> has been verified'));
	}
	else {
		echo json_encode(array('error' => 'Item id '.$_POST['id'].' Failed to verified'));

	}
 ?>