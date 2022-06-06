<?php 


?>
<style>
  /*internal css for navbar*/
  body {
    height: 100%;
    background: #ecf0f1;
  }
  .navbar {
    background: #f39c12;
  }
  .navbar-brand {
    font-weight: bold;
    font-size: 20px;
  }
  .collapse > ul > li > .logout:hover {
    background: #e67e22;
  }
  ul > li > a {
    font-size: 15px;
    /*font-weight: bold;*/
  }
  .logout {
    font-size: 16px;
    font-weight: 500;
  }
  .collapse > ul > li {
    display: inline-block;
  }
  .message {
    font-weight: 500;
    padding-top: 5px;
  }
  
</style>

<nav class="navbar navbar-expand-lg navbar-light bg-default">
  <div class="container">


    <a class="navbar-brand text-white" href="in_user.php">F-Resort</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ml-auto">

        <li class="nav-item dropdown active">
          <a class="nav-link text-white notifier" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Message <span class="badge badge-danger badge-pill"><?php echo count($count); ?></span>
          </a>
          <div class="dropdown-menu notification" aria-labelledby="navbarDropdown">
            <?php if(count($count) > 0): ?>
              <?php foreach($count as $row): ?>
                <a href="message.php?receiver_id=<?php echo $row->receiver_id; ?>" class="dropdown-item">
                  <small><?php echo date('F d,Y',strtotime($row->time)); ?></small><br>
                  <b style="font-size: 15px;"><?php echo $row->name; ?></b><br>
                  <small><i class="text-muted">Send message to you</i></small><hr>
                </a>
              <?php endforeach; ?>
            <?php endif; ?>
          </div>
        </li>
      
        <li class="nav-item active">
          <a class="nav-link text-white" href="manage_resort.php?id=<?php echo $data[0]->account_id; ?>">Manage Resort</a>
        </li>
        <li class="nav-item active">
          <a class="nav-link text-white" href="add_image.php?id=<?php echo $data[0]->user_id; ?>">Promote Resort</a>
        </li>
          <li class="nav-item active">
          <a class="nav-link text-white" href="reservation.php?id=<?php echo $data[0]->user_id; ?>">Reservation<span class="badge badge-danger badge-pill"><?php echo count($reservation); ?></span></a>
        </li>


        <li class="nav-item dropdown active">
          <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <?php echo $_SESSION['email']; ?>
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="../logout.php">Sign out</a>
          </div>
        </li>
      </ul>
    </div>
  </div>
</nav>
<script type="text/javascript">
  $(document).ready(function(){

    managePostDelete();
    updateResort();
    sendReservation();
    deleteReservation();
    approveReservation();
    $(document).on('click', '.notifier', function(){
      $('.badge').html(0);
    });

    function sendReservation(){
      $(document).on('submit', 'form#formReservation', function(e){
        e.preventDefault();
        $.ajax({
          url:'libs/sendReserve.php',
          method:'POST',
          data:$(this).serialize(),
          dataType:'json',
          success:function(data){

            if(!data.error){
              $('#sendMessage').html('<p class="alert alert-success">Reservation has been Send.</p>');
              Swal.fire({
                position: 'top-end',
                type: 'success',
                title: data.success,
                showConfirmButton: false,
                timer: 1900
              })
            }
            else {
              $('#sendMessage').html('<p class="alert alert-danger">'+data.error+'</p>');

              Swal.fire({
                position: 'top-end',
                type: 'error',
                title: data.error,
                showConfirmButton: false,
                timer: 1900
              })
            }
          }
        })
      })
    }

    function updateResort(){
      $(document).on('submit', 'form#update-btn', function(e){
        e.preventDefault();
        $.ajax({
          url:'libs/update.php',
          method: 'POST',
          dataType: 'json',
          data:$(this).serialize(),
          success:function(data){
            if(!data.error){
            // loader('show');

            Swal.fire({
              position: 'top-end',
              type: 'success',
              title: data.success,
              showConfirmButton: false,
              timer: 1500
            })

          }
          else {
           Swal.fire({
            position: 'top-end',
            type: 'error',
            title: data.error,
            showConfirmButton: false,
            timer: 1500
          })

         }
       }
     })
        
      })
    }

    function managePostDelete(){

      $(document).on('click', '.delete-btn', function(e){
        e.preventDefault();
        var id = $(this).attr('id');
        $(this).parent().parent().attr('id', 'delete-me');

        $.ajax({
          url: 'libs/delete.php',
          method: 'POST',
          dataType: 'json',
          data:{
            'id':id
          },
          success:function(data){

            if(!data.error){
              $('#err').html(data.succcess);
              
              $('#delete-me').fadeOut(1000,function(){
                $(this).remove();
              })


            } 
            else {
              $('#err').html(data.error);
            }
          }
        })
      })
    }

    function deleteReservation(){

      $(document).on('click', '.btn-delete', function(e){
        e.preventDefault();
        var id = $(this).attr('id');
        $(this).parent().parent().attr('id', 'remove');

        $.ajax({
          url:'libs/deleteReserve.php',
          method:'POST',
          data:{'id':id},
          dataType:'json',
          success:function(data){
            if(!data.error){
              $(`#remove`).fadeOut(1000,function(){
                $(this).remove();
              })
            }
            else{
              alert(data.error);
            }
          }
        })

      })
    }

    function approveReservation(){

      $(document).on('click', '.btn-approve', function(e){
        e.preventDefault();
        var id = $(this).attr('id');
        $(this).attr('id', 'd');
        $.ajax({
          url:'libs/updateReservation.php',
          method:'POST',
          data:{'id':id},
          dataType:'json',
          success:function(data){
            if(!data.error){
              alert(data.success);
              $('#d').fadeOut(function(){
                $(this).remove();
              })


            }
            else {
              alert(data.error);

            }
          }
        })
      })

    }

  });
</script>
<!-- <script type="text/javascript">

  $(document).ready(function(){

    function load_all_unseen_message(view = ''){
      $.ajax({
        url:'libs/fetch.php',
        method: 'POST',
        data:{'view':view,'id':id},
        dataType:'json',
        success:function(data){

          $('.notification').html(data.notification_message);

          if(data.notification_count > 0){

            $('.badge').html(data.notification_count);

          }
        }
      });
    }
    load_all_unseen_message();
    setInterval(function(){
      load_all_unseen_message();
    },5000);
  });
</script> -->