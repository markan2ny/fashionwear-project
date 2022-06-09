<!DOCTYPE html>
<html lang="en">

<head>
    <title>Sofia Fashionwear</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="description" content="Demo project">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="#">

    <link rel="stylesheet" type="text/css" href="../assets/css/all.min.css">;

    <!-- bootstrap -->
    <script type="text/javascript" src="../assets/js/popper.min.js"></script>
    <script type="text/javascript" src="../assets/js/jquery.slim.min.js"></script>
    <script type="text/javascript" src="../assets/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">

    <!-- jquery confirm -->
    <link rel="stylesheet" type="text/css" href="../assets/css/jquery-confirm.min.css">
    <script type="text/javascript" src="../assets/js/jquery-confirm.min.js"></script>
    <!-- dataTable -->
    <link rel="stylesheet" type="text/css" href="../assets/css/jquery.dataTables.min.css">
    <script type="text/javascript" src="../assets/js/jquery.dataTables.min.js"></script>
    <!-- Sweetalert -->
    <link rel="stylesheet" type="text/css" href="../assets/css/sweetalert2.css">
    <script type="text/javascript" src="../assets/js/sweetalert2.js"></script>
    <link rel="stylesheet" type="text/css" href="../assets/css/all.css">
    <script type="text/javascript" src="../assets/js/moment.min.js"></script>


</head>


<?php
session_start();
include_once '../core/mysqli_database.php';
$init = new database;

$uid = $_SESSION['id'];
$u = $init->connect()->query("SELECT count(user_id) as total_count FROM cart WHERE user_id = $uid AND is_approve = 0 AND is_claimed = 0");

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
                            <a class="dropdown-item" href="men.php">Men</a>
                            <a class="dropdown-item" href="women.php">Women</a>
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
                            <a class="nav-link" href="order.php?order_id=<?php echo $_SESSION['id']; ?>"><i class="fa-solid fa-cart-shopping"></i>
                                <span class="badge badge-danger badge-pill">
                                    <?php echo $count->total_count ? $count->total_count : '0'; ?>
                                </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <div class="container">

        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <div class="card mt-5">
                    <div class="card-header">
                        <span>CONTACT US</span>
                    </div>
                    <div class="card-body">
                        <form id="contact_form">
                            <div class="form-group mb-3">
                                <label>Name</label>
                                <input type="text" class="form-control" name="name" required placeholder="Enter Name">
                            </div>
                            <div class="form-group mb-3">
                                <label>Email</label>
                                <input type="email" class="form-control" required placeholder="Enter Email address">
                            </div>
                            <div class="form-group mb-3">
                                <label>Message</label>
                                <textarea name="" id="" cols="30" rows="10" class="form-control">

                                </textarea>
                            </div>
                            <button class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>


    </div>


    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> -->
</body>

</html>


<script>
    $(function() {

        $('form#contact_form').submit(function(e) {
            e.preventDefault();

            alert('Thank you for sending us a message.')

            $(this)[0].reset();
        })

    })
</script>