<?php

include_once('../../core/function.php');
$init = new manageFunction;

$sender_id = $_POST['sender_id'];
$receiver_id = $_POST['receiver_id'];
$name = $_POST['name'];
$email = $_POST['email'];

$insert = $init->insertData(array($sender_id, $receiver_id, $_POST['message'], date('Y-m-d h:i:s'), $name, $email), "INSERT INTO inbox(sender_id,receiver_id, message, time ,name, email) VALUES(?,?,?,?,?,?)");

if ($insert > 0) {
	echo json_encode(array('success' => 'Message has been sent'));
} else {
	echo json_encode(array('error' => "Sending Failed"));
}