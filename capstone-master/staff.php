<?php 
include('includes/header.php');
include('includes/navbar.php');
?>

<?php 
  include('config.php');

    if(isset($_POST['add_staff_button']))
    {

      $uservarusername = $_POST['user_username'];
      $uservarpassword = $_POST['user_password'];
      $uservaremail = $_POST['user_email'];
      $uservarcontactno = $_POST['user_contactno'];

      $sql_add = "Insert into users(user_id, user_username, user_password, user_email, user_contactno)values('','$uservarusername','$uservarpassword','$uservaremail','$uservarcontactno')";
      mysqli_query($link, $sql_add);

      $message = "Successfully Added!";
      echo "<script type='text/javascript'>alert('$message');
      window.location.assign('staff.php')</script>";
    
    }

    if(isset($_POST['update_student_button']))
    {
        $up_username = $_POST['update_username'];
        $up_password = $_POST['update_password'];
        $up_email = $_POST['update_email'];
        $up_contactno = $_POST['update_contactno'];

        $sql_staff_update = "Insert users set user_username = '$up_username', user_password = '$up_password', user_email = '$up_email', user_contactno = '$up_contactno'";
        mysqli_query($link,$sql_staff_update)or die(mysqli_error());

        $message = "Updated Successfully";
      echo "<script type='text/javascript'>alert('$message');
      window.location.assign('staff.php')</script>";

    }
      


?>

       
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

            <?php include 'includes/topbar.php';?>
                
<!-- Modal -->

<!------------Add New Staff Modal----------------->
<form method="post">
  <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="addModalLabel">Add New Staff</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group">
              <label for="username">Username</label>
              <input type="text" class="form-control" id="username" autocomplete="off" placeholder="Enter Username" name="user_username">
          </div>
          <div class="form-group">
              <label for="password">Password</label>
              <input type="password" class="form-control" id="password" autocomplete="off" placeholder="Enter Password" name="user_password">
          </div>
          <div class="form-group">
              <label for="mail">Email Address</label>
              <input type="email" class="form-control" id="mail" autocomplete="off" placeholder="Enter Email" name="user_email">
          </div>
          <div class="form-group">
              <label for="contact">Contact Number</label>
              <input type="text" class="form-control" id="contact" autocomplete="off" placeholder="Enter Contact Number" name="user_contactno">
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-dark" name="add_staff_button">Submit</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div> 
      </div>
    </div>
  </div>
</form>
<!------------------------------------------------>


<!------------Update Staff Modal----------------->
<form method ="POST">
  <div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="updateModalLabel">Add New Staff</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group">
              <label for="username">Update Username</label>
              <input type="text" class="form-control" id="id_username" autocomplete="off" placeholder="Enter Username" name="update_username">
          </div>
          <div class="form-group">
              <label for="password">Update Password</label>
              <input type="password" class="form-control" id="id_password" autocomplete="off" placeholder="Enter Password" name="update_password">
          </div>
          <div class="form-group">
              <label for="mail">Update Email Address</label>
              <input type="email" class="form-control" id="id_email" autocomplete="off" placeholder="Enter Email" name="update_email">
          </div>
          <div class="form-group">
              <label for="contact">Update Contact Number</label>
              <input type="text" class="form-control" id="id_contactno" autocomplete="off" placeholder="Enter Contact Number" name="update_contactno">
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-dark editbtn" name="update_student_button">Submit</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div> 
      </div>
    </div>
  </div>
</form>
                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">Staff</h1>


                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-dark my-3" data-toggle="modal" data-target="#addModal">
                    Add New Staff
                    </button>
                    <!-- Table -->
                    <div class="table-responsive-sm">
                        <table class="table">
                            <thead class="thead-dark">
                                <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Username</th>
                                <th scope="col">Password</th>
                                <th scope="col">Email</th>
                                <th scope="col">Contact Number</th>
                                <th scope="col">Operations</th>
                                </tr>
                            </thead>
                            <tbody>
                           <?php
                              include('config.php');
                              $sql_staff_table = mysqli_query($link,"Select * from users where user_email !='admin@admin.com'");
                              
                              for($a = 0; $a < $num_rows = mysqli_fetch_array($sql_staff_table); $a++)
                              {
                                  $u_user_id = $num_rows['user_id'];
                                  $u_username = $num_rows['user_username'];
                                  $u_password = $num_rows['user_password'];
                                  $u_email = $num_rows['user_email'];
                                  $u_contactno = $num_rows['user_contactno'];
                              

                          ?>
                                <tr>
                                
                                    <td><?=$u_user_id;?></td>
                                    <td><?=$u_username;?></td>
                                    <td><?=$u_password;?></td>
                                    <td><?=$u_email;?></td>
                                    <td><?=$u_contactno;?></td>
                                    <td>
                                        <button type="button" class="btn btn-info editBtn" data-toggle="modal" data-target="#updateModal"><i class="bi bi-pencil-square"></i></button>
                                    </td>
                                </tr>

                          <?php } ?>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>


                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

<?php 
include('includes/scripts.php');
include('includes/footer.php');
?>


<script>

  $(document).ready(function() {
    $('.editBtn').on('click', function () {

      $tr = $(this).closest('tr');
      var data = $tr.children("td").map(function () {
        return $(this).text();
      }).get();
      
      console.log(data);
      $('#id_username').val(data[1]);
      $('#id_password').val(data[2]);
      $('#id_email').val(data[3]);
      $('#id_contactno').val(data[4]);
    });
  });

</script>