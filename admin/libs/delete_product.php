<?php

include_once '../../core/mysqli_database.php';

$init = new database;

$id = $_POST['id'];


$delete = $init->connect()->query("DELETE FROM products WHERE id = $id");

if($delete) {
    echo json_encode(['success' => 'success deleted!']);
} else {
    echo json_encode(['error' => 'faild to delete']);
}