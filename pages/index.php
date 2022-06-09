<?php
session_start();

include_once '../core/mysqli_database.php';
$init = new database;

$products = $init->connect()->query("SELECT * FROM products ORDER BY id DESC");

?>


<?php include_once 'header.php'; ?>

<script>
  $(function() {

    $('.submit_search').click(function(e) {

      e.preventDefault();

      var form = $('form#form_search').serialize();

      $.ajax({
        url: '../libs/search_2.php',
        method: 'POST',
        data: form,
        dataType: 'json',
        success: function(res) {
         $('#search_body').html(res);
        }
      })
    })

  })
</script>

<div class="container">
  <div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12">
      <div class="card mt-3">
        <div class="card-header">
          <b style="font-size: 20px; font-weight: 500;" class="text-muted">Search</b>
          <form class="form-inline float-right" id="form_search">
            <input class="form-control search_box" type="search" name="search_name" id="search_box" placeholder="Search" aria-label="Search" style="margin-right: 3px;">
            <button class="btn btn-outline-warning my-2 my-sm-0 submit_search" type="button" style="margin-left: 5px;" data-toggle="modal" data-target="#search_modal">Search</button>
          </form>
        </div>
      </div>
    </div>
  </div>


<?php include_once 'carousel.php'; ?>

<style>

  a:hover {
    text-decoration: none;
  }
  a {
    color: #333;
  }
  

</style>
<?php include_once 'search.php'; ?>
<div class="container">
  <div class="card mb-5">
    <div class="card-body">
      <h4>Products</h4>

      <?php if ($products->num_rows > 0) : ?>
        <div class="row mt-5 mb-5">

          <?php while ($product = $products->fetch_object()) : ?>
            <div class="col-lg-4">
              <a href="single.php?id=<?php echo $product->id; ?>">
                <div class="card">
                  <div class="card-header">
                    <img src="../products/<?php echo $product->item_image; ?>" alt="" class="img-thumbnail">
                  </div>
                  <div class="card-body">
                    <h5 style="color: black;"><?php echo $product->item_name; ?></h5>
                    <span>Size: <?php echo $product->item_size; ?></span>
                    <br>
                    <span>Price: ₱<?php echo $product->item_price; ?></span>
                  </div>
                </div>
              </a>
            </div>

          <?php endwhile; ?>
        </div>
      <?php else : ?>
        <h1 class="text-center text-muted mt-5 mb-5">NO DATA</h1>
      <?php endif; ?>

    </div>
  </div>




<?php include_once 'footer.php'; ?>