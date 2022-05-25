<?php include_once('includes/header.php'); ?>
<?php include_once('includes/navbar.php'); ?>
<?php
if(!isset($_SESSION['account_id'])){
	header('location: ../login.php');
}

// ob_start()

include_once('../core/function.php');
$init = new manageFunction;
//Custom Query
$data = $init->getData(" SELECT * FROM image_location
	WHERE
	status = 'verified'
	AND
	thumbnail = 1
	AND
	isDeleted = 0
	ORDER BY id DESC");

if(isset($_POST['search_box']) && isset($_POST['search_name'])){
	$name = $_POST['search_name'];
	$box = strtoupper($_POST['search_box']);

	$data = $init->getData(" SELECT * FROM image_location
		WHERE
		$name
		LIKE
		'%$box%'
		AND
		status = 'verified'
		AND
		thumbnail = 1
		ORDER BY id DESC");
}
?>
<style type="text/css">
	.card .card-hover:hover {
		-webkit-box-shadow: 1px 9px 40px -12px rgba(0, 0, 0, 0.75);
		-moz-box-shadow: -1px 9px 40px 12px rgba(0, 0, 0, 0.75);
		box-shadow: -1px 9px 40px -12px rgba(0, 0, 0, 0.75);
	}

</style>

<div class="container">
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12">
			<div class="card mt-3">
				<div class="card-header">
					<b style="font-size: 20px; font-weight: 500;" class="text-muted">Search</b>
					<form class="form-inline float-right" method="POST">
						<input class="form-control search_box" type="search" name="search_box" id="search_box" placeholder="Search" aria-label="Search" style="margin-right: 3px;">
						<select class="form-control combo_box" name="search_name">
							<option selected disabled value="n">Search by</option>
							<option value="title">By Resort Name</option>
							<option value="address">By Location</option>
							<!-- <option value="price">By Price</option> -->
						</select>
						<button class="btn btn-outline-warning my-2 my-sm-0" name="search-btn" id="search-btn" style="margin-left: 5px;">Search</button>
					</form>
				</div>
			</div>
		</div>
	</div>

	<div class="card mt-2">
		<div class="card-body">


			<div class="container">
				<div class="row">
					<?php if(count($data) > 0): ?>
						<?php foreach($data as $row): ?>

							<div class="col-lg-3 col-md-4 col-sm-6 mt-2 mb-5" >
								<div class="card card-hover">
									<a href="view.php?id=<?php echo $row->account_id; ?>&n=<?php echo $row->title; ?>"><img class="card-img-top" src="<?php echo 'uploads/'.$row->image; ?>" height="180" alt="..."></a>
									<div class="card-body">
										<h5 style="font-weight: bold;"><?php echo $row->title; ?></h5>
										<small class="text-muted">Address: <?php echo $row->address; ?></small>
										<br>
										<small class="text-muted">Posted by: <?php echo $row->name; ?></small>
										<br>
										<small class="text-muted"> Date Posted: <?php echo date('F d,Y', strtotime($row->date)); ?></small>
									</div>
								</div>
							</div>

						<?php endforeach; ?>
						<?php else: ?>
							<h1 class="text-muted"> NO RESULT FOUND</h1>

						<?php endif; ?>
					</div>
				</div>
			</div>
			<!-- end card-body -->
			<div class="card-footer">
				<nav aria-label="Page navigation example">
					<ul class="pagination float-right">
						<li class="page-item">
							<a class="page-link" href="#" aria-label="Previous">
								<span aria-hidden="true">&laquo;</span>
								<span class="sr-only">Previous</span>
							</a>
						</li>
						<li class="page-item"><a class="page-link" href="#">1</a></li>
						<li class="page-item"><a class="page-link" href="#">2</a></li>
						<li class="page-item"><a class="page-link" href="#">3</a></li>
						<li class="page-item">
							<a class="page-link" href="#" aria-label="Next">
								<span aria-hidden="true">&raquo;</span>
								<span class="sr-only">Next</span>
							</a>
						</li>
					</ul>
				</nav>
			</div>
		</div>
		<br>
		<br>
	</div>

	<?php include_once('includes/footer_section.php'); ?>

	<?php include_once('includes/footer.php'); ?>

