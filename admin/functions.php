<?php
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
        echo "<td>
                <a class='btn btn-warning' href='categories.php?update={$cat_id}'>Update</a>
                | |
                <a class='btn btn-danger' href='categories.php?delete={$cat_id}'>Delete</a>
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
?>
