<table class="table table-bordered table-hover">
  <thead>
    <tr>
      <th>ID</th>
      <th>Category ID</th>
      <th>Title</th>
      <th>Author</th>
      <th>Date</th>
      <th>Image</th>
      <th>Content</th>
      <th>Tags</th>
      <th>Comment Count</th>
      <th>Status</th>
      <th>Update</th>
      <th>Delete</th>
    </tr>
  </thead>
  <tbody>
  </tbody>
  <?php
  $query = "SELECT * FROM posts";
  $fetchPosts = mysqli_query($connection, $query);
  
  while($row = mysqli_fetch_assoc($fetchPosts)) {
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

    echo "<tr>";
      echo "<td>{$post_id}</td>";
      echo "<td>{$post_cat_id}</td>";
      echo "<td>{$post_title}</td>";
      echo "<td>{$post_author}</td>";
      echo "<td>{$post_date}</td>";
      echo "<td><img width='100' src='../images/$post_image' alt='$post_image'></td>";
      echo "<td>{$post_content}</td>";
      echo "<td>{$post_tags}</td>";
      echo "<td>{$post_comments}</td>";
      echo "<td>{$post_status}</td>";
      echo "<td class='text-center'>
              <a href='posts.php?source=update_post&p_id={$post_id}' class='btn btn-warning'></a>
            </td>";
      echo  "<td class='text-center'>
              <a href='posts.php?delete={$post_id}' class='btn btn-danger'></a>
            </td>";
    echo "</tr>";
  }
  ?>
  </tbody>
</table>

<?php
  if(isset($_GET['delete'])) {
    $id = $_GET['delete'];
    
    $query = "DELETE FROM posts WHERE id = {$id}";
    $delete_post = mysqli_query($connection, $query);
    header("Location: posts.php");
  }
?>
