<?php
  include "db.php";
  include "../functions.php";
?>

<?php
 if(isset($_POST['login'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];
  
  $username = mysqli_real_escape_string($connection, $username);
  $password = mysqli_real_escape_string($connection, $password);
  
  $query = "SELECT * FROM users WHERE username = '{$username}' AND password = '{$password}'";
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
 
 if($username !== $user_username && $password !== $user_password) {
   header("Location: ../index.php");
 } else if($username === $user_username && $password === $user_password) {
   header("Location: ../admin");
 } else {
   header("Location: ../index.php");
 }
?>
