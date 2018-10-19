<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
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

  <!-- Collect the nav links, forms, and other content for toggling -->
  <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
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
    
      <ul class="nav navbar-nav navbar-right" style="margin-right:5px;">
        <?php
        $query = "SELECT * FROM categories";
        $fetchCats = mysqli_query($connection, $query);
        
        while($row = mysqli_fetch_assoc($fetchCats)) {
          $cat_id = $row['id'];
          $cat_title = $row['title'];
          
          echo "<li><a href='category.php?category=$cat_id'>{$cat_title}</a></li>";
        }
        ?>
        <?php
          if(isset($_SESSION['role'])) {
        ?>
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $_SESSION['username']; ?> <b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li>
                  <a href="admin/index.php"><i class="glyphicon glyphicon-dashboard"></i> Admin</a>
              </li>
              <li>
                  <a href="admin/profile.php"><i class="glyphicon glyphicon-user"></i> Profile</a>
              </li>
                <li class="divider"></li>
                <li>
                    <a href="./includes/logout.php"><i class="glyphicon glyphicon-off"></i> Log Out</a>
                </li>
            </ul>
        </li>
      <?php } ?>
      </ul>
  </div>
  <!-- /.navbar-collapse -->
</nav>
