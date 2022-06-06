<?php include_once('includes/header.php'); ?>
<?php include_once('modal/edit.php'); ?>
<?php

include_once '../core/mysqli_database.php';
$init = new database;
$products = $init->connect()->query("SELECT * FROM products");

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
                                <span>Inventory</span>
                            </div>
                            <div class="card-body">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Item Image</th>
                                            <th>Item Code</th>
                                            <th>Item Name</th>
                                            <th>Item Size</th>
                                            <th>Item Stock(s)</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if ($products->num_rows > 0) : ?>
                                            <?php while ($p = $products->fetch_object()) : ?>
                                                <tr>
                                                    <td><img src="../products/<?php echo $p->item_image; ?>" alt=""></td>
                                                    <td><?php echo $p->item_code; ?></td>
                                                    <td><?php echo $p->item_name; ?></td>
                                                    <td><?php echo $p->item_size; ?></td>
                                                    <td><?php echo $p->item_qty; ?></td>
                                                    <td>
                                                        <?php if ($p->item_qty <= 0) : ?>
                                                            <button type="button" class="btn btn-sm btn-danger restock" id="<?php echo $p->id; ?>" data-toggle="modal" data-target="#restock">
                                                                Restock
                                                            </button>
                                                        <?php else : ?>
                                                            <button type="button" class="btn btn-sm btn-success restock" id="<?php echo $p->id; ?>" data-toggle="modal" data-target="#restock">
                                                                Restock
                                                            </button>
                                                        <?php endif; ?>
                                                    </td>
                                                </tr>
                                            <?php endwhile; ?>
                                        <?php else : ?>
                                            <tr>
                                                <td colspan="8">
                                                    <h1 class="text-center text-muted">NO ITEM FOUND</h1>
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
            <?php include_once 'modal/restock.php'; ?>
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
      restock();
      exe_restock();
      function restock(){
        $('.restock').click(function(e) {
            var id = $(this).attr('id');
            
            $('#hidden_id').val(id);

        })
      }

      function exe_restock(){
          $('.add_stock').click(function(e) {
              
            var form = $('#restock_form').serialize();
            
            $.ajax({
                url: 'libs/restock.php',
                method: 'POST',
                dataType: 'json',
                data: form,
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