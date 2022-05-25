<?php 

include_once('../../core/function.php');
$init = new manageFunction;

$data1 = $init->getData("SELECT * FROM inbox ORDER BY id DESC");
$output = '';

if(count($data1) > 0){
	foreach($data1 as $row){
		$output .= '<a class="dropdown-item" href="#">
					<small style="font-size:12px;">'.date('F d,Y',strtotime($row->time)).'</small><br>
					<b style="font-size:15px;">'.$row->email.'</b><br>
					<small><i>Message you</i></small>
					</a>';
	}
}
else {
	$output .= '<span class="dropdown-item">No Notification</span>';
}
$data2 = $init->getData("SELECT * FROM inbox WHERE status = 0");
$compressData = array(
				'notification_message' => $output, 
				'notification_count' => count($data2)
				);

echo json_encode($compressData);

?>