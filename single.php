<?php include_once 'includes/header.php'; ?>
<?php include_once 'includes/navbar_none_user.php'; ?>

<?php
include_once 'core/mysqli_database.php';
$init = new database;


$id = $_GET['id'];

$product = $init->connect()->query("SELECT * FROM products WHERE id = $id");
$p = $product->fetch_object();


?>


<div class="container">
    <div class="card mt-5">
        <div class="row">
            <div class="col-lg-4">
                <div style="padding: 20px;">
                    <img src="products/<?php echo $p->item_image; ?>" width="300" alt="">
                </div>
            </div>
            <div class="col-lg-8">
                <div style="padding: 30px 20px 20px;">
                    <h4><?php echo $p->item_name; ?></h4>
                    <div class="pt-3">
                        <p class="text-muted"> Category: <span class="badge badge-secondary"><?php echo ucfirst($p->item_cat); ?></span></p>
                        <p class="text-muted"> Price: ₱<span class="text-dark"><?php echo $p->item_price; ?></span></p>
                        <p class="text-muted"> Size: <span class="text-dark"><?php echo $p->item_size; ?></span></p>
                        <p class="text-muted"> Available Stock(s): <span class="text-dark"><?php echo $p->item_qty <= 0 ? 'Out of Stock' : $p->item_qty; ?></span></p>
                        <p class="text-muted"> Variant: <span class="text-dark"><?php echo $p->item_variant; ?></span></p>

                        <div class="card">
                            <div class="card-body">
                                <div class="mb-3">
                                    <span>Please login to make Reservation</span>
                                </div>
                                <div>
                                    <?php if (!isset($_SESSION['id'])) : ?>
                                        <a href="login.php" class="btn btn-primary">Login</a>
                                        OR
                                        <a href="register.php" class="btn btn-success">Register</a>
                                    <?php else: ?>
                                        <button>Reserved</button>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php include_once 'includes/footer.php'; ?>

