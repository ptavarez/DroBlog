<?php
  include "db.php";
  include "../functions.php";
  session_start();
?>

<?php
 if(isset($_POST['login'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];
  
  $username = mysqli_real_escape_string($connection, $username);
  $password = mysqli_real_escape_string($connection, $password);
  
  
  $query = "SELECT * FROM users WHERE username = '{$username}'";
  $fecthUser = mysqli_query($connection, $query);
  confirm($fecthUser);
 }
 
 while($row = mysqli_fetch_array($fecthUser)) {
   $user_id = $row['id'];
   $user_firstname = $row['firstname'];
   $user_lastname = $row['lastname'];
   $user_username = $row['username'];
   $user_password = $row['password'];
   $user_role = $row['role'];
 }
 echo $password.'<br>';
 echo $user_password.'<br>';
 
 if(password_verify($password,$user_password)) {
   echo 'Password verified';
   
   $_SESSION['id'] = $user_id;
   $_SESSION['username'] = $user_username;
   $_SESSION['firstname'] = $user_firstname;
   $_SESSION['lastname'] = $user_lastname;
   $_SESSION['role'] = $user_role;
   
   // header("Location: ../admin");
   
 } else {
   echo 'Login Failed';
   // header("Location: ../index.php");
 }
?>
