<?php
  include "includes/header.php";
  
  if(isset($_SESSION['username'])) {
    $id = $_SESSION['id'];
    $username = $_SESSION['username'];
    $query = "SELECT * FROM users WHERE id = '{$id}'";
    $fetchUser = mysqli_query($connection, $query);
    
    while($row = mysqli_fetch_array($fetchUser)) {
      $user_id = $row['id'];
      $user_username = $row['username'];
      $user_password = $row['password'];
      $user_firstname = $row['firstname'];
      $user_lastname = $row['lastname'];
      $user_email = $row['email'];
      $user_image = $row['image'];
      $user_role = $row['role'];
      $user_randSalt = $row['randSalt'];
    }
  }
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
                            <small>Profile</small>
                        </h1>
                        <?php
                          
                          if(isset($_POST['update_user'])) {
                            $username = $_POST['username'];
                            $password = $_POST['password'];
                            $firstname = $_POST['firstname'];
                            $lastname = $_POST['lastname'];
                            $email = $_POST['email'];
                            $image = $_FILES['image']['name'];
                            $image_tmp = $_FILES['image']['tmp_name'];
                            $role = $_POST['role'];
                            
                            move_uploaded_file($image_tmp, "../images/$image");
                            
                            if(empty($image)) {
                              $query = "SELECT * FROM users WHERE id = $id";
                              $fetch = mysqli_query($connection, $query);
                              confirm($fetch);
                              
                              while($row = mysqli_fetch_array($fetch)) {
                                $image = $row['image'];
                              }
                            }
                            
                            $query = "UPDATE users SET
                                        username = '{$username}',
                                        password = '{$password}',
                                        firstname = '{$firstname}',
                                        lastname = '{$lastname}',
                                        email = '{$email}',
                                        image = '{$image}',
                                        role = '{$role}'
                                      WHERE id = $id";
                                      
                            $update_user = mysqli_query($connection,$query);
                            confirm($update_user);
                            header("Location: profile.php");
                          }
                        ?>

                        <form class="" action="" method="post" enctype="multipart/form-data">
                          <div class="form-group">
                            <label for="status">Role: </label>
                            <select class="" name="role">
                              <option value="<?php echo $user_role; ?>"><?php echo $user_role; ?></option>
                              <?php
                                if($user_role === 'admin') {
                                  echo "<option value='subscriber'>subscriber</option>";
                                } else {
                                  echo "<option value='admin'>admin</option>";
                                }
                              ?>
                            </select>
                          </div>
                          <div class="form-group">
                            <label for="title">Username</label>
                            <input class="form-control"
                                   type="text"
                                   name="username"
                                   value="<?php echo $user_username; ?>">
                          </div>
                          <div class="form-group">
                            <label for="author">Password</label>
                            <input class="form-control"
                                   type="password"
                                   name="password"
                                   value="<?php echo $user_password; ?>">
                          </div>
                          <div class="form-group">
                            <label for="tags">First Name</label>
                            <input class="form-control"
                                   type="text"
                                   name="firstname"
                                   value="<?php echo $user_firstname; ?>">
                          </div>
                          <div class="form-group">
                            <label for="tags">Last Name</label>
                            <input class="form-control"
                                   type="text"
                                   name="lastname"
                                   value="<?php echo $user_lastname; ?>">
                          </div>
                          <div class="form-group">
                            <label for="status">Email</label>
                            <input class="form-control"
                                   type="text"
                                   name="email"
                                   value="<?php echo $user_email; ?>">
                          </div>
                          <div class="form-group">
                            <img width="100" src="../images/<?php echo $user_image; ?>">
                            <label for="image">Image</label>
                            <input class="form-control"
                                   type="file"
                                   name="image"
                                   value="">
                          </div>
                          <div class="form-group">
                            <input class="btn btn-primary"
                                   type="submit"
                                   name="update_user"
                                   value="Submit">
                          </div>
                        </form>

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
