<?php include_once('includes/header.php'); ?>
<?php include_once('modal/edit.php'); ?>
<?php

include_once '../core/mysqli_database.php';
$init = new database;

$products = $init->connect()->query("SELECT * FROM products ORDER BY id DESC");

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
                                <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add_product">
                                    Add Product
                                </button> -->
                                <a href="add_product.php" class="btn btn-primary">Add Product</a>
                            </div>
                            <div class="card-body">
                                <table class="table table-hover" id="mytable">
                                    <thead>
                                        <tr>
                                            <th>Product Image</th>
                                            <th>Item Code</th>
                                            <th>Item Name</th>
                                            <th>Item Size</th>
                                            <th>Item Price</th>
                                            <th>Item Stock(s)</th>
                                            <th>Item Variation</th>
                                            <th>Item Category</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if ($products->num_rows > 0) : ?>
                                            <?php while ($product = $products->fetch_object()) : ?>
                                                <tr id="<?php echo $product->id; ?>">
                                                    <td>
                                                        <img src="../products/<?php echo $product->item_image; ?>" alt="">
                                                    </td>
                                                    <td><?= $product->item_code; ?></td>
                                                    <td><?= $product->item_name; ?></td>
                                                    <td><?= $product->item_size; ?></td>
                                                    <td><?= $product->item_price; ?></td>
                                                    <td><?= $product->item_qty; ?></td>
                                                    <td><?= $product->item_variant; ?></td>
                                                    <td><?= $product->item_cat == 'men' ? 'Men' : 'Women' ?></td>
                                                    <td>
                                                        <button class="btn btn-sm btn-danger delete" id="<?php echo $product->id; ?>"><i class="fa-solid fa-trash"></i></button>
                                                        <button type="button" class="btn btn-sm btn-info edit" data-toggle="modal" data-target="#edit_product">
                                                        <i class="fa-solid fa-eye"></i>
                                                        </button>
                                                        <a href="update_product.php?id=<?= $product->id?>" class="btn btn-sm btn-primary"><i class="fa-solid fa-file-pen"></i></a>
                                                    </td>
                                                </tr>

                                            <?php endwhile; ?>
                                        <?php else : ?>
                                            <tr>
                                                <td class="text-muted text-center mt-3 mb-3" colspan="10">
                                                    <h1>NO PRODUCT FOUND</h1>
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
            <!-- Modal -->
            <?php include_once 'modal/modal_edit_product.php'; ?>
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
    $(function() {



        show_product();
        delete_product();
        update_product();

        function delete_product() {
            $('.delete').click(function() {

                $.ajax({
                    url: 'libs/delete_product.php',
                    method: 'POST',
                    dataType: 'json',
                    data: {
                        id: $(this).attr('id')
                    },
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

        function show_product() {
            $('.edit').click(function() {

                var id = $(this).closest('tr').attr('id');

                $.ajax({
                    url: 'libs/get_product_info.php',
                    method: 'POST',
                    dataType: 'json',
                    data: {
                        id: id
                    },
                    success: function(res) {
                        // console.log(res.data.item_image);
                        $('#item_image').attr('src', '../products/'+res.data.item_image);
                        $('#item_name').val(res.data.item_name);
                        $('#item_code').val(res.data.item_code);
                        $('#item_size').val(res.data.item_size);
                        $('#item_price').val(res.data.item_price);
                        $('#item_qty').val(res.data.item_qty);
                        $('#item_variant').val(res.data.item_variant);
                        //    $('#item_size').val(res.data.item_size);
                        $('#item_cat').append('<option>'+res.data.item_cat+'</option>')

                    }
                })

            })
        }

        function update_product() {

            $('#submit').click(function() {
                
                $.ajax({
                    url: 'libs/update_product.php',
                    method: 'POST',
                    dataType: 'json',
                    data: $('form#form_product').serialize(),

                })
            });
        }
    });
</script>