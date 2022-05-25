<?php include_once('includes/header.php'); ?>
<?php include_once('modal/edit.php'); ?>
<?php
include_once('../core/function.php');
$init = new manageFunction;
$fetchAcct = $init->getData("SELECT * FROM products ORDER BY id DESC");
// var_dump($fetchAcct);
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
                <?php if (!empty($message)) {
                    echo $message;
                } ?>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header bg-dark text-white">
                                <span>Products</span>
                            </div>
                            <div class="card-body">
                                <table class="table table-hover" id="mytable">
                                    <thead>
                                        <tr>
                                            <th>Item Code</th>
                                            <th>Item Name</th>
                                            <th>Item Size</th>
                                            <th>Item Price</th>
                                            <th>Item Stock(s)</th>
                                            <th>Item Variation</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($fetchAcct as $f):?>
                                            <tr>
                                                <td><?php echo $f->item_code; ?></td>
                                                <td><?php echo $f->item_name; ?></td>
                                                <td><?php echo $f->item_size; ?></td>
                                                <td><?php echo $f->item_price; ?></td>
                                                <td><?php echo $f->item_stocks; ?></td>
                                                <td><?php echo $f->item_variation; ?></td>
                                                <td>
                                                    <a href="#">Edit</a>
                                                </td>
                                            </tr>
                                        <?php endforeach;?>
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
<script>
    $('#mytable').DataTable({});
</script>
</body>

</html>