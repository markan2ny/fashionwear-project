<?php 

	include_once('../../core/function.php');
	$init = new manageFunction;


	$sendData = $init->insertData(array(
								 $_POST['senderID'],
								 $_POST['receiverID'],
								 $_POST['name'],
								 $_POST['email'],
								 $_POST['address'],
								 $_POST['contact'],
								 $_POST['from'],
								 $_POST['to'],
								 $_POST['rooms'],
								 $_POST['cottage'],
								 $_POST['hidden_title'],
								 $_POST['roomType'],
								 $_POST['cottageType'],
								 $_POST['adult'],
								 $_POST['senior'],
								 $_POST['children']),
								"INSERT INTO reservation(senderID,receiverID,name,email,address,contact,dateFrom,dateTo,rooms,cottage,resort_name,roomType,cottageType,adult,senior,children) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");

	if($sendData > 0){

		echo json_encode(array('success' => 'Complete'));

	}
	else {

		echo json_encode(array('error' => 'Something is wrong'));
	}












 ?>