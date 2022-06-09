<?php
session_start();
include_once 'header.php'; ?>

<?php
include_once '../core/mysqli_database.php';
$init = new database;


$id = $_GET['id'];

$product = $init->connect()->query("SELECT * FROM products WHERE id = $id");
$p = $product->fetch_object();


?>
<div class="container">
    <div class="card mt-5 mb-5">
        <div class="card-header">
            <span>Make Reservation</span>
        </div>
        <div class="row">
            <div class="col-lg-5">
                <div style="padding: 20px;">
                    <img src="../products/<?php echo $p->item_image; ?>" width="300" alt="">
                </div>
            </div>
            <div class="col-lg-7">
                <div style="padding: 50px 20px 20px;">
                    <h2><?php echo $p->item_name; ?></h2>
                    <div class="pt-3">
                        <p class="text-muted"> Category: <span class="badge badge-secondary"><?php echo ucfirst($p->item_cat); ?></span></p>
                        <p class="text-muted"> Price: ₱<span class="text-dark"><?php echo $p->item_price; ?></span></p>
                        <p class="text-muted"> Size: <span class="text-dark"><?php echo $p->item_size; ?></span></p>
                        <p class="text-muted"> Available Stock(s): <span class="text-dark" id="actual_qty"><?php echo $p->item_qty <= 0 ? 'Out of Stock' : $p->item_qty; ?></span></p>
                        <p class="text-muted"> Variant: <span class="text-dark"><?php echo $p->item_variant; ?></span></p>
                        <form>
                            <input type="hidden" name="user_id" value="<?php echo $_SESSION['id']; ?>">
                            <input type="hidden" name="product_id" value="<?php echo $_GET['id']; ?>">
                            <input type="hidden" name="item_id" value="<?php echo $p->id; ?>">
                            <input type="hidden" name="item_name" value="<?php echo $p->item_name; ?>">
                            <input type="hidden" name="item_price" value="<?php echo $p->item_price; ?>">
                            <input type="hidden" name="item_size" value="<?php echo $p->item_size; ?>">
                            <input type="hidden" name="item_image" value="<?php echo $p->item_image; ?>">
                            <div class="d-flex mb-3">
                                <label class="text-muted"> Qty: &nbsp; </label><input  style="width: 100px;"type="number" name="order_qty" id="order_qty" min="0" <?php echo $p->item_qty <= 0 ? 'readonly' : '' ?> class="form-control d-inline">
                            </div>


                            <div>
                                <button class="btn btn-success" <?php echo $p->item_qty <= 0 ? 'disabled' : '' ?> id="">Make Reservation</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include_once 'footer.php'; ?>

<script>
    $(function() {

        $('form').submit(function(e) {
            e.preventDefault();

            // console.log($(this).serialize());

            var actual_qty = $('span#actual_qty').text();
            var order_qty = $('#order_qty').val();

            if (order_qty > parseInt(actual_qty)) {
                alert('Order qty. cannot be higher than to actual item qty.');
            } else {

                $.ajax({
                    url: '../libs/cart.php',
                    method: 'POST',
                    dataType: 'json',
                    data: new FormData(this),
                    processData: false,
                    contentType: false,
                    success: function(res) {
                        if (res.success) {
                            alert(res.success);
                            location.reload();
                        } else {
                            alert(res.error);
                        }
                    }
                })
            }
        })
    })
</script>