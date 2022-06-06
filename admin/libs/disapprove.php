<?php

include_once '../../core/mysqli_database.php';

$init = new database;

$id = $_POST['id'];

$d = $init->connect()->query("DELETE FROM cart WHERE id = $id");

if($d) {
    echo json_encode(['success' => 'Request has been deleted!']);
} else {
    echo json_encode(['error' => 'Something is wrong..']);
}