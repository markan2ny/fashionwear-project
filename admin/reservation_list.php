<?php include_once('includes/header.php'); ?>
<?php include_once('modal/edit.php'); ?>
<?php

include_once '../core/mysqli_database.php';
$init = new database;
$cart = $init->connect()->query("SELECT * FROM cart WHERE is_approve = 1");

?>

<div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <?php include_once('includes/navbar.php'); ?>

    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
        <?php include_once 'sidebar.php'; ?>
        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header bg-dark text-white">
                                <span>Reservation List</span>
                            </div>
                            <div class="card-body">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Item Image</th>
                                            <th>Item Name</th>
                                            <th>Item Size</th>
                                            <th>Item Price</th>
                                            <th>Order Qty.</th>
                                            <th>Reservee</th>
                                            <th>Order Total</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if ($cart->num_rows > 0) : ?>
                                            <?php while ($c = $cart->fetch_object()) : ?>
                                                <tr class="parent">
                                                    <td><img src="../products/<?php echo $c->item_image; ?>" alt=""></td>
                                                    <td><?php echo $c->item_name; ?></td>
                                                    <td><?php echo $c->item_size; ?></td>
                                                    <td>₱<?php echo $c->item_price; ?></td>
                                                    <td class="s"><?php echo $c->order_qty; ?></td>
                                                    <td><?php echo $c->reservee; ?></td>
                                                    <td class="text-danger">₱<?php echo $c->order_qty * $c->item_price; ?></td>
                                                    <td><?php echo $c->is_claimed == 1 ? 'CLAIMED' : 'NOT CLAIM' ?></td>
                                                    <td>
                                                        <?php if ($c->is_claimed == 1) : ?>
                                                            <button class="btn btn-sm btn-danger remove" id="<?php echo $c->id ?>"><i class="fa-solid fa-trash"></i></button>
                                                        <?php else : ?>
                                                            <button class="btn btn-sm btn-success claim" id="<?php echo $c->id; ?>"><i class="fa-solid fa-check"></i></button>
                                                            <button class="btn btn-sm btn-danger remove" id="<?php echo $c->id; ?>"><i class="fa-solid fa-trash"></i></button>
                                                        <?php endif; ?>
                                                    </td>
                                                </tr>
                                            <?php endwhile; ?>
                                        <?php else : ?>
                                            <tr>
                                                <td colspan="8">
                                                    <h1 class="text-center text-muted">NO RESERVATION LIST FOUND</h1>
                                                </td>
                                            </tr>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- content-wrapper ends -->
            <!-- partial:partials/_footer.html -->
            <?php include_once 'admin_footer.php'; ?>
            <!-- partial -->
        </div>
        <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->

<!-- plugins:js -->
<script src="vendors/js/vendor.bundle.base.js"></script>
<script src="vendors/js/vendor.bundle.addons.js"></script>
<!-- endinject -->
<!-- Plugin js for this page-->
<!-- End plugin js for this page-->
<!-- inject:js -->
<script src="js/off-canvas.js"></script>
<script src="js/misc.js"></script>
<!-- endinject -->
<!-- Custom js for this page-->
<script src="js/dashboard.js"></script>
<!-- End custom js for this page-->
</body>

</html>



<script>
    $(function() {
        claim();
        remove();

        function claim() {
            $('.claim').click(function(e) {
                e.preventDefault();

                var id = $(this).attr('id');
                
                $.ajax({
                    url: 'libs/claim.php',
                    method: 'POST',
                    dataType: 'json',
                    data: {id : id},
                    success: function(res) {
                        console.log(res);
                        location.reload();
                    }
                })

            });
        }

        function remove() {
            $('.remove').click(function(e) {
                e.preventDefault();

                var id = $(this).attr('id');

                $.ajax({
                    url: 'libs/remove_claimed.php',
                    method: 'POST',
                    dataType: 'json',
                    data: {id : id},
                    success: function(res) {
                       if(res.success) {
                           alert(res.success);
                           location.reload();
                       } else {
                           alert(res.error);
                       }
                    }
                })
            })
        }

    })
</script>