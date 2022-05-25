<?php include_once('includes/header.php'); ?>
<style>
	/*internal css for navbar*/
	body {
		height: 100%;
		background: #ecf0f1;
	}
	.navbar {
		background: #f39c12;
	}
	.navbar > .navbar-brand {
		font-weight: bold;
		font-size: 20px;
	}
	.collapse > ul > li:hover {
		background: #e67e22;
	}
	ul > li > a {
		font-size: 15px;
		font-weight: bold;
	}

</style>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container">
    <a class="navbar-brand" href="#">SF</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav m-auto">
        <li class="nav-item">
          <a class="nav-link" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="about.php">About</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Category
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item" href="#">Men</a>
            <a class="dropdown-item" href="#">Women</a>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="contact.php">Contact Us</a>
        </li>
      </ul>
      <div>
        <a href="login.php">Login</a>
        <!-- <a href="register.php">Register</a> -->
      </div>
    </div>
  </div>
</nav>

<div class="container">
	<div class="row">
		<div class="col-lg-6 offset-lg-3">
			<div class="card mt-3">
				<div class="card-header">
					<b class="text-muted">Registration</b>
				</div>
				<div class="card-body">
					<div id="regMsg"></div>
					<form  role="form">
						<div class="form-group">
							<label>Name</label><span class="text-danger">*</span>
							<input type="text" name="name" id="name" class="form-control" placeholder="Enter Fullname" required>
						</div>
						<div class="form-group">
							<label>Email address</label><span class="text-danger">*</span>
							<input type="email" name="email" id="email" class="form-control" placeholder="Enter Email address" required>
						</div>
						<div class="form-group">
							<label>Username</label><span class="text-danger">*</span>
							<input type="text" name="username" class="form-control" placeholder="Eter Username" required>
						</div>
						<div class="form-group">
							<label>Address</label><span class="text-danger">*</span>
							<input type="text" name="address" id="address" class="form-control" placeholder="Enter Address" required>
						</div>
						<div class="form-group">
							<label>Mobile number</label><span class="text-danger">*</span>
							<input type="number" name="contact" id="number" class="form-control" min="0" placeholder="Enter Mobile number" required>
						</div>
						<div class="form-group">
							<label>Password</label><span class="text-danger">*</span>
							<input type="password" name="password" id="password" class="form-control" placeholder="Enter Password" required>
						</div>
						<small>By clicking "SIGN UP" I agree to <a href="">Sofia Fashionwear Privacy Policy</a></small>
						<div class="form-group">
							<button class="btn btn-success w-25 float-right">SIGN UP</button>
						</div>
					</form>

				</div>
			</div>
		</div>
	</div>
</div>

<script>
	$(document).ready(function(){
		$(document).on('submit', 'form', function(e){
			e.preventDefault();
			$.ajax({
				url:'libs/register.php',
				method:'POST',
				dataType:'json',
				data:$(this).serialize(),
				success:function(data){
					if(!data.error){
						$('#regMsg').html(`${data.success}`);
						setTimeout(function(){
							window.location = 'login.php';
						},3000);
					}
					else {
						Swal.fire({
							type: 'error',
							title: 'Oops...',
							text: 'Something went wrong!',
							footer: '<a href>Why do I have this issue?</a>'
						})
					}
				}
			})
		})
	})


</script>


<?php include_once('includes/footer.php'); ?>