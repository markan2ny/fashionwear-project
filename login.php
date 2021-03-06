<?php include_once('includes/header.php'); ?>


<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container">
    <a class="navbar-brand" href="<?php echo !isset($_SESSION['id']) ? 'index.php' : 'pages/'; ?>">
      <img src="assets/img/logo.png" width="200" alt="">
    </a>
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
            <a class="dropdown-item" href="men.php">Men</a>
            <a class="dropdown-item" href="women.php">Women</a>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="contact.php">Contact Us</a>
        </li>
      </ul>
      <div>
        <a href="login.php">Login</a>
        <a href="register.php">Register</a>
      </div>
    </div>
  </div>
</nav>
<script type="text/javascript" src="assets/js/loader.js"></script>
<div class="container">
  <div class="row">
    <div class="col-lg-6 offset-md-3">
      <div class="card mt-3">
        <div class="card-header">
          <h4 class="text-muted">Login</h4>
        </div>
        <div class="card-body">
          <div id="err"></div>
          <form>
            <div class="form-group">
              <label>Username or Email address</label>
              <input type="text" name="useremail" class="form-control" placeholder="Enter Username or Email address" required>
            </div>
            <div class="form-group">
              <label>Password</label>
              <input type="password" name="password" class="form-control" placeholder="Enter Password" required>
            </div>
            <div class="form-group">
              <button class="btn btn-success w-25 float-right">Login</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>





<?php include_once('includes/footer.php'); ?>

<script type="text/javascript">
  $(function() {

    $(document).on('submit', 'form', function(e) {
      e.preventDefault();


      $.ajax({
        url: 'libs/login.php',
        method: 'POST',
        dataType: 'json',
        data: $(this).serialize(),
        success: function(res) {
          if(res.success) {
            alert(res.success);
              if(res.data.role == 1) {
                window.location = 'admin/';
              } else {
                window.location = 'pages/';
              }
          } else {
            alert(res.error);
          }
        }
      })
    });
  });
</script>
