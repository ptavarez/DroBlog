<?php
  if(isset($_GET['p_id'])) {
    $id =  $_GET['p_id'];
    
    $query = "SELECT * FROM posts WHERE id=$id";
    $fetchPost = mysqli_query($connection, $query);

    while($row = mysqli_fetch_assoc($fetchPost)) {
      $post_id = $row['id'];
      $post_cat_id = $row['category_id'];
      $post_title = $row['title'];
      $post_author = $row['author'];
      $post_date = $row['date'];
      $post_image = $row['image'];
      $post_content = $row['content'];
      $post_tags = $row['tags'];
      $post_comments = $row['comment_count'];
      $post_status = $row['status'];
    }
  }
  
  if(isset($_POST['update_post'])) {
    $cat_id = $_POST['category_id'];
    $title = $_POST['title'];
    $author = $_POST['author'];
    $image = $_FILES['image']['name'];
    $image_tmp = $_FILES['image']['tmp_name'];
    $tags = $_POST['tags'];
    $status = $_POST['status'];
    $content = $_POST['content'];
    
    move_uploaded_file($image_tmp, "../images/$image");
    
    if(empty($image)) {
      $query = "SELECT * FROM posts WHERE id = $id";
      $fetch = mysqli_query($connection, $query);
      
      while($row = mysqli_fetch_array($fetch)) {
        $image = $row['image'];
      }
    }
    
    $query = "UPDATE posts SET
                category_id = {$cat_id},
                title = '{$title}',
                author = '{$author}',
                image = '{$image}',
                tags = '{$tags}',
                status = '{$status}',
                content = '{$content}'
              WHERE id = $id";
              
    $update_post = mysqli_query($connection,$query);
    
    confirm($update_post);
    
    header("Location: posts.php");
  }
?>

<form class="" action="" method="post" enctype="multipart/form-data">
  <div class="form-group">
    <label for="category_id">Category: </label>
    <select name="category_id">
      <?php
        $query = "SELECT * FROM categories";
        $fetchCat = mysqli_query($connection, $query);
        
        confirm($fetchCat);
        
        while($row = mysqli_fetch_assoc($fetchCat)) {
          $cat_id = $row['id'];
          $cat_title = $row['title'];
          
          echo "<option value='{$cat_id}'>{$cat_title}</option>";
        }
      ?>
    </select>
  </div>
  <div class="form-group">
    <label for="category_id">Status: </label>
    <select class="" name="status">
      <option value="<?php echo $post_status; ?>"><?php echo $post_status; ?></option>
      <?php
        if($post_status === 'draft') {
          echo "<option value='published'>published</option>";
        } else {
          echo "<option value='draft'>draft</option>";
        }
      ?>
    </select>
  </div>
  <div class="form-group">
    <label for="title">Title</label>
    <input class="form-control"
           type="text"
           name="title"
           value="<?php echo $post_title; ?>">
  </div>
  <div class="form-group">
    <label for="author">Author</label>
    <input class="form-control"
           type="text"
           name="author"
           value="<?php echo $post_author; ?>">
  </div>
  <div class="form-group">
    <img width="100" src="../images/<?php echo $post_image; ?>">
    <label for="image">Image</label>
    <input class="form-control"
           type="file"
           name="image"
           value="">
  </div>
  <div class="form-group">
    <label for="tags">Tags</label>
    <input class="form-control"
           type="text"
           name="tags"
           value="<?php echo $post_tags; ?>">
  </div>
  <div class="form-group">
    <label for="content">Content</label>
    <textarea id="body"
              class="form-control"
              name="content"
              cols="30"
              rows="10"><?php echo $post_content; ?></textarea>
  </div>
  <div class="form-group">
    <input class="btn btn-primary"
           type="submit"
           name="update_post"
           value="Submit">
  </div>
</form>
