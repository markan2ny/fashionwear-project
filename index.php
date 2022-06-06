<?php include_once('includes/header.php'); ?>
<?php include_once('includes/navbar_none_user.php'); ?>
<?php

include_once 'core/mysqli_database.php';
$init = new database;

$products = $init->connect()->query("SELECT * FROM products ORDER BY id DESC");


?>




<style>
  @media only screen and (max-width: 767px),
  only screen and (max-width: 767px) {
    .btn-search {
      /*width: 100%;*/
      margin-left: -5px;
    }

    .combo_box {
      width: 100px;

    }

    .search_box {
      width: 180px;
      margin-right: 1px;
    }
  }

  .card .card-hover:hover {
    -webkit-box-shadow: 1px 9px 40px -12px rgba(0, 0, 0, 0.75);
    -moz-box-shadow: -1px 9px 40px 12px rgba(0, 0, 0, 0.75);
    box-shadow: -1px 9px 40px -12px rgba(0, 0, 0, 0.75);
  }

  .card .card-hover {
    border: none;
    background: #f5f6fa;
  }
</style>
<div class="container">
  <div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12">
      <div class="card mt-3">
        <div class="card-header">
          <b style="font-size: 20px; font-weight: 500;" class="text-muted">Search</b>
          <form class="form-inline float-right" method="POST">
            <input class="form-control search_box" type="search" name="search_box" id="search_box" placeholder="Search" aria-label="Search" style="margin-right: 3px;">
            <select class="form-control combo_box" name="search_name">
              <option selected disabled value="n">Search by</option>
              <option value="title">By Resort Name</option>
              <option value="Address">By Location</option>
              <!-- <option value="price">By Price</option> -->
            </select>
            <button class="btn btn-outline-warning my-2 my-sm-0" name="search-btn" id="search-btn" style="margin-left: 5px;">Search</button>
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
              <a href="single.php?id=<?php echo $product->id;?>">
                <div class="card">
                  <div class="card-header">
                    <img src="products/<?php echo $product->item_image; ?>" alt="" class="img-thumbnail">
                  </div>
                  <div class="card-body">
                    <h4><?php echo $product->item_name;?></h4>
                    <span><?php echo $product->item_price;?></span>
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