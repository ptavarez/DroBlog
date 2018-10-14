<div class="col-md-4">
    <!-- Login -->
    <div class="well">
        <h4>Login</h4>
        <form class="" action="includes/login.php" method="post">
          <div class="form-group">
              <input name="username" type="text" class="form-control" placeholder="Username">
          </div>
          <div class="input-group">
              <input type="password" name="password" class="form-control" placeholder="Password">
              <span class="input-group-btn">
                <button class="btn btn-primary" type="submit" name="login">Submit</button>
              </span>
          </div>
        </form> <!-- /search form -->
        <!-- /.input-group -->
    </div>

    <!-- Blog Categories Well -->
    <div class="well">
        <h4>Blog Categories</h4>
        <div class="row">
            <div class="col-lg-12">
                <ul class="list-unstyled">
                  <?php
                    $query = "SELECT * FROM categories";
                    $fetchCats = mysqli_query($connection, $query);
                    
                    while($row = mysqli_fetch_assoc($fetchCats)) {
                      $cat_id = $row['id'];
                      $cat_title = $row['title'];
                      
                      echo "<li><a href='category.php?category=$cat_id'>{$cat_title}</a></li>";
                    }
                  ?>
                </ul>
            </div>
            <!-- /.col-lg-6 -->
        </div>
        <!-- /.row -->
    </div>

    <!-- Side Widget Well -->
  <?php include "widget.php"?>

</div>
