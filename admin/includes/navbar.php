      <?php 
      include_once('../core/function.php');
      $init = new manageFunction;

      $userCount = $init->getData("SELECT * FROM users");
      $requestPost = $init->getSpecific(array('not verified', 1), "SELECT * FROM image_location WHERE status = ? AND thumbnail = ?");
      $verifiedPost = $init->getSpecific(array('verified', 1), "SELECT * FROM image_location WHERE status = ? AND thumbnail = ? AND isDeleted = 0");
      $viewAll = $init->getData("SELECT * FROM image_location WHERE status = 'verified' AND thumbnail = 1 AND isDeleted = 0");
      $viewDeleted = $init->getData("SELECT * FROM image_location WHERE status = 'verified' AND thumbnail = 1 AND isDeleted = 1");

      ?>

      <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-top justify-content-center">
          <a class="navbar-brand brand-logo" href="index.php">
            <img src="images/logo.svg" alt="logo" />
          </a>
          <a class="navbar-brand brand-logo-mini" href="index.php">
            <img src="images/logo-mini.svg" alt="logo" />
          </a>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-center">

          <ul class="navbar-nav navbar-nav-right">
            <!-- NOTIFICATION -->
        <!--     <li class="nav-item dropdown">
              <a class="nav-link count-indicator dropdown-toggle" id="messageDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                <i class="mdi mdi-file-document-box"></i>
                <span class="count">7</span>
              </a>
              <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="messageDropdown">
                <div class="dropdown-item">
                  <p class="mb-0 font-weight-normal float-left">You have 7 unread mails
                  </p>
                  <span class="badge badge-info badge-pill float-right">View all</span>
                </div>
                <div class="dropdown-divider"></div>

                <a class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <img src="images/faces/face4.jpg" alt="image" class="profile-pic">
                  </div>
                  <div class="preview-item-content flex-grow">
                    <h6 class="preview-subject ellipsis font-weight-medium text-dark">David Grey
                      <span class="float-right font-weight-light small-text">1 Minutes ago</span>
                    </h6>
                    <p class="font-weight-light small-text">
                      The meeting is cancelled
                    </p>
                  </div>
                </a>

                <div class="dropdown-divider"></div>
                <a class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <img src="images/faces/face2.jpg" alt="image" class="profile-pic">
                  </div>
                  <div class="preview-item-content flex-grow">
                    <h6 class="preview-subject ellipsis font-weight-medium text-dark">Tim Cook
                      <span class="float-right font-weight-light small-text">15 Minutes ago</span>
                    </h6>
                    <p class="font-weight-light small-text">
                      New product launch
                    </p>
                  </div>
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <img src="images/faces/face3.jpg" alt="image" class="profile-pic">
                  </div>
                  <div class="preview-item-content flex-grow">
                    <h6 class="preview-subject ellipsis font-weight-medium text-dark"> Johnson
                      <span class="float-right font-weight-light small-text">18 Minutes ago</span>
                    </h6>
                    <p class="font-weight-light small-text">
                      Upcoming board meeting
                    </p>
                  </div>
                </a>
              </div>
            </li> -->
       <!--      <li class="nav-item dropdown">
              <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-toggle="dropdown">
                <i class="mdi mdi-bell"></i>
                <span class="count">4</span>
              </a>
              <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
                <a class="dropdown-item">
                  <p class="mb-0 font-weight-normal float-left">You have 4 new notifications
                  </p>
                  <span class="badge badge-pill badge-warning float-right">View all</span>
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <div class="preview-icon bg-success">
                      <i class="mdi mdi-alert-circle-outline mx-0"></i>
                    </div>
                  </div>
                  <div class="preview-item-content">
                    <h6 class="prev iew-subject font-weight-medium text-dark">Application Error</h6>
                    <p class="font-weight-light small-text">
                      Just now
                    </p>
                  </div>
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <div class="preview-icon bg-warning">
                      <i class="mdi mdi-comment-text-outline mx-0"></i>
                    </div>
                  </div>
                  <div class="preview-item-content">
                    <h6 class="preview-subject font-weight-medium text-dark">Settings</h6>
                    <p class="font-weight-light small-text">
                      Private message
                    </p>
                  </div>
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <div class="preview-icon bg-info">
                      <i class="mdi mdi-email-outline mx-0"></i>
                    </div>
                  </div>
                  <div class="preview-item-content">
                    <h6 class="preview-subject font-weight-medium text-dark">New user registration</h6>
                    <p class="font-weight-light small-text">
                      2 days ago
                    </p>
                  </div>
                </a>
              </div>
            </li> -->
            <li class="nav-item dropdown d-none d-xl-inline-block">
              <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                <span class="profile-text"> <?php echo $_SESSION['name']; ?> </span>
                <img class="img-xs rounded-circle" src="images/faces/face1.jpg" alt="Profile image">
              </a>
              <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
                <a class="dropdown-item p-0">
                  <div class="d-flex border-bottom">
                    <div class="py-3 px-4 d-flex align-items-center justify-content-center">
                      <i class="mdi mdi-bookmark-plus-outline mr-0 text-gray"></i>
                    </div>
                    <div class="py-3 px-4 d-flex align-items-center justify-content-center border-left border-right">
                      <i class="mdi mdi-account-outline mr-0 text-gray"></i>
                    </div>
                    <div class="py-3 px-4 d-flex align-items-center justify-content-center">
                      <i class="mdi mdi-alarm-check mr-0 text-gray"></i>
                    </div>
                  </div>
                </a>
                
                <a class="dropdown-item" href="../logout.php">
                  Sign Out
                </a>
              </div>
            </li>
          </ul>
          <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="mdi mdi-menu"></span>
          </button>
        </div>
      </nav>

      <script type="text/javascript">

        $(document).ready(function(){
          $('.myTable').DataTable();
          fetch_request();
          deleteData();
          approval_goal();
          // viewRequest();
          approveRequest();
          fetchAccount($('tbody#tbody'));
          BlockUnblock();

          //refrest table every 5sec.
          setInterval(function(){
            fetch_request();
          },5000); 

          function updateData(id, status){
            $.ajax({
              url:'libs/updateStatus.php',
              method:'POST',
              data:{
                'id':id,
                'status':status
              },
              dataType:'json',
              success:function(data){
                fetchAccount($('tbody#tbody'));
              }
            })
          }

          function BlockUnblock(){
            $(document).on('click', '.btn-change', function(e){
              e.preventDefault();
              var btnName = $(this).attr('value');
              var btn = $(this);
              var btnID = $(this).attr('id');

              if(btnName == 'BLOCK'){
                btn.val('UNBLOCK');

                updateData(btnID, 1);
                Swal.fire({
                  position: 'top-end',
                  type: 'success',
                  title: 'Account has been Block',
                  showConfirmButton: false,
                  timer: 1900
                })

              }
              else {
                btn.val('BLOCK');
                updateData(btnID, 0);
                Swal.fire({
                  position: 'top-end',
                  type: 'success',
                  title: 'Account has been Unblock',
                  showConfirmButton: false,
                  timer: 1900
                })
              }


            })

          }


          function fetchAccount(appendTo){
            $.ajax({
              url:'libs/fetchAccount.php',
              method:'POST',
              dataType:'text',
              success:function(data){
                console.log(data);
                appendTo.html(data);
              }

            })
          }

          function approveRequest(){

            $(document).on('click', '.status1', function(e){
              e.preventDefault();


              var id = $(this).attr('id');


              $(this).attr('id', 'btn');


              $.ajax({
               url: 'libs/approveRequest.php',
               method: 'POST',
               dataType: 'JSON',
               data: {
                'id':id
              },
              success:function(data){

                if(!data.error){
                  $('#confirmMsg').html(data.success);
                  Swal.fire({
                    position: 'top-end',
                    type: 'success',
                    title: 'Verified',
                    showConfirmButton: false,
                    timer: 1900
                  })
                  $('#btn').html('Verified').addClass('btn btn-success disabled');
                }
                else {
                  $('#successMessage').html(data.error);


                }
              }

            })
            })
          }

          function approval_goal(){

            $(document).on('click','.status', function(e){
              var id = $(this).attr('id');
              $(this).parent().parent().attr('id', 'remove');

              $.ajax({
                url:'libs/updateData.php',
                method: 'POST',
                data: {'id':id},
                dataType: 'json',
                success:function(data){

                  if(!data.error){
                    Swal.fire({
                      position: 'top-end',
                      type: 'success',
                      title: 'Verified',
                      showConfirmButton: false,
                      timer: 1900
                    })
                    $('#appMessage').html('<p class="alert alert-success">'+data.success+'</p>');

                    $('#remove').fadeOut(1000,function(){

                    });
                    fetch_request();
                  } 
                  else {
                    $('#appMessage').html('<p class="alert alert-danger">'+data.error+'</p>');
                    
                  }

                }

              });
            });


          }

          function fetch_request(){

            $.ajax({
              url: 'libs/fetchRequest.php',
              method: 'POST',
              dataType: 'json',
              success:function(data){
                if(!data.error){
                  $('tbody#fetch').html(data.f);
                }
                else {
                  $('tbody#fetch').html(data.error);
                }
              }
            });


          }

          function deleteData(){
           $(document).on('click', '.delete-btn', function(e){
            e.preventDefault();
            var id = $(this).attr('id');

            $(this).parent().parent().attr('id', 'delete-me');

            $.ajax({
              url:'libs/delete.php',
              method: 'POST',
              data: {'id':id},
              dataType: 'JSON',
              success:function(data){

                if(!data.error){

                  $('#delete-me').fadeOut(1000, function(){
                    $('#message').html(data.success);
                    $(this).remove();
                  });

                }
                else {

                  $('#message').html(data.error);

                }

              }
            });
          });
         }
       });
     </script>
