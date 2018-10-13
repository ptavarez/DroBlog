<!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
<div class="collapse navbar-collapse navbar-ex1-collapse">
    <ul class="nav navbar-nav side-nav">
        <li>
            <a href="index.php"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
        </li>
        <li>
            <a href="categories.php"><i class="fa fa-fw fa-tags"></i> Categories</a>
        </li>
        <li>
            <a href="javascript:;" data-toggle="collapse" data-target="#posts"><i class="fa fa-fw fa-pencil-square-o"></i> Posts <i class="fa fa-fw fa-caret-down"></i></a>
            <ul id="posts" class="collapse">
                <li>
                    <a href="posts.php?source=add_post">Add Post</a>
                </li>
                <li>
                    <a href="posts.php">View Posts</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-users"></i> Users <i class="fa fa-fw fa-caret-down"></i></a>
            <ul id="demo" class="collapse">
                <li>
                    <a href="users.php?source=add_user">New User</a>
                </li>
                <li>
                    <a href="users.php">View Users</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="comments.php"><i class="fa fa-fw fa-comments-o"></i> Comments</a>
        </li>
        <li>
            <a href="#"><i class="fa fa-fw fa-user"></i> Profile</a>
        </li>
    </ul>
</div>
<!-- /.navbar-collapse -->
