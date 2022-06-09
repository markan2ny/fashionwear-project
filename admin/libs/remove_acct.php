<?php
include_once '../../core/mysqli_database.php';

$init = new database;

$id = $_POST['id'];

$remove = $init->connect()->query("DELETE FROM users WHERE id = $id");

if($remove) {
    echo json_encode(['success' => 'Account has been deleted!']);
} else {
    echo json_encode(['error' => 'Failed to delete']);
}