<?php
include_once '../../core/mysqli_database.php';

$init = new database;

$id = $_POST['id'];

$remove = $init->connect()->query("DELETE FROM cart WHERE id = $id");

if($remove) {
    echo json_encode(['success' => 'Item has been claimed!']);
} else {
    echo json_encode(['error' => 'Something wrong..']);
}