<style>
  /*internal css for navbar*/
  * {
    text-decoration: none;
    list-style: none;
  }

  body {
    height: 100%;
    background: #ecf0f1;
  }

  .navbar {
    background: #f39c12;
  }

  .navbar>.navbar-brand {
    font-weight: bold;
    font-size: 20px;
  }

  .collapse>ul>li:hover {
    background: #e67e22;
  }

  ul>li>a {
    font-size: 15px;
    font-weight: bold;
  }
</style>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container">

    <a class="navbar-brand" href="index.php">
      SF
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
        <a href="register.php">Register</a>
      </div>
    </div>
  </div>
</nav>