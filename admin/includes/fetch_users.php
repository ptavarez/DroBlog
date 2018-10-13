<table class="table table-bordered table-hover">
  <thead>
    <tr>
      <th>ID</th>
      <th>First Name</th>
      <th>Last Name</th>
      <th>Role</th>
      <th>Username</th>
      <th>Email</th>
      <th>Image</th>
      <th>Update</th>
      <th>Delete</th>
    </tr>
  </thead>
  <tbody>
  </tbody>
  <?php
  $query = "SELECT * FROM users";
  $fetchUsers = mysqli_query($connection, $query);
  confirm($fetchUsers);
  
  while($row = mysqli_fetch_assoc($fetchUsers)) {
    $user_id = $row['id'];
    $user_username = $row['username'];
    $user_firstname = $row['firstname'];
    $user_lastname = $row['lastname'];
    $user_email = $row['email'];
    $user_image = $row['image'];
    $user_role = $row['role'];

    echo "<tr>";
      echo "<td>{$user_id}</td>";
      echo "<td>{$user_firstname}</td>";
      echo "<td>{$user_lastname}</td>";
      echo "<td>{$user_role}</td>";
      echo "<td>{$user_username}</td>";
      echo "<td>{$user_email}</td>";
      echo "<td>{$user_image}</td>";
      
      echo "<td class='text-center'>
              <a href='users.php?source=update_user&u_id={$user_id}' class='btn btn-warning'></a>
            </td>";
      echo  "<td class='text-center'>
              <a href='users.php?delete={$user_id}' class='btn btn-danger'></a>
            </td>";
    echo "</tr>";
  }
  ?>
  </tbody>
</table>

<?php
  if(isset($_GET['delete'])) {
    $id = $_GET['delete'];
    
    $query = "DELETE FROM users WHERE id = {$id}";
    $delete_user = mysqli_query($connection, $query);
    confirm($delete_user);
    
    header("Location: users.php");
  }
?>
