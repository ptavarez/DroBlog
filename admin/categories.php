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
                            <small>Categories</small>
                        </h1>
                        <div class="col-lg-6">
                          <?php
                            add_cat();
                          ?>
                          <form class="" action="" method="post">
                            <div class="form-group">
                              <label for="title">Create a Category</label>
                              <input class="form-control"
                                     type="text"
                                     name="title"
                                     value="">
                            </div>
                            <div class="form-group">
                              <input class="btn btn-primary"
                                     type="submit"
                                     name="submit"
                                     value="Submit">
                            </div>
                          </form>
                          <!-- /add category form-->
                        </div>
                        <div class="col-lg-6">
                          <table class="table table-bordered table-hover">
                            <thead>
                              <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Options</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php
                                fetch_cats();
                                del_cat();
                              ?>
                            </tbody>
                          </table>
                          <!-- /.table -->
                        </div>
                        
                      <div class="col-lg-6">
                        <?php
                          if(isset($_GET['update'])) {
                            include "includes/update_category.php";
                          }
                         ?>
                      </div>
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
