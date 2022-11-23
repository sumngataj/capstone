<?php 
include('includes/header.php');
include('includes/navbar.php');
?>
 <?php 
 include('config.php');
  $now = date('Y-m-d H:i:s');
if(isset($_POST['add_news']))
{

  $news_title = $_POST['title'];
  $news_content = $_POST['content'];

  $sql_add = "Insert into news(news_id, news_date, news_title, news_details)values('', '$now' ,'$news_title','$news_content')";
  mysqli_query($link, $sql_add);

  $message = "Successfully Added!";
  echo "<script type='text/javascript'>alert('$message');
  window.location.assign('news.php')</script>";

}


// update news
if(isset($_POST['update_news_button']))
    {
        $up_title = $_POST['update_title'];
        $up_content = $_POST['update_content'];

        $sql_news_update = "Insert news set news_title = '$up_title', news_content = '$up_content'";
        mysqli_query($link,$sql_news_update)or die(mysqli_error());

        $message = "Updated Successfully";
      echo "<script type='text/javascript'>alert('$message');
      window.location.assign('news.php')</script>";

    }
?>
       
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

            <?php include 'includes/topbar.php';?>
                
                <!-- Add Modal -->
<form method="post">
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addModalLabel">Add News</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" class="form-control" id="title" autocomplete="off" placeholder="Enter Title">
        </div>
        <div class="form-group">
            <label for="content">Content</label>
            <textarea type="text" name="content" class="form-control" id="content" autocomplete="off" placeholder="Enter Content"></textarea>
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" name="add_news" class="btn btn-dark">Submit</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div> 
    </div>
  </div>
</div>
</form>

               <!-- Edit Modal -->

<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">

  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editModalLabel">Edit News</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">


        <div class="form-group">
            <label for="title">Edit Title</label>
            <input type="text" class="form-control" id="title" autocomplete="off" name="update_title" placeholder="Enter Title">
        </div>
        <div class="form-group">
            <label for="content">Edit Content</label>
            <textarea type="text" class="form-control" id="content" autocomplete="off" name="update_content" placeholder="Enter Content"></textarea>
        </div>
      </div>
      <div class="modal-footer">

        <button type="button" class="btn btn-dark" name="update_news_button">Submit</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div> 
    </div>
  </div>
</div>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">News</h1>

                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-dark my-3" data-toggle="modal" data-target="#addModal">
                    Add New Post
                    </button>

                    <div class="col-lg-4">
                    <?php
                      include('config.php');
                              $sql_staff_table = mysqli_query($link,"Select * from news");
                              
                              for($a = 0; $a < $num_rows = mysqli_fetch_array($sql_staff_table); $a++)
                              {
                                $news_id = $num_rows['news_id'];
                                $news_date = $num_rows['news_date'];
                                $news_title = $num_rows['news_title'];
                                $news_content = $num_rows['news_details'];
                          ?>

                          
                            <!-- Dropdown Card-->
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                          
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h5 class="m-0 font-weight-bold text-primary"><?php echo $news_title ?> <span>(<?php echo $news_date ?>)</span> </h5>                            
                                    <div class="dropdown no-arrow">
                                        <a class="dropdown-toggle" href="#" role="button" id="settings"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-600"></i>
                                        </a>
                                       
                                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                            aria-labelledby="settings">
                                            <div class="dropdown-header">Dropdown Header:</div>
                                            <a class="dropdown-item" data-toggle="modal" data-target="#editModal">Update</a>
                                            <a class="dropdown-item" href="#">Archive</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#">Delete</a>
                                        </div>
                                    </div>
                                    <br>
                               
                                 
                        
                                </div>
                              
                            
                                <!-- Card Body -->
                                <div class="card-body">
                                <?php echo $news_content ?>
                                </div>
                            </div>
                            <?php } ?>
                      </div>
                

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

<?php 
include('includes/scripts.php');
include('includes/footer.php');
?>



