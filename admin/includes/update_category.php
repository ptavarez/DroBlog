<?php
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
    $cat_id = $row['id'];
    $cat_title = $row['title'];
  }
?>
<form class="" action="" method="post">
  <div class="form-group">
    <label for="title">
      Update Category ID:
      <?php if(isset($cat_id)) {echo $cat_id;}?>
    </label>
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
