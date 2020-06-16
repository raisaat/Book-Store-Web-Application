<?php
  session_start();

  session_unset($_SESSION['loggedin']);
  session_unset($_SESSION['id']);
  session_unset($_SESSION['name']);

  session_destroy();
  header('location: login.php');

 ?>
