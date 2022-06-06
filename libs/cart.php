<?php

include_once '../core/mysqli_database.php';
$init = new database;

$id = $_POST['user_id'];
$item_id = $_POST['item_id'];
$order_qty = $_POST['order_qty'];
$item_name = $_POST['item_name'];
$item_image = $_POST['item_image'];
$item_price = $_POST['item_price'];
$item_size = $_POST['item_size'];
$product_id = $_POST['product_id'];




$reservee = $init->connect()->query("SELECT name FROM users WHERE id = $id");
$name = $reservee->fetch_object();

$c = $init->connect()->query("INSERT INTO cart(item_name, item_image, item_price, user_id,reservee, order_qty, item_size, product_id) VALUES('$item_name', '$item_image', '$item_price','$id','$name->name', $order_qty, '$item_size', $product_id)");

if($c) {
    echo json_encode(['success' => 'Item has been reserved!']);
} else {
    echo json_encode(['error' => 'Something wrong..']);
}