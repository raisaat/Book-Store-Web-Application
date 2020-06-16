<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Admin Login</title>
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.0/css/all.css">
<style>
.info
{
  text-align: right;
  margin-bottom: 20px;
}
</style>
  </head>
  <body>
    <div class="container">
      <div class="info">
        CS6314 - Project - UT DALLAS <br>
        Email: <i class="fas fa-envelope"></i> hxq190001@utdallas.edu
      </div>
    <nav class="navbar navbar-expand-lg navbar-light bg-white">
      <a class="navbar-brand" href="profile.php"><img src="images/bookstorelogo.jpg" alt="" href="80" width="100" /></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav ml-auto">
          <?php
          if(!isset($_SESSION['aloggedin'])){
            echo '<li class="nav-item">
              <a class="nav-link" href="login.php">Login</a>
            </li>';
          }else{
            echo '<li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="profile.php" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                My Account
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <h4 class="dropdown-header">Hello, Admin</h4>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="logout.php">Logout</a>
              </div>
            </li>';
          }
           ?>

        </ul>
      </div>
    </nav>
    <hr>
  </div>
