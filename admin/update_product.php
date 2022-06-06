<?php include_once('includes/header.php'); ?>
<?php include_once('modal/edit.php'); ?>

<?php
include_once '../core/mysqli_database.php';
$init = new database;


$id = $_GET['id'];

$product = $init->connect()->query("SELECT * FROM products WHERE id = $id LIMIT 1");
$p = $product->fetch_object();
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
                    <div class="col-lg-6 offset-lg-3">
                        <div class="card">
                            <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">
                                <span>Update Product</span>
                                <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add_product">
                                    Add Product
                                </button> -->
                                <a href="product.php" class="btn btn-primary">Back</a>
                            </div>
                            <div class="card-body">
                                <form id="update_data">
                                    <input type="hidden" name="hidden_id" value="<?= $p->id ?>">
                                    <div class="text-center">
                                        <img src="../products/<?= $p->item_image ?>" alt="" class="img-thumbnail">
                                    </div>
                                    <div class="mb-3">
                                        <label for="formFile" class="form-label">Upload Product Image</label>
                                        <input class="form-control" name="file" type="file" id="formFile">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="">Item Code</label>
                                        <input type="text" name="item_code" value="<?= $p->item_code; ?>" class="form-control" placeholder="Enter Item Code">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="">Item Name</label>
                                        <input type="text" name="item_name" value="<?= $p->item_name; ?>" class="form-control" placeholder="Enter Item Name">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="">Item Size</label>
                                        <input type="text" name="item_size" value="<?= $p->item_size; ?>" class="form-control" placeholder="Enter Item Size">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="">Item Price</label>
                                        <input type="number" min="0" value="<?= $p->item_price; ?>" name="item_price" class="form-control" placeholder="Item Price">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="">Item Qty</label>
                                        <input type="text" name="item_qty" value="<?= $p->item_qty; ?>" class="form-control" placeholder="Item Stock">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="">Item Category</label>
                                        <select name="item_cat" class="form-control">
                                            <option disabled>-Select Category-</option>
                                            <option value="men" <?= $p->item_cat == 'men' ? 'selected' : ''; ?>>Men</option>
                                            <option value="women" <?= $p->item_cat == 'women' ? 'selected' : ''; ?>>Women</option>
                                        </select>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="">Item Variant</label>
                                        <input type="text" name="item_variant" value="<?= $p->item_variant; ?>" class="form-control" placeholder="Item Variant">
                                    </div>
                                    <button type="submit" class="btn btn-success">Update</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal -->
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
    $(function() {

        $('form#update_data').submit(function(e) {
            e.preventDefault();

            var form_data = new FormData(this);

            $.ajax({
                url: 'libs/update_product.php',
                method: 'POST',
                data: form_data,
                contentType: false,
                processData: false,
                dataType: 'json',
                success: function(res) {
                    if(res.success) {
                        alert(res.success);
                        location.reload();
                    } else {
                        alert(res.error);
                    }
                }
            })
        });
    });
</script>