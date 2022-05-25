<?php include_once('includes/header.php'); ?>
<div class="container-scroller">
  <!-- partial:partials/_navbar.html -->
  <?php include_once('includes/navbar.php'); ?>
  <!-- partial -->
  <div class="container-fluid page-body-wrapper">
    <!-- partial:partials/_sidebar.html -->
    <nav class="sidebar sidebar-offcanvas" id="sidebar">
      <ul class="nav">
        <li class="nav-item nav-profile">
          <div class="nav-link">
            <div class="user-wrapper">
              <div class="profile-image">
                <img src="images/faces/face1.jpg" alt="profile image">
              </div>
              <div class="text-wrapper">
                <p class="profile-name"> <?php echo ucfirst($_SESSION['name']); ?></p>
                <div>
                  <small class="designation text-muted">Manager</small>
                  <span class="status-indicator online"></span>
                </div>
              </div>
            </div>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php">
            <i class="menu-icon mdi mdi-television"></i>
            <span class="menu-title">Dashboard</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="approval.php">
            <i class="menu-icon mdi mdi-email"></i>
            <span class="menu-title">Post Approval</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="viewall.php">
            <i class="menu-icon mdi mdi-message-reply"></i>
            <span class="menu-title">View all post</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="account.php">
            <i class="menu-icon mdi mdi-account"></i>
            <span class="menu-title">Manage Account</span>
          </a>
        </li>
      </ul>
    </nav>
    <!-- partial -->
    <div class="main-panel">
      <div class="content-wrapper">
        <!--   <div class="row purchace-popup"> -->
          <div class="card">
            <di class="card-header">
              <h4 class="text-muted">Manage Pending Request</h4>
            </di>
            <div class="card-body">
              <div id="appMessage"></div>
              <div class="table-responsive">
                <table class="table table-hover" cellspacing="0" width="100%">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Entry ID</th>
                      <th>Title</th>
                      <th>Post by</th>
                      <th>Date Created</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody id="fetch">
                    <!-- //HERE??? -->
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <footer class="footer">
          <div class="container-fluid clearfix">
            <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © 2018
              <a href="http://www.bootstrapdash.com/" target="_blank">Bootstrapdash</a>. All rights reserved.</span>
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