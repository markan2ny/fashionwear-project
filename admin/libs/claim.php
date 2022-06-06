<?php
include_once '../../core/mysqli_database.php';

$init = new database;

$id = $_POST['id'];

$claim = $init->connect()->query("UPDATE cart SET is_claimed = 1 WHERE id = $id");

if($claim) {
    echo json_encode(['success' => 'Item has been claimed!']);
} else {
    echo json_encode(['error' => 'Something wrong..']);
}