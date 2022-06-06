<?php
include_once '../../core/mysqli_database.php';

$init = new database;

$id = $_POST['hidden_id'];
$qty = $_POST['restock'];

$a = $init->connect()->query("UPDATE products SET item_qty = item_qty + $qty WHERE id = $id");

if($a) {
    echo json_encode(['success' => 'New stock has been added']);
} else {
    echo json_encode(['error' => 'Something is wrong..']);
}