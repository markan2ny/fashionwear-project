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
                <p class="profile-name"> <?php echo ucfirst($_SESSION['name']);  ?></p>
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
        <!--        <li class="nav-item">
          <a class="nav-link" href="pages/tables/basic-table.html">
            <i class="menu-icon mdi mdi-table"></i>
            <span class="menu-title">Categories</span>
          </a>
        </li> -->
        <!--      <li class="nav-item">
          <a class="nav-link" href="pages/icons/font-awesome.html">
            <i class="menu-icon mdi mdi-comment-outline"></i>
            <span class="menu-title">Comments</span>
          </a>
        </li> -->
        <!-- <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
              <i class="menu-icon mdi mdi-restart"></i>
              <span class="menu-title">User Pages</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="auth">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                  <a class="nav-link" href="pages/samples/blank-page.html"> Blank Page </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="pages/samples/login.html"> Login </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="pages/samples/register.html"> Register </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="pages/samples/error-404.html"> 404 </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="pages/samples/error-500.html"> 500 </a>
                </li>
              </ul>
            </div>
          </li> -->
      </ul>
    </nav>
    <!-- partial -->
    <div class="main-panel">
      <div class="content-wrapper">
        <!--   <div class="row purchace-popup">

        </div> -->

        <div class="card mt-2">
          <div class="card-header">
            <h4 class="card-title text-muted">Manage Deleted Post</h4>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-hover myTable" cellspacing="0" width="100%">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Posted By</th>
                    <th>Date Posted</th>
                    <th>Status</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $count = 1; ?>
                  <?php foreach ($viewDeleted as $row) : ?>
                    <tr>
                      <td><?php echo $count; ?></td>
                      <td><?php echo $row->title; ?></td>
                      <td><?php echo $row->name; ?></td>
                      <td><?php echo $row->date; ?></td>
                      <td><label class="badge badge-danger">Deleted</label></td>
                    </tr>
                    <?php $count = $count + 1; ?>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>



      </div>
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