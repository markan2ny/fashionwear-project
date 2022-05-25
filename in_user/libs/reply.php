<?php 

	include_once('../../core/function.php');
	$init = new manageFunction;

	$d = $init->insertData(array(
							$_POST['receiver_id'],
							$_POST['sender_id'],
							$_POST['message'],
							date('Y-m-d h:i:s'),
							$_POST['emailTo'],
							$_POST['name']
						),
						"INSERT INTO inbox(receiver_id,sender_id,message,time,email,name) VALUES(?,?,?,?,?,?)");

	if($d == 1){

		$update = $init->updateData(array($_POST['sender_id']),"UPDATE inbox SET status = 1 WHERE receiver_id = ?");

		echo json_encode(array('success' => 'Message has been send'));
	}
	else {
		echo json_encode(array('error' => 'Something is wrong'));
	}


 ?>