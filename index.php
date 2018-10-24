<?php include "includes/db.php";?>
<?php include "includes/header.php";?>
<!-- Navigation -->
  <?php include "includes/navigation.php";?>
  <!-- Page Content -->
  <div class="container">

      <div class="row">

          <!-- Blog Entries Column -->
          <div class="col-md-8">
            <h1 class="page-header">
                DroBlog
                <small>Blog your life.</small>
            </h1>
            
            <?php
              $per_page = 5;
              
              if(isset($_GET['page'])) {
                $page = $_GET['page'];
              } else {
                $page = '';
              }
              
              if($page === '' || $page === 1) {
                $cur_page = 0;
              } else {
                $cur_page = ($page * $per_page) - $per_page;
              }
              
              $post_query = "SELECT * FROM posts";
              $postConnect = mysqli_query($connection, $post_query);
              confirm($postConnect);
              
              $post_count = mysqli_num_rows($postConnect);
              
              $post_count = ceil($post_count / $per_page);
              
              $query = "SELECT * FROM posts LIMIT $cur_page, $per_page";
              $fetchPosts = mysqli_query($connection, $query);
              confirm($fetchPosts);
              
              while($row = mysqli_fetch_assoc($fetchPosts)) {
                $post_id = $row['id'];
                $post_title = $row['title'];
                $post_author = $row['author'];
                $post_date = $row['date'];
                $post_image = $row['image'];
                $post_status = $row['status'];
                $post_content = substr($row['content'], 0, 150);
                
                if($post_status === 'published') {
            ?>
                <!-- Blog Posts -->
                <h2>
                    <a href="post.php?p_id=<?php echo $post_id; ?>"><?php echo $post_title;?></a>
                </h2>
                <p class="lead">
                    by <a href="author_posts.php?author=<?php echo $post_author;?>&p_id=<?php echo $post_id; ?>"><?php echo $post_author;?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $post_date;?></p>
                <hr>
                <a href="post.php?p_id=<?php echo $post_id; ?>">
                  <img class="img-responsive" src="images/<?php echo $post_image;?>" alt="">
                </a>
                <hr>
                <p><?php echo $post_content;?> ...</p>
                <a class="btn btn-primary" href="post.php?p_id=<?php echo $post_id; ?>">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>
            <?php
                }
              }
            ?>
          </div>

          <!-- Blog Sidebar Widgets Column -->
          <?php include "includes/sidebar.php";?>
      </div>
      <!-- /.row -->

      <hr>
      <?php include "includes/pagination.php";?>
      
<?php include "includes/footer.php";?>
