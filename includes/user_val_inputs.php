<?php
  if(!$username) {
    $username_input = "
    <div class='form-group has-warning has-feedback'>
      <label for='username' class='sr-only'>Username</label>
      <input type='text' name='username' id='username' class='form-control' placeholder='Username'>
      <span  style='font-color:red;' class='help-block'>A username is required.</span>
    </div>";
  } else {
    $username_input = "
    <div class='form-group'>
      <label for='username' class='sr-only'>Username</label>
      <input type='text' name='username' id='username' class='form-control' placeholder='Username' value='{$username}'>
    </div>";
  }

  if(!$email) {
    $email_input = "
    <div class='form-group has-warning has-feedback'>
      <label for='email' class='sr-only'>Email</label>
      <input type='email' name='email' id='email' class='form-control' placeholder='Email'>
      <span  style='font-color:red;' class='help-block'>An email is required.</span>
    </div>";
  } else {
    $email_input = "
    <div class='form-group'>
      <label for='username' class='sr-only'>Username</label>
      <label for='email' class='sr-only'>Email</label>
      <input type='email' name='email' id='email' class='form-control' placeholder='Email' value='{$email}'>
    </div>";
  }

  if(!$password) {
    $password_input = "
    <div class='form-group has-warning has-feedback'>
      <label for='password' class='sr-only'>Password</label>
      <input type='password' name='password' id='key' class='form-control' placeholder='Password'>
      <span  style='font-color:red;' class='help-block'>A password is required.</span>
    </div>";
  } else {
    $password_input = "
    <div class='form-group'>
      <label for='password' class='sr-only'>Password</label>
      <input type='password' name='password' id='key' class='form-control' placeholder='Password' value='{$password}'>
    </div>";
  }

  if(!$confirm) {
    $confirm_input = "
    <div class='form-group has-warning has-feedback'>
      <label for='confirm' class='sr-only'>Confirm Password</label>
      <input type='password' name='confirm' id='confirm' class='form-control' placeholder='Confirm Password'>
      <span  style='font-color:red;' class='help-block'>Confirmation is required.</span>
    </div>";
  } else {
    $confirm_input = "
    <div class='form-group'>
      <label for='confirm' class='sr-only'>Confirm Password</label>
      <input type='password' name='confirm' id='confirm' class='form-control' placeholder='Confirm Password' value='{$confirm}'>
    </div>";
  }
?>
