<?php include_once('includes/header.php'); ?>
<?php include_once('includes/navbar_none_user.php'); ?>
<?php

include_once 'core/mysqli_database.php';
$init = new database;

$products = $init->connect()->query("SELECT * FROM products ORDER BY id DESC");


?>

<script>
  $(function() {

    $('form#form_search').submit(function(e) {

      e.preventDefault();

      var form = $(this).serialize();

      $.ajax({
        url: 'libs/search.php',
        method: 'POST',
        data: form,
        dataType: 'json',
        success: function(res) {
          console.log(res);
          window.location.href = 'search.php';
        }
      })

    })

  })
</script>

<?php include_once 'search.php';?>

<div class="container">
  <div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12">
      <div class="card mt-3">
        <div class="card-header">
          <b style="font-size: 20px; font-weight: 500;" class="text-muted">Search</b>
          <form class="form-inline float-right" id="form_search">
            <input class="form-control search_box" type="search" name="search_name" id="search_box" placeholder="Search" aria-label="Search" style="margin-right: 3px;">
            <button class="btn btn-outline-warning my-2 my-sm-0"  style="margin-left: 5px;">Search</button>
          </form>
        </div>
      </div>
    </div>
  </div>


  <div id="carouselExampleControls" class="carousel slide mt-3 mb-3" data-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img class="d-block w-100" src="./assets/img/sample1.webp" alt="First slide">
      </div>
      <div class="carousel-item">
        <img class="d-block w-100" src="./assets/img/sample1.webp" alt="Second slide">
      </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>

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
                    <img src="products/<?php echo $product->item_image; ?>" alt="" class="img-thumbnail">
                  </div>
                  <div class="card-body">
                    <h5><?php echo $product->item_name; ?></h5>
                    <span><?php echo $product->item_price; ?></span>
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

  <?php include_once('includes/footer.php'); ?>