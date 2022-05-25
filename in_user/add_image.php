<?php include_once('includes/header.php'); ?>
<?php include_once('includes/navbar.php'); ?>
<?php
include_once('../core/function.php');
$init = new manageFunction;

if (!isset($_SESSION['account_id'])) {
	header('location:../login.php');
}
$id = $_GET['id'];
$data = $init->getSpecific(
	array(
		$id
	),
	"SELECT * FROM users WHERE user_id = ?"
);

?>
<div class="container">

	<div class="row">
		<div class="col-lg-6 offset-lg-3">
			<div class="card mt-2">
				<div class="card-header">
					<span class="text-muted h4">Promote Resort</span class="text-muted h4">

				</div>
				<div class="card-body">
					<form class="was-validated" method="POST" enctype="multipart/form-data">
						<small class="text-muted">Upload ( *jpg , *jpeg, *png ) file or else your post will not submited.</small>

						<div class="custom-file">
							<input type="file" name="files[]" class="custom-file-input" required multiple>
							<small class="custom-file-label" for="validatedCustomFile">Choose file...</small>
							<div class="invalid-feedback">Please choose file to upload</div>
						</div>

						<div class="form-group">
							<input type="hidden" name="hidden_id" value="<?php echo $_GET['id']; ?>">
							<small>Resort Name</small>
							<input type="text" name="title" class="form-control" placeholder="Title" required>
						</div>
						<div class="form-group">
							<small>Address</small>
							<input type="text" name="add" class="form-control" placeholder="Address" required>
						</div>
						<div class="form-group">
							<small>Description</small>
							<textarea class="form-control" name="description" placeholder="Tell something to your Resort.." required></textarea>
						</div>

						<!-- Addition details -->
						<div class="row">
							<div class="col-lg-12">
								<div class="form-group">
									<small>Day Entrance Fee: <span class="text-muted">(Seperated by newline)</span></small>
									<textarea class="form-control" name="dEntrance" placeholder="Day Entrance Fee" required=""></textarea>
								</div>
							</div>
							<div class="col-lg-12">
								<div class="form-group">
									<small>Night Entrance Fee: <span class="text-muted">(Seperated by newline)</span></small>
									<textarea class="form-control" name="nEntrance" placeholder="Night Entrance fee" required=""></textarea>
								</div>
							</div>
							<div class="col-lg-12">
								<div class="form-group">
									<small>Cottage <span class="text-muted">(Seperated by newline)</span></small>
									<textarea class="form-control" name="cottage" placeholder="Enter your cottage description" required=""></textarea>
								</div>
							</div>
							<div class="col-lg-12">
								<small>Room Package <span class="text-muted"></span></small>
								<textarea class="form-control" required name="roompackage" placeholder="Room Package"></textarea>
							</div>
							<div class="col-lg-12">
								<div class="form-group">
									<small>Business Hour <span class="text-muted">(Seperated by newline)</span></small>
									<textarea class="form-control" name="business" required></textarea>
								</div>
							</div>
							<div class="col-lg-12">
								<div class="form-group">
									<small>Policy<span class="text-muted">(Seperated by newline)</span></small>
									<textarea class="form-control" rows="3" name="rules" required placeholder="Enter your houserules in your resort. To avoid a violation"></textarea>
								</div>
							</div>
							<div class="col-lg-12">
								<div class="form-group">
									<small>Location<span class="text-muted">(Seperated by newline)</span></small>
									<textarea class="form-control" rows="3" name="location" required placeholder="Location"></textarea>
								</div>
							</div>

							<!-- Add/Delete input for Roompackage -->
						</div>
				</div>
				<div class="col-lg-12">
					<div class="alert alert-info">
						<h6 class="text-dark">Attach your Business Permit (ABP)</h6>
						<input type="file" name="permit">
					</div>

					<label>Mobile number</label>

					<input type="text" name="number" class="form-control" value="<?php echo $data[0]->contact; ?>" readonly>
					<div class="form-group">
						<label>Email address</label>
						<input type="text" name="number" class="form-control" readonly value="<?php echo $data[0]->email; ?>">
					</div>
					<small>By submitting this ad, I agree to <a href="">F-RESORT</a> Terms and Conditions.</small>
					<div class="form-group">
						<button class="btn btn-success float-right mb-2 mt-2">Upload and Post Resort</button>
					</div>
				</div>

			</div>

			</form>
		</div>
	</div>
</div>
</div>
</div>
<br>
<br>

<script type="text/javascript">
	$(document).ready(function() {
		// AddInput();
		$('#myTable').DataTable({
			responsive: true
		});
		$(document).on('submit', 'form', function(e) {
			e.preventDefault();

			loader('show');
			$.ajax({
				url: 'libs/upload_data.php',
				method: 'POST',
				data: new FormData(this),
				contentType: false,
				processData: false,
				success: function(data) {
					if (data) {
						setTimeout(function() {
							window.location = 'success.php';
							// alert(data.success);
						}, 2000)
						// alert(data.success);
					} else {
						$.alert({
							title: 'Oops',
							content: 'Something wrong',
						});
						// alert(data.error);
					}
				}
			})

		});
		var i = 1;
		$(document).on('click', '.add-btn', function(e) {
			e.preventDefault();
			// alert('HELLO');
			i++;
			$('#here').append(`<div class="col-lg-9 col-sm-9" id="row${i}"><input type="text" name="room[]" class="form-control mt-1" placeholder="Room Package${i}"></div>` +
				`<div class="col-lg-3 col-sm-3"><button class="btn btn-danger mt-1 remove" id="${i}">[x]</button></div>`);
			// alert(i);
		})
		$(document).on('click', '.remove', function(e) {
			e.preventDefault();
			var p = $(this).attr(`id`);
			alert(p);
		})

	});
</script>

<?php include_once('includes/footer_section.php'); ?>
<?php include_once('includes/footer.php'); ?>