<?php
  include "includes/header.php";
?>
    <div id="wrapper">
        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
          <?php include "includes/navbar.php";?>
          <?php include "includes/sidebar.php";?>
        </nav>
        <div id="page-wrapper">
            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Admin
                            <small>Users</small>
                        </h1>
                        
                        <?php
                          if(isset($_GET['source'])) {
                            $source = $_GET['source'];
                          } else {
                            $source = '';
                          }
                          switch($source) {
                            case 'add_user';
                              include "includes/add_user.php";
                            break;
                            case 'update_user';
                              include "includes/update_user.php";
                            break;
                            default:
                            include "includes/fetch_users.php";
                          }
                        ?>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
<?php include "includes/footer.php";?>
