<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php">DroBlog</a>
        </div>
        <!-- Blog Search Well -->
        <form class="navbar-form navbar-left" action="search.php" method="post">
          <div class="input-group">
            <input name="search" type="text" class="form-control" placeholder="Search">
            <span class="input-group-btn">
              <button class="btn btn-default" type="submit" name="login">
                <span class="glyphicon glyphicon-search"></span>
              </button>
            </span>
          </div>
        </form>
        <!-- /search form -->
        
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
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
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>
