<?php
  include "includes/db.php";
  include "includes/header.php";
  include "includes/navigation.php";
?>
    
<?php
  $username_input = "
  <div class='form-group'>
      <label for='username' class='sr-only'>Username</label>
      <input type='text' name='username' id='username' class='form-control' placeholder='Username'>
  </div>
  ";
  $email_input = "
  <div class='form-group'>
     <label for='email' class='sr-only'>Email</label>
     <input type='email' name='email' id='email' class='form-control' placeholder='Email'>
  </div>
  ";
  $password_input = "
  <div class='form-group'>
     <label for='password' class='sr-only'>Password</label>
     <input type='password' name='password' id='key' class='form-control' placeholder='Password'>
  </div>
  ";
  $confirm_input = "
  <div class='form-group'>
     <label for='confirm' class='sr-only'>Confirm Password</label>
     <input type='password' name='confirm' id='confirm' class='form-control' placeholder='Confirm Password'>
  </div>
  ";
  
  if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    $username = mysqli_real_escape_string($connection, $username);
    $email = mysqli_real_escape_string($connection, $email);
    $password = mysqli_real_escape_string($connection, $password);
    
    $password = password_hash($password, PASSWORD_BCRYPT, array('cost' => 12)).'<br>';
    
    include "includes/user_val_inputs.php";
    
  if($username && $email && $password) {
      $query = "INSERT INTO users(username, email, password, role)
                VALUES ('{$username}', '{$email}', '{$password}', 'subscriber')";
      $add_user = mysqli_query($connection, $query);
      confirm($add_user);
      
      header("Location: index.php");
    }
  }
?>
    
 
    <!-- Page Content -->
<div class="container">
    
  <section id="login">
      <div class="container">
          <div class="row">
              <div class="col-xs-6 col-xs-offset-3">
                  <div class="form-wrap">
                  <h1>Sign Up</h1>
                      <form role="form" action="registration.php" method="post" id="login-form" autocomplete="off">
                          <?php
                            echo $username_input;
                            echo $email_input;
                            echo $password_input;
                          ?>
                          <input type="submit" name="submit" id="btn-login" class="btn btn-primary btn-lg btn-block" value="Submit">
                      </form>
                   
                  </div>
              </div> <!-- /.col-xs-12 -->
          </div> <!-- /.row -->
      </div> <!-- /.container -->
  </section>
  <hr>
<?php include "includes/footer.php";?>
