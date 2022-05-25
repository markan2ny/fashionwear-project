<?php include_once('includes/header.php'); ?>
<?php include_once('modal/edit.php'); ?>

<?php
include_once('../core/function.php');
$init = new manageFunction;

$fetchAcct = $init->getData("SELECT * FROM users ORDER BY user_id DESC");

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
									<table class="table table-hover" id="my" cellspacing="0" width="100%">
										<thead>
											<tr>
												<th>#</th>
												<th>Account ID</th>
												<th>Email address</th>
												<th>Status</th>
												<th>Action</th>
											</tr>
										</thead>
										<tbody id="tbody">
											<!-- //HERE -->
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>

			</div>
			<!-- content-wrapper ends -->
			<!-- partial:partials/_footer.html -->
			<?php include_once 'admin_footer.php'; ?>
			<!-- partial -->
		</div>
		<!-- main-panel ends -->
	</div>
	<!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->

<!-- plugins:js -->
<script src="vendors/js/vendor.bundle.base.js"></script>
<script src="vendors/js/vendor.bundle.addons.js"></script>
<!-- endinject -->
<!-- Plugin js for this page-->
<!-- End plugin js for this page-->
<!-- inject:js -->
<script src="js/off-canvas.js"></script>
<script src="js/misc.js"></script>
<!-- endinject -->
<!-- Custom js for this page-->
<script src="js/dashboard.js"></script>
<!-- End custom js for this page-->
</body>

</html>