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
        <!-- <li class="nav-item">
          <a class="nav-link" href="approval.php">
            <i class="menu-icon mdi mdi-email"></i>
            <span class="menu-title">Post Approval</span>
          </a>
        </li> -->
        <!-- <li class="nav-item">
          <a class="nav-link" href="viewall.php">
            <i class="menu-icon mdi mdi-message-reply"></i>
            <span class="menu-title">View all post</span>
          </a>
        </li> -->
        <li class="nav-item">
          <a class="nav-link" href="account.php">
            <i class="menu-icon mdi mdi-account"></i>
            <span class="menu-title">Manage Account</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="product.php">
            <i class="menu-icon mdi mdi-cart"></i>
            <span class="menu-title">Manage Products</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="reservation.php">
          <i class="menu-icon mdi mdi-table"></i>
            <span class="menu-title">Reservation Request</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="reservation_list.php">
          <i class="menu-icon mdi mdi-table"></i>
            <span class="menu-title">Reservation List</span>
          </a>
        </li>
               <li class="nav-item">
          <a class="nav-link" href="inventory.php">
            <i class="menu-icon mdi mdi-table"></i>
            <span class="menu-title">Inventory</span>
          </a>
        </li>
        <!--      <li class="nav-item">
          <a class="nav-link" href="pages/icons/font-awesome.html">
            <i class="menu-icon mdi mdi-comment-outline"></i>
            <span class="menu-title">Comments</span>
          </a>
        </li> -->
        <!-- <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
              <i class="menu-icon mdi mdi-restart"></i>
              <span class="menu-title">Manage Inventory</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="auth">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                  <a class="nav-link" href="#"> Add Stock </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#l"> Critical Level </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#"> Reports </a>
                </li>
              </ul>
            </div>
          </li> -->
      </ul>
    </nav>