<?php include_once('includes/header.php'); ?>

<?php
  include_once '../core/mysqli_database.php';

  $init = new database;

  $data = $init->connect()->query("SELECT * FROM users");

  $claimed = $init->connect()->query("SELECT * FROM cart WHERE is_claimed = 1");
  $approve = $init->connect()->query("SELECT * FROM cart WHERE is_approve = 1 AND is_claimed = 0");
  $critical = $init->connect()->query("SELECT * FROM products WHERE item_qty <= 10");
  


?>


<div class="container-scroller">
  <!-- partial:partials/_navbar.html -->
  <?php include_once('includes/navbar.php'); ?>

  <!-- partial -->
  <div class="container-fluid page-body-wrapper">
    <!-- partial:partials/_sidebar.html -->
    <?php include_once('sidebar.php') ?>
    <!-- partial -->
    <div class="main-panel">
      <div class="content-wrapper">
        <!--   <div class="row purchace-popup">

        </div> -->
        <div class="row">
          <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
            <div class="card card-statistics">
              <div class="card-body">
                <div class="clearfix">
                  <div class="float-left">
                    <i class="mdi mdi-cube text-danger icon-lg"></i>
                  </div>
                  <div class="float-right">
                    <a href="#">
                      <p class="mb-0 text-right">Claimed Item(s)</p>
                    </a>
                    <div class="fluid-container">
                      <h3 class="font-weight-medium text-right mb-0"> <?php echo count($claimed->fetch_all());?></h3>
                    </div>
                  </div>
                </div>
                <p class="text-muted mt-3 mb-0">
                  <i class="mdi mdi-alert-octagon mr-1" aria-hidden="true"></i> Total Claimed Item(s)
                </p>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
            <div class="card card-statistics">
              <div class="card-body">
                <div class="clearfix">
                  <div class="float-left">
                    <i class="mdi mdi-receipt text-warning icon-lg"></i>
                  </div>
                  <div class="float-right">
                    <a href="#">
                      <p class="mb-0 text-right">Reserved Item(s)</p>
                    </a>
                    <div class="fluid-container">
                      <h3 class="font-weight-medium text-right mb-0"><?php echo count($approve->fetch_all());?></h3>
                    </div>
                  </div>
                </div>
                <p class="text-muted mt-3 mb-0">
                  <i class="mdi mdi-bookmark-outline mr-1" aria-hidden="true"></i> Total Reserved Item(s)
                </p>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
            <div class="card card-statistics">
              <div class="card-body">
                <div class="clearfix">
                  <div class="float-left">
                    <i class="mdi mdi-account-location text-success icon-lg"></i>
                  </div>
                  <div class="float-right">
                    <a href="#">
                      <p class="mb-0 text-right">User Account</p>
                    </a>
                    <div class="fluid-container">
                      <h3 class="font-weight-medium text-right mb-0"><?php echo count($data->fetch_all());?></h3>
                    </div>
                  </div>
                </div>
                <p class="text-muted mt-3 mb-0">
                  <i class="mdi mdi-calendar mr-1" aria-hidden="true"></i> Total User Account
                </p>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
            <div class="card card-statistics">
              <div class="card-body">
                <div class="clearfix">
                  <div class="float-left">
                    <i class="mdi mdi-account-location text-success icon-lg"></i>
                  </div>
                  <div class="float-right">
                    <a href="#">
                      <p class="mb-0 text-right">Critical Item(s)</p>
                    </a>
                    <div class="fluid-container">
                      <h3 class="font-weight-medium text-right mb-0"><?php echo count($critical->fetch_all());?></h3>
                    </div>
                  </div>
                </div>
                <p class="text-muted mt-3 mb-0">
                  <i class="mdi mdi-reload mr-1" aria-hidden="true"></i> Total Critical Item(s)
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
  <?php include_once 'admin_footer.php'; ?>
      <!-- partial -->
    </div>
    <!-- main-panel ends -->
  </div>
  <!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->

<?php include_once 'includes/footer.php' ?>