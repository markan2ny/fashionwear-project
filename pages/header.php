<!DOCTYPE html>
<html lang="en">

<head>
    <title>Sofia Fashionwear</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="description" content="Demo project">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- bootstrap -->
    <script type="text/javascript" src="../assets/js/popper.min.js"></script>
    <script type="text/javascript" src="../assets/js/jquery.slim.min.js"></script>
    <script type="text/javascript" src="../assets/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">
    <!-- jquery ajax -->
    <script type="text/javascript" src="../assets/js/jquery.min.js"></script>
    <!-- jquery loader -->
    <script type="text/javascript" src="../assets/js/loader.js"></script>
    <!-- jquery confirm -->
    <link rel="stylesheet" type="text/css" href="../assets/css/jquery-confirm.min.css">
    <script type="text/javascript" src="../assets/js/jquery-confirm.min.js"></script>
    <!-- dataTable -->
    <link rel="stylesheet" type="text/css" href="../assets/css/jquery.dataTables.min.css">
    <script type="text/javascript" src="assets/js/jquery.dataTables.min.js"></script>
    <!-- Sweetalert -->
    <link rel="stylesheet" type="text/css" href="../assets/css/sweetalert2.css">
    <script type="text/javascript" src="../assets/js/sweetalert2.js"></script>
    <link rel="stylesheet" type="text/css" href="../assets/css/all.css">
    <script type="text/javascript" src="../assets/js/moment.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>


<?php

    include_once '../core/mysqli_database.php';
    $init = new database;

    $uid = $_SESSION['id'];
    $u = $init->connect()->query("SELECT count(user_id) as total_count FROM cart WHERE user_id = $uid");

    $count = $u->fetch_object();

?>


<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">

            <a class="navbar-brand" href="index.php">
                <img src="../assets/img/logo.png" width="150" alt="">
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
                    <ul class="navbar-nav m-auto">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <?php echo $_SESSION['email'] ?>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item" href="#"><i class="fa-solid fa-user"></i> Profile</a>
                                <a class="dropdown-item" href="logout.php"><i class="fa-solid fa-right-from-bracket"></i> Logout</a>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"><i class="fa-solid fa-cart-shopping"></i><span class="badge badge-danger badge-pill"><?php echo $count->total_count ? $count->total_count : '0' ;?></span></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
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
                                <option value="Address">By Location</option>
                                <!-- <option value="price">By Price</option> -->
                            </select>
                            <button class="btn btn-outline-warning my-2 my-sm-0" name="search-btn" id="search-btn" style="margin-left: 5px;">Search</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div id="carouselExampleControls" class="carousel slide mt-3 mb-3" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100" src="../assets/img/sample1.webp" alt="First slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="../assets/img/sample1.webp" alt="Second slide">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>