<?php
  function escape($string) {
    global $connection;
    return mysqli_real_escape_string($connection, trim($string));
  }
  
  function confirm($result) {
    global $connection;
    
    if(!$result) {
      die("Query Failed! ".mysqli_error($connection));
    }
  }
  
  function add_cat() {
    global $connection;
    
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
  }
  
  function fetch_cats() {
    global $connection;
    
    $query2 = "SELECT * FROM categories";
    $fetchCats = mysqli_query($connection, $query2);
    
    while($row = mysqli_fetch_assoc($fetchCats)) {
      $cat_id = $row['id'];
      $cat_title = $row['title'];
      echo "<tr>";
        echo "<td>{$cat_id}</td>";
        echo "<td>{$cat_title}</td>";
        echo "<td class='text-center'>
                <a class='btn btn-warning' href='categories.php?update={$cat_id}'></a>
              </td>";
        echo  "<td class='text-center'>
                <a onClick=\"javascript: return confirm('Are you sure you want to delete?') \" class='btn btn-danger' href='categories.php?delete={$cat_id}'></a>
              </td>";
      echo "</tr>";
    }
  }
  
  function del_cat() {
    global $connection;
    
    if(isset($_GET['delete'])) {
      $del_id = $_GET['delete'];
      $query3 = "DELETE FROM categories WHERE id = $del_id";
      $deleteCat = mysqli_query($connection, $query3);
      header("Location: categories.php");
    }
  }
  
  function online_users() {
    if(isset($_GET['onlineusers'])) {
      global $connection;
      if(!$connection) {
        session_start();
        include('../includes/db.php');
        
        $session = session_id();
        $time = time();
        $time_out_seconds = 60;
        $time_out = $time - $time_out_seconds;
        
        $select_online_user = "SELECT * FROM online_users WHERE session = '$session'";
        $send_select_online_user = mysqli_query($connection, $select_online_user);
        confirm($send_select_online_user);
        
        $count = mysqli_num_rows($send_select_online_user);
                
        if($count == null) {
          mysqli_query($connection, "INSERT INTO online_users(session, time) VALUES('$session', $time)");
        } else {
          mysqli_query($connection, "UPDATE online_users SET time = $time WHERE session = '$session'");
        }
        
        $send_select_online_users = mysqli_query($connection, "SELECT * FROM online_users WHERE time > $time_out");
        echo $count_online_users = mysqli_num_rows($send_select_online_users);
      }
    }
  }
  
  online_users();
?>
