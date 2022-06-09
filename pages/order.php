<?php session_start(); ?>
<?php include_once 'header.php'; ?>

<?php
include_once '../core/mysqli_database.php';
$init = new database;

$id = $_GET['order_id'];

$orders = $init->connect()->query("SELECT * FROM cart WHERE user_id = $id AND is_claimed = 0");

?>

<script>

    $(function(){
        $('.cancel').click(function(res) {
            var id = $(this).attr('id');

            $.ajax({
                url: '../libs/cancel.php',
                method: 'POST',
                data: {id : id},
                dataType: 'json',
                success: function(res) {
                    if(res.success) {
                        alert(res.success);
                        location.reload();
                    } else {
                        alert(res.error);
                    }
                }
            });
        })
    });

</script>

<div class="container">
    <div class="card mt-5">
        <div class="card-header">
            <span>MY RESERVATION</span>
            <a href="index.php" class="btn btn-primary float-right">
                <i class="fa-solid fa-house-chimney"></i> Buy again
            </a>
        </div>
        <div class="card-body">
            <table class="table table-stripped">
                <thead>
                    <tr>
                        <th>ITEM IMAGE</th>
                        <th>ITEM NAME</th>
                        <th>ITEM QTY</th>
                        <th>AMOUNT</th>
                        <th>STATUS</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($orders->num_rows > 0) : ?>
                        <?php while ($order = $orders->fetch_object()) : ?>
                            <tr>
                                <td><img src="../products/<?php echo $order->item_image; ?>" alt="" width="80"></td>
                                <td><?php echo $order->item_name; ?></td>
                                <td><?php echo $order->order_qty; ?></td>
                                <td>
                                    <?php echo $order->order_qty * $order->item_price; ?>
                                </td>
                                <td>
                                    <?php if ($order->is_approve) : ?>
                                        <span class="text-muted">
                                            <i class="fa-solid fa-check text-success"></i> Approved
                                        </span>
                                    <?php else : ?>
                                        <button class="btn btn-danger bnt-sm cancel" id="<?php echo $order->id; ?>">Cancel Request</button>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    <?php else : ?>
                        <tr>
                            <td colspan="6">
                                <h1 class="text-muted text-center">NO RESERVATION FOUND</h1>
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

</div>

<?php include_once 'footer.php'; ?>
