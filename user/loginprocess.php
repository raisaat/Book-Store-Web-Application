<?php
  session_start();
  include_once '../config.php';
  $email = mysqli_real_escape_string($link,$_POST['email']);
  $password = mysqli_real_escape_string($link,$_POST['password']);

  if (isset($_POST['email']) && isset($_POST['password'])) {
    $sql = " SELECT * FROM user where email = '$email' ";
    $result = mysqli_query($link,$sql);

    if (mysqli_num_rows($result)>0) {
      while ($row = mysqli_fetch_array($result)) {
        if (password_verify($password, password_hash($row['password'], PASSWORD_DEFAULT))) {
          $_SESSION['loggedin'] = true;
          $_SESSION['id'] = $row['user_id'];
          $_SESSION['email'] = $row['email'];
          $_SESSION['username'] = $row['username'];

          echo 1;

        }else {
          echo 0;

        }
      }
    }else {
      echo 0;

    }
  }

 ?>
