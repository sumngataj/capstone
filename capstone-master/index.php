<?php 
include('includes/header.php');
include('includes/navbar.php');


?>

       
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

            <?php include 'includes/topbar.php';?>
            
                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">Reservations</h1>

<nav>
    <div class="nav nav-tabs" id="nav-tab" role="tablist">
        <a class="nav-item nav-link active" id="nav-pending-tab" data-toggle="tab" href="#nav-pending" role="tab" aria-controls="nav-pending" aria-selected="true">Pending</a>
        <a class="nav-item nav-link" id="nav-approve-tab" data-toggle="tab" href="#nav-approve" role="tab" aria-controls="nav-approve" aria-selected="false">Approve</a>
        <a class="nav-item nav-link" id="nav-disapprove-tab" data-toggle="tab" href="#nav-disapprove" role="tab" aria-controls="nav-disapprove" aria-selected="false">Disapprove</a>
    </div>
</nav>
<div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="updateModalLabel">DOCUMENT REQUIREMENTS</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      
        <div class="modal-body">
        <form method="get">
          <div class="form-group">
              <input hidden="hidden" type="text" name="id" class="form-control" id="id_username" autocomplete="off" placeholder="Enter Username" />
          </div>
          <?php
            
            include('config.php');
       
         
            $sql_staff_table = mysqli_query($link,"Select * from appointment where user_appointment_id = '22'");
                
         
            for($a = 0; $a < $num_rows = mysqli_fetch_array($sql_staff_table); $a++)
            {
                $app_user_appointment_id = $num_rows['user_appointment_id'];
                $app_tracking_code = $num_rows['user_tracking_code'];
                $app_user_name = $num_rows['name'];
                $app_email = $num_rows['user_email'];
                $app_docu_type = $num_rows['user_docu_type'];
                $app_date = $num_rows['user_date'];
                $app_time = $num_rows['user_time'];
                $app_proof = $num_rows['user_proof_img'];
                $app_purpose = $num_rows['user_purpose'];
                $app_status = $num_rows['user_approval_status'];
      

            ?>
          
           <img width="400px;" height="340px;" src="barangaymanga/uploads/<?= $app_proof?>"/>
         
           <?php }  ?>
    
           </form>
        </div>
     
       
          <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div> 
    </div>
</div>
</div>
<div class="tab-content" id="nav-tabContent">
    <div class="tab-pane fade show active" id="nav-pending" role="tabpanel" aria-labelledby="nav-pending-tab">
        
        <div class="table-responsive-sm">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Appointment ID</th>
                        <th scope="col">Tracking Code</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Type</th>
                        <th scope="col">Date</th>
                        <th scope="col">Time</th>
                        <th hidden="hidden" scope="col">Image</th>
                        <th scope="col">Requirement</th>
                        <th scope="col">Purpose</th>
                        <th scope="col">Operations</th>
       
                    </tr>
                </thead>
                <tbody>
                <?php
                              include('config.php');
                              $sql_staff_table = mysqli_query($link,"Select * from appointment where user_approval_status ='pending'");
                              
                              for($a = 0; $a < $num_rows = mysqli_fetch_array($sql_staff_table); $a++)
                              {
                                  $app_user_appointment_id = $num_rows['user_appointment_id'];
                                  $app_tracking_code = $num_rows['user_tracking_code'];
                                  $app_user_name = $num_rows['name'];
                                  $app_email = $num_rows['user_email'];
                                  $app_docu_type = $num_rows['user_docu_type'];
                                  $app_date = $num_rows['user_date'];
                                  $app_time = $num_rows['user_time'];
                                  $app_proof = $num_rows['user_proof_img'];
                                  $app_purpose = $num_rows['user_purpose'];
                                  $app_status = $num_rows['user_approval_status'];
                              

                          ?>
                        
                    <tr>
                  
                            <td><?=$app_user_appointment_id;?></td>
                            <td><?=$app_tracking_code;?></td>
                            <td><?=$app_user_name;?></td>
                            <td><?=$app_email;?></td>
                            <td><?=$app_docu_type;?></td>
                            <td><?=$app_date;?></td>
                            <td><?=$app_time;?></td>
                            <td>     <img width="150px;" height="150px;" src="barangaymanga/uploads/<?= $app_proof?>"/> </td>
                            
                            <td><?=$app_purpose;?></td>
                           

                      
                            <td>
                                <button type="submit" class="btn btn-info"><a style="color:white; text-decoration:none;" href="update_status.php?updateid=<?php echo $app_user_appointment_id?>"><i class="bi bi-check-circle-fill"></i></a></button>
                                <button class="btn btn-danger"><a style="color:white; text-decoration:none;" href="disapprove_status.php?updateid=<?php echo $app_user_appointment_id?>"><i class="bi bi-x-circle-fill"></i></a></button>
                            </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>

    </div>

    <div class="tab-pane fade" id="nav-approve" role="tabpanel" aria-labelledby="nav-approve-tab">
        
        <div class="table-responsive-sm">
            <table class="table table-responsive">
                <thead class="thead-dark">
                    <tr>
                    <th scope="col">Appointment ID</th>
                        <th scope="col">Tracking Code</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Type</th>
                        <th scope="col">Date</th>
                        <th scope="col">Time</th>
                        <th scope="col">Requirement</th>
                        <th scope="col">Purpose</th>
                        <th scope="col">Status</th>
                        
                    </tr>
                        </thead>
                        <tbody>
                        <?php
                              include('config.php');
                              $sql_staff_table = mysqli_query($link,"Select * from appointment where user_approval_status ='approved'");
                              
                              for($a = 0; $a < $num_rows = mysqli_fetch_array($sql_staff_table); $a++)
                              {
                                  $a_user_appointment_id = $num_rows['user_appointment_id'];
                                  $a_tracking_code = $num_rows['user_tracking_code'];
                                  $a_user_name = $num_rows['name'];
                                  $a_email = $num_rows['user_email'];
                                  $a_docu_type = $num_rows['user_docu_type'];
                                  $a_date = $num_rows['user_date'];
                                  $a_time = $num_rows['user_time'];
                                  $a_proof = $num_rows['user_proof_img'];
                                  $a_purpose = $num_rows['user_purpose'];
                                  $a_status = $num_rows['user_approval_status'];
                              

                          ?>
                            <tr>
                            
                            <td><?=$a_user_appointment_id;?></td>
                            <td><?=$a_tracking_code;?></td>
                            <td><?=$a_user_name;?></td>
                            <td><?=$a_email;?></td>
                            <td><?=$a_docu_type;?></td>
                            <td><?=$a_date;?></td>
                            <td><?=$a_time;?></td>
                            <td><?=$a_proof;?></td>
                            <td><?=$a_purpose;?></td>
                            <td style="color:lightgreen;"><?=$a_status;?></td>
                                </tr>
                             <?php } ?>
                        </tbody>
            </table>
        </div>

    </div>

    <div class="tab-pane fade" id="nav-disapprove" role="tabpanel" aria-labelledby="nav-disapprove-tab">

        <div class="table-responsive-sm">
            <table class="table table-responsive">
                <thead class="thead-dark">
                    <tr>
                    <th scope="col">Appointment ID</th>
                        <th scope="col">Tracking Code</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Type</th>
                        <th scope="col">Date</th>
                        <th scope="col">Time</th>
                        <th scope="col">Requirement</th>
                        <th scope="col">Purpose</th>
                        <th scope="col">Status</th>
                      
                    </tr>
                        </thead>
                        <tbody>
                        <?php
                              include('config.php');
                              $sql_staff_table = mysqli_query($link,"Select * from appointment where user_approval_status ='disapproved'");
                              
                              for($a = 0; $a < $num_rows = mysqli_fetch_array($sql_staff_table); $a++)
                              {
                                  $d_user_appointment_id = $num_rows['user_appointment_id'];
                                  $d_tracking_code = $num_rows['user_tracking_code'];
                                  $d_user_name = $num_rows['name'];
                                  $d_email = $num_rows['user_email'];
                                  $d_docu_type = $num_rows['user_docu_type'];
                                  $d_date = $num_rows['user_date'];
                                  $d_time = $num_rows['user_time'];
                                  $d_proof = $num_rows['user_proof_img'];
                                  $d_purpose = $num_rows['user_purpose'];
                                  $d_status = $num_rows['user_approval_status'];
                              

                          ?>
                            <tr>
                            <td><?=$d_user_appointment_id;?></td>
                            <td><?=$d_tracking_code;?></td>
                            <td><?=$d_user_name;?></td>
                            <td><?=$d_email;?></td>
                            <td><?=$d_docu_type;?></td>
                            <td><?=$d_date;?></td>
                            <td><?=$d_time;?></td>
                            <td><?=$d_proof;?></td>
                            <td><?=$d_purpose;?></td>
                            <td style="color:red;"><?=$d_status;?></td>
                               
                                </tr>
                            <?php  }?>
                        </tbody>
            </table>
        </div>

    </div>
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
    $('#id_username').val(data[0]);

  });
});

</script>