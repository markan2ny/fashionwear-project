<?php

include_once '../../core/mysqli_database.php';

$init = new database;

$qty = $_POST['qty'];
$prod_id = $_POST['prod_id'];
$id = $_POST['id'];

// $ap = $init->connect()->query("SELECT * FROM products WHERE id = $prod_id");

// $actual_qty  = $ap->fetch_object();

// $diff = $actual_qty->item_qty - $qty;

$init->connect()->query("UPDATE products SET item_qty = item_qty - $qty WHERE id = $prod_id");

$reservation = $init->connect()->query("UPDATE cart SET is_approve = 1 WHERE id = $id");



if($reservation) {
    echo json_encode(['success' => 'Item has been approved!']);
} else {
    echo json_encode(['error' => 'Something is wrong']);
}