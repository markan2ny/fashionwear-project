<?php 
	include_once('../../core/function.php');
	$init = new manageFunction;
	
	$data = $init->getSpecific(array($_POST['id']),"SELECT * FROM image_location WHERE id = ?");

	if($data > 0){
		echo json_encode($data);
	}


 ?>