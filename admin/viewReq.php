<?php include_once('includes/header.php'); ?>
<div class="container-scroller">
  <!-- partial:partials/_navbar.html -->
  <?php include_once('includes/navbar.php'); ?>

  <?php 

  include_once('../core/function.php');
  $init = new manageFunction;

  $fetchAll = $init->getSpecific(array($_GET['id']), "SELECT * FROM image_location WHERE id = ?");

  ?>

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

          <div class="row">
            <div class="col-lg-12">
              <div class="card mt-2">
                <div id="successMessage"></div>
                <div class="card-header">
                  <h4 class="text-muted card-title">View Request</h4>
                </div>
                <div class="card-body">
                  <div id="confirmMsg"></div>

                  <div class="row">
                    <div class="col-lg-6">

                      <img src="<?php echo 'permits/'.$fetchAll[0]->permit; ?>" width="100%" class="img-responsive">
                    </div>
                    <div class="col-lg-6">
                      <div class="table-responsive">
                        <table class="table" cellspacing="0" width="100%">
                          <tbody class="thead-light">
                            <tr>
                              <th>Title:</th>
                              <td><?php echo strtoupper($fetchAll[0]->title); ?></td>
                            </tr>

                            <tr>
                              <th>Posted by:</th>
                              <td><?php echo ucfirst($fetchAll[0]->name); ?></td>
                            </tr>
                            <tr>
                              <th>Date Posted:</th>
                              <td><?php echo date('F d, Y',strtotime($fetchAll[0]->date)); ?></td>
                              
                            </tr>
                            <tr>
                              <th>Contact Number:</th>
                              <td><?php echo strtoupper($fetchAll[0]->contact); ?></td>

                            </tr>
                            <tr>
                              <th>Email address:</th>
                              <td><?php echo $fetchAll[0]->email; ?></td>
                            </tr>

                            <tr>
                              <th>Location:</th>
                              <td><textarea class="form-control-plaintext" rows="5" readonly=""><?php echo ucfirst($fetchAll[0]->location); ?></textarea></td>
                            </tr>
                            <tr>
                              <th>Day Entrance:</th>
                              <td><textarea class="form-control-plaintext" rows="4" readonly=""><?php echo ucfirst($fetchAll[0]->dentrance); ?></textarea></td>
                            </tr>
                            <tr>
                              <th>Night Entrance:</th>
                              <td><textarea class="form-control-plaintext" rows="4" readonly=""><?php echo ucfirst($fetchAll[0]->nentrance); ?></textarea></td>
                            </tr>
                            <tr>
                              <th>Cottage:</th>
                              <td><textarea class="form-control-plaintext" rows="4" readonly=""><?php echo ucfirst($fetchAll[0]->cottage); ?></textarea></td>
                            </tr>
                            <tr>
                              <th>Room Package:</th>
                              <td><textarea class="form-control-plaintext" rows="4" readonly=""><?php echo ucfirst($fetchAll[0]->roompackage); ?></textarea></td>
                            </tr>
                                <tr>
                              <th>Business Hour:</th>
                              <td><textarea class="form-control-plaintext" rows="4" readonly=""><?php echo ucfirst($fetchAll[0]->business); ?></textarea></td>
                            </tr>

                          </tbody>
                        </table> 
                        <button class="btn btn-primary mt-2 btn-block status1" id="<?php echo $_GET['id']; ?>">Approve</button>
                      </div>
                    </div>
                  </div>
                </div>
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