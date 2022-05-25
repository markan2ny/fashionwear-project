<?php include_once('includes/header.php'); ?>
<?php include_once('includes/navbar.php'); ?>
<?php 

include_once('../core/function.php');
$init = new manageFunction;

$id = $_GET['id'];
$data = $init->getSpecific(array($id), "SELECT * FROM image_location WHERE account_id = $id AND thumbnail = 1 AND isDeleted = 0 ORDER BY id DESC");
	// var_dump($data);

?>

<div class="container">
	<div class="row">
		<div class="col-lg-10 offset-lg-1">
			<div class="card mt-2">
				<div class="card-header">
					<h4 class="text-muted card-title">Manage Resort</h4>
				</div>
				<div class="card-body">
					<table class="table-responsive">
						<table class="table" id="myTable">
							<thead class="table-stripped">
								<tr>
									<th>#</th>
									<th>Thumbnail</th>
									<th>title</th>
									<th>Status</th>
									<th>Action</th>
								</tr>
							</thead>
							<?php if(count($data) > 0): ?>
								<?php $count = 1; ?>
								<tbody>
									<?php foreach($data as $row): ?>
										<tr>
											<td><?php echo $count; ?></td>
											<td><img src="<?php echo 'uploads/'.$row->image; ?>" width="50" height="40"></td>
											<td style="font-size: 20px;"><a href="view.php?id=<?php echo $row->account_id; ?>&n=<?php echo $row->title; ?>" style="text-decoration: none;" class="text-dark"><?php echo $row->title; ?></a></td>
											<?php if($row->status == 'verified'): ?>
												<td style="font-size: 20px;"><label class="badge badge-success"><?php echo $row->status; ?></label>
												</td>
												<?php else: ?>
													<td style="font-size: 20px;"><label class="badge badge-danger"><?php echo $row->status; ?></label>
													</td>
												<?php endif; ?>
												<td>
													<a href="" class="btn btn-danger btn-sm delete-btn" id="<?php echo $row->id; ?>"><i class="fa fa-minus-circle" aria-hidden="true"></i>
													Remove</a>
													<!-- <a href="" class="btn btn-info btn-sm update-btn" id="<?php echo $row->id; ?>">Update</a> -->
												</td>									
											</tr>
											<?php $count = $count+1; ?>
										<?php endforeach; ?>
									</tbody>
								<?php endif; ?>
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


