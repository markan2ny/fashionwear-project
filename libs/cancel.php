<?php

include_once '../core/mysqli_database.php';
$init = new database;

$id = $_POST['id'];

$cancel = $init->connect()->query("DELETE FROM cart WHERE id = $id");

if($cancel) {
    echo json_encode(['success' => 'Item has been removed!']);
} else {
    echo json_encode(['error' => 'Item failed to removed!']);
}