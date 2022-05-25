<?php include_once('includes/header.php'); ?>
<?php include_once('includes/navbar.php'); ?>
<?php 

include_once('../core/function.php');
$init = new manageFunction;

$id = $_GET['id'];
$data = $init->getSpecific(array($id), "SELECT * FROM reservation WHERE receiverID = ? ORDER BY id DESC");
	// var_dump($data);

?>

<div class="container-fluid">
	<div class="row">
		<div class="col-lg-12">
			<div class="card mt-2">
				<div class="card-header">
					<h4 class="text-muted card-title">Manage Reservation</h4>
				</div>
				<div class="card-body">
					<table class="table-responsive" style="overflow: y;">
						<table class="table" id="myTable" style="overflow: auto;">
							<thead class="table-stripped">
								<tr>
									<th>#</th>
									<th>Name</th>
									<th>Email</th>
									<th>Contact</th>
									<th>Room Type</th>
									<th>Cottage Type</th>
									<th># of Rooms</th>
									<th># of Cottage</th>
									<th>Date From</th>
									<th>Date To</th>
									<th>Adult</th>
									<th>Senior</th>
									<th>Children</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								<?php $count = 1; ?>
								<?php foreach($data as $row): ?>
									<tr>
										<td><?php echo $count; ?></td>
										<td><?php echo $row->name; ?></td>
										<td><?php echo $row->email; ?></td>
										<td><?php echo $row->contact; ?></td>
										<td><?php echo $row->roomType; ?></td>
										<td><?php echo $row->cottageType; ?></td>
										<td><?php echo $row->rooms; ?></td>
										<td><?php echo $row->cottage; ?></td>
										<td><?php echo date('F d,Y', strtotime($row->dateFrom)); ?></td>
										<td><?php echo date('F d,Y', strtotime($row->dateTo)); ?></td>
										<td><?php echo $row->adult; ?></td>
										<td><?php echo $row->senior; ?></td>
										<td><?php echo $row->children; ?></td>
										
										<?php if($row->isRead == 1): ?>
											<td><button class="btn btn-danger btn-sm btn-delete" id="<?php echo $row->id; ?>"><i class="fa fa-trash"></i></button></td>
											<?php else:?>
										<td>
											<button class="btn btn-success btn-sm btn-approve" id="<?php echo $row->id; ?>"><i class="fa fa-check"></i></button>
											<button class="btn btn-danger btn-sm btn-delete" id="<?php echo $row->id; ?>"><i class="fa fa-trash"></i></button>
										</td>
									<?php endif; ?>
									</tr>
									<?php $count = $count + 1; ?>
								<?php endforeach; ?>
							</tbody>
						</table>
					</table>
				</div>				
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function(){
		$('#myTable').DataTable();
	})
</script>
<?php include_once('includes/footer.php'); ?>

