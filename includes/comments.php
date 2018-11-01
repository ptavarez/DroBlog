<!-- Comments Form -->
<div class="well">
  <h4>Leave a Comment:</h4>
  <?php
    if(isset($_POST['create_comment'])) {
      $author = $_POST['author'];
      $email = $_POST['email'];
      $content = $_POST['content'];
      
      if(!empty($author) && !empty($email) && !empty($content)) {
        $query = "INSERT INTO comments(post_id, author, email, content, status, date)
                  VALUES({$post_id}, '{$author}', '{$email}', '{$content}', 'approved', now())";
                  
        $create_comment = mysqli_query($connection,$query);
        confirm($create_comment);
                
        header("Location: post.php?p_id=$post_id");
      } else {
        echo "<script>alert('Fields cannot be empty')</script>";
      }
    }
  ?>

  <form class="" action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
      <label for="author">Author</label>
      <input class="form-control"
             type="text"
             name="author">
    </div>
    <div class="form-group">
      <label for="email">Email</label>
      <input class="form-control"
             type="text"
             name="email">
    </div>
    <div class="form-group">
      <label for="content">Content</label>
      <textarea class="form-control"
                name="content"
                rows="5"></textarea>
    </div>
    <div class="form-group">
      <input class="btn btn-primary"
             type="submit"
             name="create_comment"
             value="Submit">
    </div>
  </form>
</div>

<hr>

<!-- Posted Comments -->

<!-- Comment -->
<?php
  $query2 = "SELECT * FROM comments WHERE post_id = {$post_id}
             AND status = 'approved'
             ORDER BY id ASC";
             
  $fetch_comments = mysqli_query($connection, $query2);
  confirm($fetch_comments);
  
  while($row = mysqli_fetch_array($fetch_comments)) {
    $date = $row['date'];
    $content = $row['content'];
    $author = $row['author'];
?>
    
<div class="media">
    <a class="pull-left" href="#">
        <img class="media-object" src="http://placehold.it/64x64" alt="">
    </a>
    <div class="media-body">
        <h4 class="media-heading"><?php echo $author ?>
            <small><?php echo $date ?></small>
        </h4>
        <?php echo $content ?>
    </div>
</div>

<?php
  }
?>

<!-- Comment -->
<!-- <div class="media">
    <a class="pull-left" href="#">
        <img class="media-object" src="http://placehold.it/64x64" alt="">
    </a>
    <div class="media-body">
        <h4 class="media-heading">Start Bootstrap
            <small>August 25, 2014 at 9:30 PM</small>
        </h4>
        Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
        <! Nested Comment
        <div class="media">
            <a class="pull-left" href="#">
                <img class="media-object" src="http://placehold.it/64x64" alt="">
            </a>
            <div class="media-body">
                <h4 class="media-heading">Nested Start Bootstrap
                    <small>August 25, 2014 at 9:30 PM</small>
                </h4>
                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
            </div>
        </div>
        <! End Nested Comment
    </div>
</div> -->
