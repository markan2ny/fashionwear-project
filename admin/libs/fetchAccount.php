<?php 

include_once('../../core/function.php');
$init = new manageFunction;

$f = $init->getData("SELECT * FROM users WHERE role = 0 ORDER BY user_id DESC");
$data = '';
$count = 1;

if($f > 0 ){

	foreach($f as $row){
		$s = '';
		$b = '';
		// Status
		if($row->status == 0){
			$s .= '<label class="badge badge-success statusLabel" id="'.$row->user_id.'">Active</label>';
		}
		else {
			$s .= '<label class="badge badge-danger statusLabel" id="'.$row->user_id.'">Blocked</label>';
		}
		// Button
		if($row->status == 0){
			$b .= '<input type="button" value="BLOCK" class="btn btn-danger btn-sm btn-change" id="'.$row->user_id.'">';
		}
		else {
			$b .= '<input type="button" value="UNBLOCK" class="btn btn-success btn-sm btn-change" id="'.$row->user_id.'">';

		}
		$data .= '
		<tr>
		<td>'.$count.'</td>
		<td>'.$row->account_id.'</td>
		<td>'.$row->email.'</td>
		<td>'.$s.'</td>
		<td>'.$b.'</td>
		</tr>

		';
		$count = $count + 1;

	}
	echo $data;


}

?>