<?php include_once('includes/header.php'); ?>
<?php include_once('modal/edit.php'); ?>
<?php

include_once '../core/mysqli_database.php';
$init = new database;
$cart = $init->connect()->query("SELECT * FROM cart WHERE is_approve = 0");

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
                                <span>Reservation Request</span>
                            </div>
                            <div class="card-body">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <td>Item Image</td>
                                            <th>Item Name</th>
                                            <th>Item Size</th>
                                            <th>Item Price</th>
                                            <th>Order Qty.</th>
                                            <th>Customer Name</th>
                                            <td>Order Total</td>
                                            <td>Action</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if ($cart->num_rows > 0) : ?>
                                            <?php while ($c = $cart->fetch_object()) : ?>
                                                <tr class="parent">
                                                    <td><img src="../products/<?php echo $c->item_image; ?>" alt=""></td>
                                                    <td><?php echo $c->item_name; ?></td>
                                                    <td><?php echo $c->item_size; ?></td>
                                                    <td>???<?php echo $c->item_price; ?></td>
                                                    <td class="s"><?php echo $c->order_qty; ?></td>
                                                    <td><?php echo $c->reservee; ?></td>
                                                    <td class="text-danger">???<?php echo $c->order_qty * $c->item_price; ?></td>
                                                    <td>
                                                        <button class="btn btn-sm btn-success btn-approve" id="<?php echo $c->id; ?>" data-id="<?php echo $c->product_id; ?>" data-qty="<?php echo $c->order_qty; ?>">Approve</button>
                                                        <button class="btn btn-sm btn-danger btn-disapprove" id="<?php echo $c->id?>">Disapprove</button>
                                                    </td>
                                                </tr>
                                            <?php endwhile; ?>
                                        <?php else : ?>
                                            <tr>
                                                <td colspan="8">
                                                    <h1 class="text-center text-muted">NO REQUEST FOUND</h1>
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

        approve();
        disapprove();

        function approve() {
            $('.btn-approve').click(function(e) {

                e.preventDefault();

                var id = $(this).attr('id');
                var qty = $(this).data('qty');
                var prod_id = $(this).data('id');

                $.ajax({
                    url: 'libs/reservation_deduct.php',
                    method: 'POST',
                    data: {
                        id: id,
                        qty: qty,
                        prod_id: prod_id,
                    },
                    dataType: 'json',
                    success: function(res) {
                        if (res.success) {
                            alert(res.success);
                            location.reload();
                        } else {
                            alert(res.error);
                        }
                    }
                })
            })
        }

        function disapprove() {
            $('.btn-disapprove').click(function(e) {
                e.preventDefault();

                var id = $(this).attr('id');

                $.ajax({
                    url: 'libs/disapprove.php',
                    method: 'POST',
                    dataType: 'json',
                    data: {id : id} ,
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