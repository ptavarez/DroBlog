<?php

  if(isset($_POST['add_user'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $image = $_FILES['image']['name'];
    $image_tmp = $_FILES['image']['tmp_name'];
    $role = $_POST['role'];
    
    move_uploaded_file($image_tmp, "../images/$image");
    
    $query = "INSERT INTO users(username, password, firstname, lastname, email, image, role)
              VALUES('{$username}', '{$password}', '{$firstname}', '{$lastname}', '{$email}', '{$image}', '{$role}')";
              
    $add_user = mysqli_query($connection,$query);
    confirm($add_user);
    header("Location: users.php");
  }
?>

<form class="" action="" method="post" enctype="multipart/form-data">
  <div class="form-group">
    <label for="status">Role: </label>
    <select class="" name="role">
      <option value="subscriber">Subscriber</option>
      <option value="admin">Admin</option>
    </select>
  </div>
  <div class="form-group">
    <label for="title">Username</label>
    <input class="form-control"
           type="text"
           name="username"
           value="">
  </div>
  <div class="form-group">
    <label for="author">Password</label>
    <input class="form-control"
           type="password"
           name="password"
           value="">
  </div>
  <div class="form-group">
    <label for="tags">First Name</label>
    <input class="form-control"
           type="text"
           name="firstname"
           value="">
  </div>
  <div class="form-group">
    <label for="tags">Last Name</label>
    <input class="form-control"
           type="text"
           name="lastname"
           value="">
  </div>
  <div class="form-group">
    <label for="status">Email</label>
    <input class="form-control"
           type="text"
           name="email"
           value="">
  </div>
  <div class="form-group">
    <img width="100" src="../images/<?php echo $user_image; ?>">
    <label for="image">Image</label>
    <input class="form-control"
           type="file"
           name="image"
           value="">
  </div>
  <div class="form-group">
    <input class="btn btn-primary"
           type="submit"
           name="add_user"
           value="Submit">
  </div>
</form>
