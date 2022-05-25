<?php include_once('includes/header.php'); ?>
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
                    <a href="viewall.php">
                      <p class="mb-0 text-right">Verified Post</p>
                    </a>
                    <div class="fluid-container">
                      <h3 class="font-weight-medium text-right mb-0"><?php echo count($verifiedPost); ?></h3>
                    </div>
                  </div>
                </div>
                <p class="text-muted mt-3 mb-0">
                  <i class="mdi mdi-alert-octagon mr-1" aria-hidden="true"></i> Total Verified Post
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
                    <a href="approval.php">
                      <p class="mb-0 text-right">Request Post</p>
                    </a>
                    <div class="fluid-container">
                      <h3 class="font-weight-medium text-right mb-0"><?php echo count($requestPost); ?></h3>
                    </div>
                  </div>
                </div>
                <p class="text-muted mt-3 mb-0">
                  <i class="mdi mdi-bookmark-outline mr-1" aria-hidden="true"></i> Total Request Post
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
                    <a href="account.php">
                      <p class="mb-0 text-right">User Account</p>
                    </a>
                    <div class="fluid-container">
                      <h3 class="font-weight-medium text-right mb-0"><?php echo count($userCount); ?></h3>
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
                    <i class="mdi mdi-delete text-danger icon-lg"></i>
                  </div>
                  <div class="float-right">
                    <a href="deleted_post.php">
                      <p class="mb-0 text-right">Deleted Post</p>
                    </a>
                    <div class="fluid-container">
                      <h3 class="font-weight-medium text-right mb-0"><?php echo count($viewDeleted); ?></h3>
                    </div>
                  </div>
                </div>
                <p class="text-muted mt-3 mb-0">
                  <i class="mdi mdi-reload mr-1" aria-hidden="true"></i> Total Deleted Post
                </p>
              </div>
            </div>
          </div>
        </div>




      </div>
      <!-- content-wrapper ends -->
      <!-- partial:partials/_footer.html -->
      <footer class="footer">
        <div class="container-fluid clearfix">
          <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © 2022
            Sofia Fashionwear. All rights reserved.</span>
          <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with
            <i class="mdi mdi-heart text-danger"></i>
          </span>
        </div>
      </footer>
      <!-- partial -->
    </div>
    <!-- main-panel ends -->
  </div>
  <!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->

<?php include_once 'includes/footer.php'?>