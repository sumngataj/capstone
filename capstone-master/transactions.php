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
                    <h1 class="h3 mb-4 text-gray-800">Transactions</h1>

                    <button type="button" class="btn btn-secondary my-3" data-toggle="#" data-target="#print"> 
                    <i class="fas fa-fw fa-print"></i>
                    PRINT
                    </button>

                    <!-- Table -->
                    <div class="table-responsive-sm">
                        <table class="table">
                            <thead class="thead-dark">
                                <tr>
                                <th scope="col">ID</th>
                                <th scope="col">First Name</th>
                                <th scope="col">Last Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Transaction</th>
                                <th scope="col">Transaction Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                
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