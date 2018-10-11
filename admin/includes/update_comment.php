<?php
  if(isset($_GET['c_id'])) {
    $id =  $_GET['c_id'];
    $query = "SELECT * FROM comments WHERE id=$id";
    $fetchComment = mysqli_query($connection, $query);

    while($row = mysqli_fetch_assoc($fetchComment)) {
      $comment_id = $row['id'];
      $comment_post_id = $row['post_id'];
      $comment_author = $row['author'];
      $comment_email = $row['email'];
      $comment_content = $row['content'];
      $comment_status = $row['status'];
      $comment_date = $row['date'];
    }
  }
  
  if(isset($_POST['update_comment'])) {
    $post_id = $_POST['post_id'];
    $author = $_POST['author'];
    $email = $_POST['email'];
    $content = $_POST['content'];
    $status = $_POST['status'];
    $date = $_POST['date'];
    
    $query = "UPDATE comments SET
                post_id = {$post_id},
                author = '{$author}',
                email = '{$email}',
                content = '{$content}',
                status = '{$status}'
              WHERE id = $id";
              
    $update_comment = mysqli_query($connection,$query);
    
    confirm($update_comment);
    
    header("Location: comments.php");
  }
?>

<form class="" action="" method="comment" enctype="multipart/form-data">
<div class="form-group">
  <label for="post_id">Post: </label>
  <select name="post_id">
    <?php
      $query = "SELECT * FROM posts";
      $fetchPost = mysqli_query($connection, $query);
      
      confirm($fetchPost);
      
      while($row = mysqli_fetch_assoc($fetchPost)) {
        $post_id = $row['id'];
        $post_title = $row['title'];
        
        echo "<option value='{$post_id}'>{$post_title}</option>";
      }
    ?>
  </select>
</div>
<div class="form-group">
  <label for="author">Author</label>
  <input class="form-control"
         type="text"
         name="author"
         value="<?php echo $comment_author; ?>">
</div>
<div class="form-group">
  <label for="email">Email</label>
  <input class="form-control"
         type="text"
         name="email"
         value="<?php echo $comment_email; ?>">
</div>
<div class="form-group">
  <label for="content">Content</label>
  <textarea class="form-control"
            name="content"
            cols="30"
            rows="10"><?php echo $comment_content; ?>
  </textarea>
</div>
<div class="form-group">
  <label for="status">Status</label>
  <input class="form-control"
         type="text"
         name="status"
         value="<?php echo $comment_status; ?>">
</div>
<div class="form-group">
  <input class="btn btn-primary"
         type="submit"
         name="update_comment"
         value="Submit">
</div>
</form>
