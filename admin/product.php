<?php include_once('includes/header.php'); ?>
<?php include_once('modal/edit.php'); ?>
<?php
include_once('../core/function.php');
$init = new manageFunction;
// $fetchAcct = $init->getData("SELECT * FROM products ORDER BY id DESC");
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
                            <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">
                                <span>Products</span>
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add_product">
                                    Add Product
                                </button>
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

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal -->
           <?php include_once 'modal/modal_add_product.php'; ?>
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

<?php include_once 'includes/footer.php'; ?>

<script>
    $('#mytable').dataTable();
</script>