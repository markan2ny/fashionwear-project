<?php include_once('includes/header.php'); ?>
<?php include_once('includes/navbar.php'); ?>
<?php 
	include_once('../core/function.php');
$init = new manageFunction;

	$getID = $_GET['receiver_id'];
	$getMessage = $init->getSpecific(array($getID), "SELECT * FROM inbox WHERE receiver_id = ? AND status = 0");

	$d = $init->getSpecific(array($getID),"SELECT * FROM users WHERE user_id = ?");
	// var_dump($d);

 ?>


<div class="container">

	<div class="row mt-2">
		<div class="col-lg-8 offset-lg-2">
			<div class="card">
				<div class="card-header">
					<h4 class="text-muted">Message</h4>
				</div>
				<div class="card-body">
					<form id="reply">
						<div class="form-group">
							<small>From</small>
							<input type="hidden" name="receiver_id" value="<?php echo $getMessage[0]->sender_id; ?>">
							<input type="hidden" name="sender_id" value="<?php echo $getMessage[0]->receiver_id; ?>">
							<input type="hidden" name="name" value="<?php echo $d[0]->name; ?>">
							<input type="text" name="email" class="form-control" readonly value="<?php echo $getMessage[0]->email ?>">
							<input type="hidden" name="emailTo" class="form-control" value="<?php echo $_SESSION['email']; ?>">
						</div>
						<div class="form-group">
							<small>Message</small>
							<textarea class="form-control" rows="3" readonly><?php echo $getMessage[0]->message; ?></textarea>
						</div>
							<div class="form-group">
							<textarea class="form-control" name="message" rows="5" placeholder="Reply here"></textarea>
						</div>

						<div class="form-group">
							<button class="btn btn-success mt-2 float-right" id="reply">Reply</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- <script type="text/javascript">
	$(document).ready(function(){
		$(document).on('submit', 'form#reply', function(e){
			e.preventDefault();
			
			$.ajax({
				url:'libs/reply.php',
				method:'POST',
				data:$(this).serialize(),
				dataType:'json',
				success:function(data){
					if(!data.error){
						alert(`${data.success}`);
						window.location = 'in_user.php';
					}
					else {
						alert(`${data.error}`);
					}
				}
			})

		})
	})
</script> -->


<?php include_once('includes/footer.php'); ?>