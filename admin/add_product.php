<?php include_once('includes/header.php'); ?>
<?php include_once('modal/edit.php'); ?>

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
                                <span>Add new Products</span>
                                <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add_product">
                                    Add Product
                                </button> -->
                                <a href="product.php" class="btn btn-primary">Back</a>
                            </div>
                            <div class="card-body">
                                <form id="form_product">
                                    <div class="mb-3">
                                        <label for="formFile" class="form-label">Upload Product Image</label>
                                        <input class="form-control" name="file" type="file" id="formFile">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="">Item Name</label>
                                        <input type="text" name="item_name" class="form-control" placeholder="Enter Item Name">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="">Item Code</label>
                                        <input type="text" name="item_code" class="form-control" placeholder="Enter Item Code">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="">Item Size</label>
                                        <input type="text" name="item_size" class="form-control" placeholder="Enter Item Size">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="">Item Price</label>
                                        <input type="number" min="0" name="item_price" class="form-control" placeholder="Item Price">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="">Item Stock</label>
                                        <input type="text" name="item_qty" class="form-control" placeholder="Item Stock">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="">Item Category</label>
                                        <select name="item_cat" class="form-control">
                                            <option disabled selected>-Select Variant-</option>
                                            <option value="men">Men</option>
                                            <option value="women">Women</option>
                                        </select>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="">Item Variant</label>
                                        <input type="text" name="item_variant" class="form-control" placeholder="Item Variant">
                                    </div>
                                    <button type="submit" class="btn btn-success">Submit</button>
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

        $('form#form_product').submit(function(e) {
            e.preventDefault();

            $.ajax({
                url: 'libs/upload_product.php',
                method: 'POST',
                data: new FormData(this),
                contentType: false,
                processData: false,
                success: function(res) {
                    const data = JSON.parse(res);
                    if( !data.error) {
                        alert(data.success);
                        $('#form_product')[0].reset();
                    } else {
                        alert(data.error)
                    }
                }
            })

        })

    })
</script>