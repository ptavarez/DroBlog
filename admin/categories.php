<?php include "includes/header.php";?>
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
                            if(isset($_POST['submit'])) {
                              $cat_title = $_POST['title'];
                              
                              if($cat_title == '' || empty($cat_title)){
                                echo "A Title Is Required...";
                              } else {
                                $query1 = "INSERT INTO `categories` (`title`)
                                           VALUES ('$cat_title')";
                                $addCat = mysqli_query($connection, $query1);
                                
                                if(!$addCat) {
                                  die('QUERY FAILED' . mysqli_error($connection));
                                }
                              }
                            }
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
                          <?php
                            $query2 = "SELECT * FROM categories";
                            $fetchCats = mysqli_query($connection, $query2);
                            
                            if(isset($_GET['delete'])) {
                              $del_id = $_GET['delete'];
                              $query3 = "DELETE FROM categories WHERE id = $del_id";
                              $deleteCat = mysqli_query($connection, $query3);
                              header("Location: categories.php");
                            }
                          ?>
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
                                  while($row = mysqli_fetch_assoc($fetchCats)) {
                                    $cat_id = $row['id'];
                                    $cat_title = $row['title'];
                                    echo "<tr>";
                                      echo "<td>{$cat_id}</td>";
                                      echo "<td>{$cat_title}</td>";
                                      echo "<td>
                                              <a class='btn btn-warning' href='categories.php?update={$cat_id}'>Update</a>
                                              | |
                                              <a class='btn btn-danger' href='categories.php?delete={$cat_id}'>Delete</a>
                                            </td>";
                                    echo "</tr>";
                                  }
                                ?>
                            </tbody>
                          </table>
                          <!-- /.table -->
                        </div>
                        
                      <div class="col-lg-6">
                        <?php
                        if(isset($_GET['update'])) {
                          $cat_id = $_GET['update'];
                          $query4 = "SELECT * FROM categories WHERE id = $cat_id";
                          $fetchCat = mysqli_query($connection, $query4);
                          
                          if(isset($_POST['update'])) {
                            $cat_title = $_POST['title'];
                            
                            if($cat_title == '' || empty($cat_title)){
                              echo "A Title Is Required...";
                            } else {
                              $query5 = "UPDATE categories
                                         SET title = '$cat_title'
                                         WHERE id = $cat_id";
                                         
                              $updateCat = mysqli_query($connection, $query5);
                              
                              if(!$updateCat) {
                                die('QUERY FAILED' . mysqli_error($connection));
                              }
                            }
                          }
                          
                          while($row = mysqli_fetch_assoc($fetchCat)) {
                            $cat_title = $row['title'];
                          }
                        ?>
                        <form class="" action="" method="post">
                          <div class="form-group">
                            <label for="title">Update Category</label>
                            <input class="form-control"
                                   type="text"
                                   name="title"
                                   value="<?php if(isset($cat_title)) {echo $cat_title;}?>">
                          </div>
                          <div class="form-group">
                            <input class="btn btn-primary"
                                   type="submit"
                                   name="update"
                                   value="Submit">
                          </div>
                        </form>
                      <?php } ?>
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
