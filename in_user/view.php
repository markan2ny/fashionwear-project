<?php include_once('includes/header.php'); ?>
<?php include_once('includes/navbar.php'); ?>
<?php include_once('../core/function.php');

$init = new manageFunction;
$id = $_GET['id'];
$title = $_GET['n'];
// echo $_SESSION['account_id'];
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

$fetchUser = $init->getSpecific(array($_SESSION['user_id']), "SELECT * FROM users WHERE user_id = ?");


?>


<div class="modal" id="bookModal">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">

			<!-- Modal Header -->
			<div class="modal-header">
				<h4 class="modal-title text-muted">RESERVATION FORM</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<!-- Modal body -->
			<div class="modal-body">
				<div id="sendMessage"></div>
				<form method="POST" id="formReservation">
					<h5 style="font-weight: bold;" class="text-muted">Resort Name:<?php echo $data[0]->title; ?></h5>
					<input type="hidden" name="hidden_title" value="<?php echo $data[0]->title; ?>">
					<div class="row">
						<div class="col-lg-6">
							<!-- User ID -->
							<input type="hidden" name="senderID" id="senderID" value="<?php echo $fetchUser[0]->user_id ?>">
							<!-- Seller ID -->
							<input type="hidden" name="receiverID" id="receiverID" value="<?php echo $getSeller[0]->user_id; ?>">
							<div class="form-group">
								<small>Name</small>
								<input type="text" name="name" id="name" value="<?php echo $fetchUser[0]->name; ?>" class="form-control"readonly>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="form-group">
								<small>Address</small>
								<input type="text" name="address" id="address" value="<?php echo $fetchUser[0]->address ?>" class="form-control"readonly>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="form-group">
								<small>Email address</small>
								<input type="text" name="email" id="email"  value="<?php echo $fetchUser[0]->email; ?>" class="form-control" readonly>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="form-group">
								<small>Contact Number</small>
								<input type="text" name="contact" id="contact" value="<?php echo $fetchUser[0]->contact; ?>" class="form-control" readonly>
							</div>
						</div>
				
						<div class="col-lg-6">
							<div class="alert alert-success">
								<span class="text-muted">Choose Room Package</span><br>
								<textarea class="form-control-plaintext" readonly rows="4"><?php echo $data[0]->roompackage; ?></textarea>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="alert alert-primary">
								<span class="text-muted">Choose Cottage</span><br>
								<textarea class="form-control-plaintext" readonly rows="4"><?php echo $data[0]->cottage; ?></textarea>
							</div>
						</div>
						
						<div class="col-lg-6">
							<input type="text" name="roomType" class="form-control" placeholder="Enter your Room Package">
						</div>
						<div class="col-lg-6">
							<input type="text" name="cottageType" class="form-control" placeholder="Enter your Cottage">
						</div>

						<div class="col-lg-4">
							<small>Adult</small>
							<input type="number" name="adult" class="form-control" placeholder="Adult">
						</div>
						<div class="col-lg-4">
							<small>Senior</small>
							<input type="number" name="senior" class="form-control" placeholder="Senior">
						</div>
						<div class="col-lg-4">
							<small>Children</small>
							<input type="number" name="children" class="form-control" placeholder="Children">
						</div>
					</div>
					<hr>
					<div class="row">

						<div class="col-lg-3">
							<div class="form-group">
								<small>Current Date</small>   
								<input type="date" class="form-control" name="from" value="<?php echo date('Y-m-d') ?>">
							</div>
						</div>
						<div class="col-lg-3">
							<div class="form-group">
								<small>To Date</small>  
								<input type="date" class="form-control" name="to" value="<?php echo date('Y-m-d') ?>">
							</div>
						</div>
						<div class="col-lg-3">
							<div class="form-group">
								<small>Rooms</small>
								<select class="form-control" name="rooms">
									<option selected value="N/A">--Select--</option>
									<option value="1R">1 Rooms</option>
									<option value="2R">2 Rooms</option>
									<option value="3R">3 Rooms</option>
								</select>
							</div>
						</div>
						<div class="col-lg-3">
							<div class="form-group">
								<small>Cottage</small>
								<select class="form-control" name="cottage" required>
									<option disabled selected>--Select--</option>
									<option value="1C">1 Cottage</option>
									<option value="2C">2 Cottage</option>
									<option value="3C">3 Cottage</option>
								</select>
							</div>
						</div>
					</div>
					<button class="btn btn-success float-right">Send Reservation</button>
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
											<img class="d-block w-100" src="<?php echo 'uploads/'.$row->image; ?>" height="400">
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
									<a href="#">
										<img src="img/1.png" alt="..." class="img-thumbnail profile" id="profile" style="border-radius: 50%; width: 100px;height: 100px;">
									</a>
								</div>
								<div class="col-lg-6 col-md-12">
									<i class="fa fa-address-card-o" aria-hidden="true"></i>
									<a href="#seller"><span><?php echo $getSeller[0]->name; ?></span></a>
									<br>
									<i class="fa fa-map-marker" aria-hidden="true"></i>
									<span class="text-muted"><?php echo $getSeller[0]->address; ?></span>
									<br>
									<i class="fa fa-envelope-o" aria-hidden="true"></i>
									<a href=""><?php echo $getSeller[0]->email; ?></a>
								</div>
							</div>
							<hr>

							<?php if($getSeller[0]->account_id == $_SESSION['account_id']): ?>

								<a href="update.php?id=<?php echo $data[0]->account_id?>" class="btn btn-success btn-block"><i class="fa fa-pencil" aria-hidden="true"></i>
								Update Post</a>
								<?php else: ?>
									<!-- message section -->
									<form method="post" id="formMessage">
										<input type="hidden" class="form-control" name="receiver_id" value="<?php echo $getSeller[0]->user_id;?>" readonly>
										<input type="hidden" name="sender_id" value="<?php echo $_SESSION['user_id']; ?>">
										<br>
										<input type="hidden" class="form-control" name="name" value="<?php echo $_SESSION['name'] ?>" readonly>
										<input type="hidden" class="form-control" name="email" value="<?php echo $_SESSION['email'] ?>" readonly>
										<small class="text-muted text-center">Message Seller</small>
										<textarea class="form-control" placeholder="Message" name="message" required></textarea>
										<button class="btn btn-success btn-block mt-1" id="submit"><i class="fa fa-paper-plane" aria-hidden="true"></i>
										Submit Message</button>
									</form>
								<?php endif; ?>

							</div>
						</div>
						<!-- Description -->
						<div class="row">
							<div class="col-lg-7">
								<h5 class="mt-4 text-dark text-center">Description</h5>
								<p class="alert alert-success" style="font-size: 20px;"><?php echo $data[0]->description; ?></p>
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
									<div class="card-header text-center">
										<h4 style="color: black;">MAKE A RESERVATION</h4>
									</div>
									<div class="card-body text-center">
										<button class="btn btn-success reserveBtn" data-toggle="modal" id="<?php echo $_SESSION['user_id']; ?>" data-target="#bookModal">BOOK NOW</button>
									</div>
								</div>

								<hr>
								<div class="card">
									<div class="card-header">
										<h4 class="text-center" style="color:black;">BUSINESS HOUR</h4>
									</div>
									<div class="card-body text-center">
										<textarea class="form-control-plaintext text-center"><?php echo $data[0]->business; ?></textarea>
									</div>
								</div>
								<hr>
								<div class="card">
									<div class="card-header text-center">
										<h4 style="color:black;">OUR POLICY AND RULES</h4>
									</div>
									<div class="card-body text-center">
										<textarea class="form-control-plaintext text-center"><?php echo $data[0]->rules ?></textarea>
									</div>
								</div>
								<hr>
								<div class="card">
									<div class="card-header text-center">
										<h4 style="color:black;">HOW TO GET HERE?</h4>
									</div>
									<div class="card-body text-center">
										<textarea class="form-control-plaintext text-center"><?php echo $data[0]->location ?></textarea>
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
		sendMessage();

		function sendMessage(){
			$(document).on('submit','form#formMessage', function(e){
				e.preventDefault();
				loader('show');
				$.ajax({
					url: 'libs/send.php',
					method: 'POST',
					data: $(this).serialize(),
					dataType: 'json',
					beforeSend:function(){
						$('#submit').text('Please wait.....');
					},
					success:function(data){
						if(!data.error){

							setTimeout(function(){
								$('#submit').text('Submit Message');
								$.alert({
									title: 'Message',
									content: data.success
								});
								$('#formMessage')[0].reset();
								loader('hide');
							},3000);
						}
						else {

							setTimeout(function(){
								$('#submit').text('Submit Message');
								$.alert({
									title: 'Message',
									content: data.error
								});
								loader('hide');
							},3000);
						}
					}
				});

			})
		}

	})
</script>

<?php include_once('includes/footer_section.php'); ?>
<?php include_once('includes/footer.php'); ?>

