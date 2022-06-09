<?php include_once('includes/header.php'); ?>
<?php include_once('modal/edit.php'); ?>



<?php
include_once '../core/mysqli_database.php';
$init = new database;
$users = $init->connect()->query("SELECT * FROM users WHERE status = 0");

?>


<div class="container-scroller">
	<!-- partial:partials/_navbar.html -->
	<?php include_once('includes/navbar.php'); ?>

	<!-- partial -->
	<div class="container-fluid page-body-wrapper">
		<!-- partial:partials/_sidebar.html -->
		<?php include_once 'sidebar.php'; ?>
		<!-- partial -->
		<div class="main-panel">
			<div class="content-wrapper">
				<?php if (!empty($message)) {
					echo $message;
				} ?>
				<div class="row">
					<div class="col-lg-12">
						<div class="card mt-1">
							<div class="card-header">
								<h4>Manage Account</h4>
							</div>
							<div class="card-body">
								<div class="table-response">
									<table class="table table-hover" id="my" cellspacing="0" width="100%" id="mytable">
										<thead>
											<tr>
												<th>Name</th>
												<th>Username</th>
												<th>Email address</th>
												<th>Action</th>
											</tr>
										</thead>
										<tbody id="tbody">
											<?php if($users->num_rows > 0):?>
												<?php
													
														while($user = $users->fetch_object()):
													?>
													<tr>
														<td><?php echo $user->name;?></td>
														<td><?php echo $user->username;?></td>
														<td><?php echo $user->email;?></td>
														<td>
															<button class="btn btn-sm btn-danger delete" id="<?php echo $user->id;?>">Delete</button>
														</td>
													</tr>

													<?php endwhile;?>
												<?php else:?>
													<tr>
														<td colspan="6">
															<h1 class="text-muted text-center mt-5">NO DATA FOUND</h1>
														</td>
													</tr>
												<?php endif;?>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php include_once 'admin_footer.php'; ?>
			<!-- partial -->
		</div>
		<!-- main-panel ends -->
	</div>
	<!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->
<?php include_once 'includes/footer.php'; ?>

<script>

	$(function() {

		$('.delete').click(function(res) {
			var id = $(this).attr('id');

			$.ajax({
				url: 'libs/remove_acct.php',
				method: 'POST',
				data: {id : id},
				dataType: 'json',
				success: function(res) {
					console.log(res);
					if(res.success) {
						alert(res.success);
						location.reload();
					} else {
						alert(res.error);
					}
				}
			})
		});
	});

</script>