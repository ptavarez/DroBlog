<table class="table table-bordered table-hover">
  <thead>
    <tr>
      <th>ID</th>
      <th>Post</th>
      <th>Author</th>
      <th>Email</th>
      <th>Content</th>
      <th>Status</th>
      <th>Date</th>
      <th>Update</th>
      <th>Delete</th>
    </tr>
  </thead>
  <tbody>
  </tbody>
  <?php
  $query = "SELECT * FROM comments";
  $fetchComments = mysqli_query($connection, $query);
  
  while($row = mysqli_fetch_assoc($fetchComments)) {
    $comment_id = $row['id'];
    $comment_post_id = $row['post_id'];
    $comment_author = $row['author'];
    $comment_email = $row['email'];
    $comment_content = $row['content'];
    $comment_status = $row['status'];
    $comment_date = $row['date'];
    
    $query2 = "SELECT * FROM posts WHERE id = $comment_post_id";
    $fetchPost = mysqli_query($connection, $query2);
    
    confirm($fetchPost);

    echo "<tr>";
      echo "<td>{$comment_id}</td>";
      while($row = mysqli_fetch_assoc($fetchPost)) {
        $post_id = $row['id'];
        $post_title = $row['title'];
        echo "<td><a href='../post.php?p_id={$post_id}'>{$post_title}</a></td>";
      }
      echo "<td>{$comment_author}</td>";
      echo "<td>{$comment_email}</td>";
      echo "<td>{$comment_content}</td>";
      echo "<td>{$comment_status}</td>";
      echo "<td>{$comment_date}</td>";
      echo "<td class='text-center'>
              <a href='comments.php?source=update_comment&c_id={$comment_id}' class='btn btn-warning'></a>
            </td>";
      echo  "<td class='text-center'>
              <a href='comments.php?delete={$comment_id}' class='btn btn-danger'></a>
            </td>";
    echo "</tr>";
  }
  ?>
  </tbody>
</table>

<?php
  if(isset($_GET['delete'])) {
    $id = $_GET['delete'];
    
    $query = "DELETE FROM comments WHERE id = {$id}";
    $delete_comment = mysqli_query($connection, $query);
    confirm($delete_comment);
    
    $query2 = "UPDATE posts SET comment_count = comment_count - 1
               WHERE id = $comment_post_id";
               
    $update_comment_count = mysqli_query($connection, $query2);
    confirm($update_comment_count);
    
    header("Location: comments.php");
  }
?>
