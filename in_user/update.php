<?php include_once('includes/header.php'); ?>
<?php include_once('includes/navbar.php'); ?>
<?php

include_once('../core/function.php');
$init = new manageFunction;
$id = $_GET['id'];

$updateData = $init->getSpecific(array($id), "SELECT * FROM image_location WHERE account_id = ? AND thumbnail = 1 AND isDeleted = 0");
	// var_dump($updateData);
?>
<div class="container">
	<div class="row">
		<div class="col-lg-8 offset-lg-2">
			<div class="card mt-2 mb-3">
				<div class="card-header">
					<h4 class="card-title text-muted">Update Resort Details</h4>
				</div>
				<div class="card-body">
					<form method="POST" id="update-btn">
						<div class="form-group">
							<input type="hidden" name="hidden_id" value="<?php echo $updateData[0]->id; ?>">
							<label class="text-muted">Resort Name</label>
							<input type="text" name="title" class="form-control" placeholder="Resort Name" value="<?php echo $updateData[0]->title; ?>">
						</div>
					<!-- 	<div class="form-group">
							<label class="text-muted">Address</label>
							<input type="text" name="address" value="<?php echo $updateData[0]->address; ?>">
						</div> -->
						<div class="form-group">
							<label class="text-muted">Location</label>
							<textarea class="form-control" name="location"><?php echo $updateData[0]->location; ?></textarea>
						</div>
						<div class="form-group">
							<label class="text-muted">Description</label>
							<textarea class="form-control" name="description"><?php echo $updateData[0]->description; ?></textarea>
						</div>

						<div class="form-group">
							<label class="text-muted">Day Entrance Fee</label>
							<textarea class="form-control" name="dentrance"><?php echo $updateData[0]->dentrance; ?></textarea>
						</div>
						<div class="form-group">
							<label class="text-muted">Day Entrance Fee</label>
							<textarea class="form-control" name="nentrance"><?php echo $updateData[0]->nentrance; ?></textarea>
						</div>
						<div class="form-group">
							<label class="text-muted">Cottage</label>
							<textarea class="form-control" name="cottage"><?php echo $updateData[0]->cottage; ?></textarea>
						</div>
						<div class="form-group">
							<label class="text-muted">Room Package's</label>
							<textarea class="form-control" name="roompackage"><?php echo $updateData[0]->roompackage ?></textarea>
						</div>
						<div class="form-group">
							<label class="text-muted">Policy's</label>
							<textarea class="form-control" name="rules"><?php echo $updateData[0]->rules ?></textarea>
						</div>

						<button class="btn btn-success mt-2 float-right w-10 update-btn"><i class="fas fa-save"></i> Update</button>

					</form>
				</div>
			</div>
		</div>

	</div>
</div>


<?php include_once('includes/footer_section.php'); ?>