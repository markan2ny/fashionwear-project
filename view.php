<?php include_once('includes/header.php'); ?>
<?php include_once('includes/navbar_none_user.php'); ?>
<?php include_once('core/function.php');

$init = new manageFunction;
$id = $_GET['id'];
$title = $_GET['n'];

$data = $init->getSpecific(array(
	$id,
	$title
),
"SELECT * FROM image_location WHERE account_id = ? AND title = ?"
);
// echo '<pre>',print_r($data),'</pre>';
$getSeller = $init->getSpecific(array(
	$id
),
"SELECT * FROM users WHERE account_id = ?"
);
?>

<style type="text/css">
	@media only screen and (max-width: 600px) {
		.btn-align {
			margin-left: 1px;
		}

	}
</style>

<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Login</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form id="modalLogin" method="POST">
					<div class="form-group">
						<label for="recipient-name" class="col-form-label">Email address:</label>
						<input type="text" name="email" class="form-control" id="email" placeholder="Email address">
					</div>
					<div class="form-group">
						<label for="message-text" class="col-form-label">Password:</label>
						<input type="password" name="password" class="form-control" id="password" placeholder="Password">
					</div>
					<div>
						<button class="btn btn-success w-25 float-right">Login</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>



<div class="container">
	<div class="row">
		<div class="col-lg-12">
			<div class="card mt-3">
				<div class="card-body">
					<div class="row">
						<div class="col-lg-7">
							<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
								<ol class="carousel-indicators">
									<?php $slider = 1; ?>
									<?php foreach($data as $row): ?>
										<li data-target="#carouselExampleIndicators" data-slide-to="<?php echo count($data); ?>" class="<?php if($slider <= 1){echo 'active';} ?>"></li>
									<?php endforeach; ?>
								</ol>
								<div class="carousel-inner">
									<?php $counter = 1; ?>
									<?php foreach($data as $row): ?>
										<div class="carousel-item <?php if($counter <= 1){echo 'active';} ?>">
											<img class="d-block w-100" src="<?php echo 'in_user/uploads/'.$row->image; ?>" height="400">
										</div>
										<?php $counter++; ?>
									<?php endforeach; ?>
								</div>
								<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
									<span class="carousel-control-prev-icon" aria-hidden="true"></span>
									<span class="sr-only">Previous</span>
								</a>
								<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
									<span class="carousel-control-next-icon" aria-hidden="true"></span>
									<span class="sr-only">Next</span>
								</a>
							</div>
						</div>
						<div class="col-lg-5">
							<h3 class="card-title" style="color: #2c3e50; font-weight: 600;"><?php echo $data[0]->title; ?></h3>



							<hr>
							<!-- seller information -->
							<div class="row">

								<div class="col-lg-4 col-md-12 ">
									<div class="alert alert-light text-center">
										<a href="#">
											<img src="img/1.png" alt="..." class="img-thumbnail profile" id="profile" style="border-radius: 50%; width: 80px;height: 80px;">
										</a>
									</div>

								</div>
								<div class="col-lg-6 col-md-12">
									<div class="alert alert-light">
										<i class="fa fa-address-card-o" aria-hidden="true"></i>
										<a href="#seller"><span><?php echo $getSeller[0]->name; ?></span></a>
										<br>
										<i class="fa fa-map-marker" aria-hidden="true"></i>
										<span class="text-muted"><?php echo $getSeller[0]->address; ?></span>
										<br>
									</div>

									<!-- <a href=""><?php echo $getSeller[0]->email; ?></a> -->
								</div>
							</div>
							<hr>
							<!-- message section -->

							<div class="row">
								<div class="col-lg-12">
									<input type="hidden" class="form-control" name="sender_id" value="<?php echo $getSeller[0]->account_id;?>" readonly>
									<br>

									<input type="hidden" class="form-control" name="name" value="<?php echo $_SESSION['name'] ?>" readonly>

									<input type="hidden" class="form-control" name="email" value="<?php echo $_SESSION['email'] ?>" readonly>
								<!-- <small class="text-muted text-center">Message Seller</small>

								<textarea class="form-control" placeholder="Message" name="message" required></textarea>
								<button class="btn btn-success btn-block mt-1" id="submit">Submit Message</button> -->
								<div class="alert alert-light text-center">
									
									<h5 class="text-center text-muted" style="font-weight: bold;">Email Address</h5>
									<h5 class="text-center text-dark"><?php echo $getSeller[0]->email; ?></h5>
									<h5 class="text-center text-muted" style="font-weight: bold;">Mobile Number</h5>
									<h4 class="text-center text-dark"><?php echo $getSeller[0]->contact; ?></h4>
									<h5 class="text-center text-muted" style="font-weight: bold;">OR</h5>
									<a href="" class="btn btn-success" data-toggle="modal" data-target="#loginModal">Login to message the seller</a>
								</div>
								<hr>
								<input type="hidden" id="id_number" value="<?php echo $_GET['id']; ?>">
								<input type="hidden" id="title" value="<?php echo $_GET['n']; ?>">
							</div>
						</div>

					</div>
				</div>
				<!-- Description -->
				<div class="row">
					<div class="col-lg-7">
						<h5 class="mt-1 text-dark text-center">Description</h5>
						<div class="alert alert-light" style="background: #ecf0f1;">
							<p style="font-size: 20px; "><?php echo $data[0]->description; ?></p>
						</div>
						<hr>
						<h5 class="text-dark text-center">Details</h5>
						<div class="table-responsive">
							<table class="table table-bordered" cellspacing="0" width="100%">
								<tbody class="thead-light">
									<tr>
										<th scope="row" width="30%">Day Swimming</th>
										<td>
											<textarea class="form-control-plaintext" rows="5" readonly><?php echo $data[0]->dentrance; ?></textarea>
										</td>
									</tr>
									<tr>
										<th scope="row">Night Swimming</th>
										<td>
											<textarea class="form-control-plaintext" rows="3" readonly><?php echo $data[0]->nentrance; ?></textarea>
										</td>
									</tr>
									<tr>
										<th scope="row">Cottage:</th>
										<td>
											<textarea class="form-control-plaintext" rows="3" readonly><?php echo $data[0]->cottage; ?></textarea>
										</td>

									</tr>
									<tr>
										<th scope="row">Room Package:</th>
										<td>
											<textarea class="form-control-plaintext" rows="5" readonly><?php echo $data[0]->roompackage; ?></textarea>
										</td>

									</tr>
									<tr>
										<th scope="row">Date Posted:</th>
										<td><?php echo date('F d, Y', strtotime($data[0]->date)); ?></td>
									</tr>

								</tbody>
							</table>
						</div>
						<hr>
						<div class="card">
							<div class="card-header">
								<h4 class="text-center" style="color:black;">BUSINESS HOUR</h4>
							</div>
							<div class="card-body text-center">
								<?php echo $data[0]->business ?>

							</div>
						</div>
						<hr>
						<div class="card">
							<div class="card-header text-center">
								<h4 style="color:black;">HOW TO GET HERE?</h4>
							</div>
							<div class="card-body text-center">
								<?php echo $data[0]->location; ?>
							</div>
						</div>
						<hr>
						<div class="card">
							<div class="card-header">
								<h4 class="text-center" style="color:black;">OUR POLICY AND RULES</h4>
							</div>
							<div class="card-body text-center">
								<?php echo $data[0]->rules; ?>


							</div>
						</div>
						<hr>
						<div>
							<!-- Google Map -->
							<h5 class="text-dark text-center">Locate us</h5>
							<br>
							<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3855.2315586485665!2d120.76375151441093!3d14.924187089597032!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x339656fafb0db159%3A0xf9bf7e73f9238dc8!2sJed&#39;s+Island+Resort!5e0!3m2!1sen!2sph!4v1555914584757!5m2!1sen!2sph" width="100%" height="400" frameborder="0" style="border:0" allowfullscreen></iframe>
						</div>
						<hr>
						<h5 class="text-center text-dark">Seller</h5>

						<div class="text-center">
							<a href="#">
								<img src="img/1.png" alt="..." class="img-thumbnail profile" id="profile" style="border-radius: 50%; width: 100px;height: 100px;">
							</a>
							<br>
							<a href="" id="seller"><span><?php echo $getSeller[0]->name; ?></span></a>
							<br>
							<span><?php echo $getSeller[0]->address; ?></span>
							<br>
							<span><?php echo $getSeller[0]->contact; ?></span>
							<br>
							<span>Last Login: <?php echo date('F m-Y'); ?></span>
							<hr>
							<br>
							<br>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
</div>
<br>
<script type="text/javascript">
	$(document).ready(function(){
		var username = $('#username').val();
		var password = $('#password').val();
		loginModal(username, password);
		function loginModal(email,password){


			$(document).on('submit', '#modalLogin', function(e){
				e.preventDefault();
				var id = $('#id_number').attr('value');
				var n = $('#title').attr('value');
				$.ajax({
					url: 'libs/login.php',
					method: 'POST',
					dataType:'json',
					data:$(this).serialize(),
					success:function(data){
						if(!data.error){
							if(data[0].role == 'ADMIN'){
								window.location = 'admin/';
							}
							else {
								window.location = 'in_user/view.php?id='+id+'&n='+n;
							}
						}
						else {
							alert(data.error);
						}
					}
				})


			})



		}
	})
	


</script>

<?php include_once('includes/footer_section.php'); ?>
<?php include_once('includes/footer.php'); ?>

