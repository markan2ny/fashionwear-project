<!DOCTYPE html>
<html>

<head>
    <title>Sofia Fashionwear</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="description" content="Demo project">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- bootstrap -->
    <script type="text/javascript" src="assets/js/popper.min.js"></script>
    <script type="text/javascript" src="assets/js/jquery.slim.min.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <!-- jquery ajax -->
    <script type="text/javascript" src="assets/js/jquery.min.js"></script>
    <!-- jquery loader -->
    <script type="text/javascript" src="assets/js/loader.js"></script>
    <!-- jquery confirm -->
    <link rel="stylesheet" type="text/css" href="assets/css/jquery-confirm.min.css">
    <script type="text/javascript" src="assets/js/jquery-confirm.min.js"></script>
    <!-- dataTable -->
    <link rel="stylesheet" type="text/css" href="assets/css/jquery.dataTables.min.css">
    <script type="text/javascript" src="assets/js/jquery.dataTables.min.js"></script>
    <!-- Sweetalert -->
    <link rel="stylesheet" type="text/css" href="assets/css/sweetalert2.css">
    <script type="text/javascript" src="assets/js/sweetalert2.js"></script>
    <link rel="stylesheet" type="text/css" href="assets/css/all.css">
    <script type="text/javascript" src="assets/js/moment.min.js"></script>
</head>

<body>

    <?php
    include_once 'core/mysqli_database.php';
    $init = new database;

    $cat = $init->connect()->query("SELECT * FROM products WHERE item_cat = 'men'");
    // print_r($cat->fetch_object());

    ?>

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


    <div class="container">
        <?php if ($cat->num_rows > 0) : ?>
            <div class="card mt-5">
                <div class="card-header">
                    <span>MEN</span>
                </div>
                <div class="card-body">

                    <div class="row">

                        <?php while ($c = $cat->fetch_object()) : ?>
                            <div class="col-lg-3">
                                <a href="single.php?id=<?php echo $c->id;?>">

                                <div class="card">
                                    <div class="card-header">
                                        <img class="img-thumbnail" src="products/<?php echo $c->item_image; ?>" alt="">
                                    </div>
                                    <div class="card-body">
                                        <h5 style="color: black;"><?php echo $c->item_name; ?></h5>
                                        <span>Size: <?php echo $c->item_size; ?></span>
                                        <br>
                                        <span>Price: ???<?php echo $c->item_price; ?></span>
                                    </div>
                                </div>

                                </a>
                            </div>
                        <?php endwhile; ?>

                    </div>



                </div>
            </div>
        <?php else : ?>
            <h1 class="text-muted text-center">NO DATA</h1>
        <?php endif; ?>
    </div>



    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> -->
</body>

</html>