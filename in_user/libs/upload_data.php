<?php 
session_start();
include_once('../../core/function.php');
$init = new manageFunction;
$count = 0;
$files = $_FILES['files'];
$allowed = array('jpeg', 'png', 'jpg', 'gif', 'ico');
$id = $_POST['hidden_id'];

// Get the contact & email address from current user
$data = $init->getSpecific(array($id), "SELECT * FROM users WHERE user_id = ?");

$per_name = $_FILES['permit']['name'];
$per_tmp = $_FILES['permit']['tmp_name'];
$per_ext = explode('.', $per_name);
$per_actual_ext = strtolower(end($per_ext));
in_array($per_actual_ext, $allowed);
$per_newname = time().'_'.rand(1000, 99999).'.'.$per_actual_ext;
move_uploaded_file($per_tmp, '../../admin/permits/'.$per_newname);


foreach($files['name'] as $position => $file_name){


	$file_tmp = $files['tmp_name'][$position];
		// Break the name of file
	$file_ext = explode('.', $file_name);
	$file_ext = strtolower(end($file_ext));

	if(in_array($file_ext, $allowed)){

		$file_new_name = time().'_'.rand(1000,9999).'.'.$file_ext;
		$file_destination = '../uploads/'.$file_new_name;
		if(move_uploaded_file($file_tmp, $file_destination)){
			$status = "not verified";
			$count = $count+ 1;
			$insert = $init->insertData(array(
				$_SESSION['account_id'],
				$file_new_name,
				$per_newname,
				$_POST['title'],
				$_SESSION['name'],
				$_POST['location'],
				$_POST['description'],
				date('Y-m-d'),
				$status,
				$count,
				$data[0]->email,
				$data[0]->contact,
				$_POST['dEntrance'],
				$_POST['nEntrance'],
				$_POST['roompackage'],
				$_POST['rules'],
				$_POST['cottage'],
				$_POST['business'],
				$_POST['add']
			),"INSERT INTO image_location(account_id, image,permit,title, name,location, description, date,status,thumbnail, email,contact,dentrance,nentrance,roompackage,rules,cottage,business,address) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)"
		);
			if($insert > 0){
				$_SESSION['title'] = $_POST['title'];
				// echo json_encode(array('success' => 'Uploaded'));
				echo 'upload';
			}
			else {
				echo json_encode(array('error' => 'Failed to upload'));
			}
		}
		else {
			echo json_encode(array('error' => 'Something is wrong'));
		}
	}
	else {
		echo json_encode(array('error' => 'File is not allowed'));
	}
}	


?>
	