<?php 

	include_once('../core/function.php');
	$init = new manageFunction;

	$name = $_POST['name'];
	$search_box = $_POST['search_box'];
	$output = '';
	$data = $init->getData("SELECT * FROM image_location WHERE $name LIKE '%$search_box%' AND thumbnail= 1 AND status='verified'");

	if($data > 0){
		
		foreach($data as $row){

			$output .= '
                <div class="card card-hover">
                  <a href="view.php?id='.$row->account_id.'&&n='.$row->title.'"><img class="card-img-top" src="in_user/uploads/'.$row->image.'" height="180" alt="..."></a>
                  <div class="card-body">
                    <small class="text-muted">Sponsored</small>
                    <h5 style="font-weight: bold;">'.$row->title.'</h5>
                    <p class="text-muted">'.$row->location.'</p>
                    <small class="text-muted">Posted by: '.$row->name.'</small>
                    <br>
                  </div>
                </div>
              ';

		}

		echo json_encode(array('output' => $output));
	}

 ?>