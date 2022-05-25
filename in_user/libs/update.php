<?php 

	include_once('../../core/function.php');
	$init = new manageFunction;

	$data = $init->getSpecific(array(':id' => $_POST['hidden_id'],
									':title' => $_POST['title'],
									':location' => $_POST['location'],
									':description' => $_POST['description'],
									':dentrance' => $_POST['dentrance'],
									':nentrance' => $_POST['nentrance'],
									':cottage' => $_POST['cottage'],
									':rules' => $_POST['rules'],
									':roompackage' => $_POST['roompackage']),
									"UPDATE image_location SET title = :title, location= :location,description = :description ,dentrance= :dentrance ,nentrance= :nentrance, cottage= :cottage,rules = :rules, roompackage = :roompackage WHERE id = :id");

	if($data > 0){

		echo json_encode(array('success' => 'Update Successfully!'));
	}
	else {

		echo json_encode(array('error' => 'Failed to Update!'));
	}


 ?>