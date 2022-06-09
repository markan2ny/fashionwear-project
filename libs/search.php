<?php

include_once '../core/mysqli_database.php';
$init = new database;

$search_name = $_POST['search_name'];

$search = $init->connect()->query("SELECT * FROM products WHERE item_name LIKE '%$search_name%'");

if($search->num_rows > 0) {
	$data = '';
	while($s = $search->fetch_object()){

		// $data .= "<div class='card'>
		// 	<div class='card-header'>

		// 	</div>
		// </div>";

	}

} else {
	echo json_encode(['error' => 'NOT FOUND!']);
}