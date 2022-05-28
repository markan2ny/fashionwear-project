<?php 
	
	include_once('../../core/function.php');
	$init = new manageFunction;

	$output = '';
	$data = $init->getData("SELECT * FROM image_location WHERE status = 'not verified' AND thumbnail = 1");
	
	if(count($data) > 0){
		$count = 1;
		foreach($data as $row){

			$output .= '<tr>
							<td>'.$count.'</td>
							<td>'.$row->id.'</td>
							<td>'.$row->title.'</td>
							<td>'.$row->name.'</td>
							<td>'.date('F d, Y',strtotime($row->date)).'</td>
							<td>
								<label class="badge badge-danger">'.$row->status.'</label>
							</td>
							<td>
								<a href="viewReq.php?id='.$row->id.'" class="btn btn-secondary btn-sm"><i class="fa fa-eye"></i></a>
								<button class="btn btn-success btn-sm status" id="'.$row->id.'" title="Verfied"><i class="fa fa-check"></i></button>
							</td>
						</tr>';

			$count = $count+ 1;
		}

		echo json_encode(array('f' => $output));
	}
	else {
		$output .= '<td colspan="7"><h1 class="text-center text-muted">NO PENDING REQUEST</h1></td>';
		echo json_encode(array('error' => $output));
	}
	
 ?>