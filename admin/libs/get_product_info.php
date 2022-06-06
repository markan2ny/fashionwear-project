<?php
include_once '../../core/mysqli_database.php';

$init = new database;

$id = $_POST['id'];

$prod = $init->connect()->query("SELECT * FROM products WHERE id = $id");

if($prod->num_rows > 0) {
    echo json_encode(['data' => $prod->fetch_object()]);
} else {
    echo json_encode(['error' => 'No data found!']);
}
