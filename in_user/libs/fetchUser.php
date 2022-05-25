<?php 
	include_once('../../core/function.php');
	$init = new manageFunction;


	$f = $init->getSpecific(array(28), "SELECT * FROM users WHERE user_id = ?");

	if($f > 0){
		echo json_encode($f);
	}


 ?>