<?php

include_once '../core/mysqli_database.php';
$init = new database;

$search_name = $_POST['search_name'];

$search = $init->connect()->query("SELECT * FROM products WHERE item_name LIKE '%$search_name%'");
$data = '';

if ($search->num_rows > 0) {
	while ($s = $search->fetch_object()) {

		$data .= '<div class="col-lg-4"><a href="single.php?id='.$s->id.'">
			<div class="card">
				<div class="card-header">
					<img src="../products/' . $s->item_image . '" alt="" class="img-thumbnail">
				</div>
				<div class="card-body">
					<h1>' . $s->item_name . '</h1>
					<span>'.$s->item_price.'</span>
				</div>
			</div>
			
		</a></div>
		';
	}
	echo json_encode($data);
} else {
	echo json_encode('<div class="col-12"><h1 class="text-center text-muted">NO ITEM FOUND</h1></div>');
}
