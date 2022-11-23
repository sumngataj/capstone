<?php 
include('includes/header.php');
include('includes/navbar.php');
?>

       
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

            <?php include 'includes/topbar.php';?>

            <!-- Compose Modal -->
<div class="modal fade" id="composeModal" tabindex="-1" role="dialog" aria-labelledby="composeModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="composeModalLabel">New Message</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
            <label for="receiver">To</label>
            <input type="text" class="form-control" id="receiver" autocomplete="off" placeholder="Recepients">
        </div>
        <div class="form-group">
            <input type="text" class="form-control" id="subject" autocomplete="off" placeholder="Subject">
        </div>
        <div class="form-group">
            <textarea type="text" class="form-control" id="content" autocomplete="off" placeholder="Content"></textarea>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-dark">Send</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div> 
    </div>
  </div>
</div>
                
                <!-- Reply Modal -->
<div class="modal fade" id="replyModal" tabindex="-1" role="dialog" aria-labelledby="replyModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="replyModalLabel">New Message</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
            <label for="receiver">To</label>
            <input type="text" class="form-control" id="receiver" autocomplete="off" placeholder="Recepients">
        </div>
        <div class="form-group">
            <input type="text" class="form-control" id="subject" autocomplete="off" placeholder="Subject">
        </div>
        <div class="form-group">
            <textarea type="text" class="form-control" id="content" autocomplete="off" placeholder="Content"></textarea>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-dark">Send</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div> 
    </div>
  </div>
</div>



                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">Messages</h1>
                    <hr class="sidebar-divider my-0">

                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-dark my-3" data-toggle="modal" data-target="#composeModal">
                    <i class="fas fa-fw fa-pen"></i>
                    <span>Compose</span>
                    </button>

                    <div class="col-lg-4">
                            <!-- Dropdown Card-->
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h5 class="m-0 font-weight-bold text-primary">Title</h5>
                                    <div class="dropdown no-arrow">
                                        <a class="dropdown-toggle" href="#" role="button" id="settings"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-600"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                            aria-labelledby="settings">
                                            <div class="dropdown-header">Dropdown Header:</div>
                                            <a class="dropdown-item" data-toggle="modal" data-target="#replyModal">Reply</a>
                                            <a class="dropdown-item" href="#">Archive</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#">Delete</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                <h6>LOREM IPSUM</h6>
                                <p>Lorem ipsum dolor sit amet. Sit eaque necessitatibus sit doloremque adipisci a ipsam omnis eos consequatur dignissimos 33 reprehenderit fugit. Sed beatae voluptas aut excepturi voluptatum eum dignissimos consequuntur aut inventore sint et assumenda consequatur est voluptatem deserunt ut praesentium pariatur.</p>
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