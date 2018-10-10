<?php include "includes/db.php";?>
<?php include "includes/header.php";?>
<!-- Navigation -->
  <?php include "includes/navigation.php";?>
  <!-- Page Content -->
  <div class="container">

      <div class="row">

          <!-- Blog Entries Column -->
          <div class="col-md-8">
            
            <?php
            if(isset($_GET['category'])) {
              $cat_id = $_GET['category'];
            }
              $query = "SELECT * FROM posts WHERE category_id = $cat_id";
              
              $fetchPosts = mysqli_query($connection, $query);
            
              confirm($fetchPosts);
              
              while($row = mysqli_fetch_assoc($fetchPosts)) {
                $post_id = $row['id'];
                $post_title = $row['title'];
                $post_author = $row['author'];
                $post_date = $row['date'];
                $post_image = $row['image'];
                $post_content = substr($row['content'], 0, 230);
                
                ?>
                <h1 class="page-header">
                    Page Heading
                    <small>Secondary Text</small>
                </h1>

                <!-- Blog Posts -->
                <h2>
                    <a href="post.php?p_id=<?php echo $post_id; ?>"><?php echo $post_title;?></a>
                </h2>
                <p class="lead">
                    by <a href="index.php"><?php echo $post_author;?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $post_date;?></p>
                <hr>
                <img class="img-responsive" src="images/<?php echo $post_image;?>" alt="">
                <hr>
                <p><?php echo $post_content;?></p>
                <a class="btn btn-primary" href="post.php?p_id=<?php echo $post_id; ?>">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>
            <?php } ?>
          </div>

          <!-- Blog Sidebar Widgets Column -->
          <?php include "includes/sidebar.php";?>

      </div>
      <!-- /.row -->

      <hr>
<?php include "includes/footer.php";?>
