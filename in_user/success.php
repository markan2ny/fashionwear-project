<?php include_once('includes/header.php'); ?>
<?php include_once('includes/navbar.php'); ?>

<div class="container">
	<div class="alert alert-light mt-5">
		<div class="row">
			<div class="col-md-2">
				<img src="img/tenor.gif" alt="..." style="border: none;" class="img-thumbnail">
			</div>
			<div class="col-md-8">
				<h2 class="text-success" style="font-weight: bold;">Successfully Uploaded!</h2>
				<p>Your Resort name <b><?php echo $_SESSION['title']; ?></b> has been successfully uploaded and sent to Admin. Please wait a further time to verify your post. <a href="in_user.php">Click</a> to continue..</p>
				<p>Thank You for your patience,</p>
			</div>
		</div>
	</div>
</div>


<?php include_once('includes/footer.php'); ?>