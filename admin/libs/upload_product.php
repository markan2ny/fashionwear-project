<?php

// $conn = new mysqli('localhost', 'root', '@ven2017', 'fashionwear');
include_once '../../core/mysqli_database.php';

$init = new database;

$img_name = $_FILES['file']['name'];
$img_size = $_FILES['file']['size'];
$img_tmp_name = $_FILES['file']['tmp_name'];
$img_error = $_FILES['file']['error'];



$item_name = $_POST['item_name'];
$item_code = $_POST['item_code'];
$item_size = $_POST['item_size'];
$item_cat = $_POST['item_cat'];
$item_price = $_POST['item_price'];
$item_qty = $_POST['item_qty'];
$item_variant = $_POST['item_variant'];


if ($img_error === 0) {
    if ($img_size > 100000000) {
        echo json_encode(['error' => 'files too big']);
    } else {

        $img_ext = pathinfo($img_name, PATHINFO_EXTENSION);
        $img_ex_lc = strtolower($img_ext);
        $allowed_ex = ['jpg', 'jpeg', 'png'];

        if (in_array($img_ex_lc, $allowed_ex)) {

            $new_img_name = uniqid("SOFIA-", true) . '.' . $img_ex_lc;
            $upload_path = '../../products/' . $new_img_name;

            move_uploaded_file($img_tmp_name, $upload_path);

            $insert = $init->connect()->query("INSERT INTO products(item_image, item_name, item_code, item_size, item_price, item_qty, item_variant, item_cat) VALUES('$new_img_name', '$item_name', '$item_code', '$item_size', '$item_price', '$item_qty', '$item_variant', '$item_cat')");

            if ($insert) {
                echo json_encode(['success' => 'New Product has been saved!']);
            } else {
                echo json_encode(['error' => 'Something is wrong..']);
            }
        } else {
            echo json_encode(['error' => 'Something is wrong..']);
        }
    }
} else {
    echo json_encode(['error' => 'Something is wrong...']);
}
