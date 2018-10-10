<?php
  if(isset($_POST['create_post'])) {
    $post_cat_id = $_POST['category_id'];
    $post_title = $_POST['title'];
    $post_author = $_POST['author'];
    $post_content = $_POST['content'];
    $post_tags = $_POST['tags'];
    $post_comment_count = 3;
    $post_status = $_POST['status'];
    $post_image = $_FILES['image']['name'];
    $post_image_temp = $_FILES['image']['tmp_name'];
      
    move_uploaded_file($post_image_temp, "../images/$post_image");
    
    $query = "INSERT INTO posts(category_id, title, author, date, image, content, tags, comment_count, status)
              VALUES({$post_cat_id}, '{$post_title}', '{$post_author}', now(), '{$post_image}', '{$post_content}', '{$post_tags}', '{$post_comment_count}', '{$post_status}')";
              
    $addPost = mysqli_query($connection, $query);
    
    confirm($addPost);
    
    header("Location: posts.php");
  }
?>

<form class="" action="" method="post" enctype="multipart/form-data">
  <div class="form-group">
    <label for="category_id">Category: </label>
    <select name="category_id">
      <?php
        $query2 = "SELECT * FROM categories";
        $fetchCat = mysqli_query($connection, $query2);
        
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
    <label for="title">Title</label>
    <input class="form-control"
           type="text"
           name="title"
           value="">
  </div>
  <div class="form-group">
    <label for="author">Author</label>
    <input class="form-control"
           type="text"
           name="author"
           value="">
  </div>
  <div class="form-group">
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
           value="">
  </div>
  <div class="form-group">
    <label for="status">Status</label>
    <input class="form-control"
           type="text"
           name="status"
           value="">
  </div>
  <div class="form-group">
    <label for="content">Content</label>
    <textarea class="form-control"
              name="content"
              cols="30"
              rows="10"
              value="">
    </textarea>
  </div>
  <div class="form-group">
    <input class="btn btn-primary"
           type="submit"
           name="create_post"
           value="Submit">
  </div>
</form>
