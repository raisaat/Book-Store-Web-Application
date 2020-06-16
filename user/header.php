

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Create New Account</title>
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.0/css/all.css">
<link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">
<style>
    body {
        font-family: 'Jost', sans-serif;
    }
    .info
    {
    text-align: right;
    margin-bottom: 20px;
    }

    #heading {
        font-family: 'Pacifico', cursive;
        border: 5px black solid;
        text-align: center;
    }

    .sidebar tr td{
      width: 150px;
      height: 30px;
      text-align: center;
      border-collapse: collapse;
    }

    .sidebar tr:nth-child(even){
      background-color: grey;
    }
    .sidebar tr:nth-child(odd){
      background-color: grey;
    }
    .sidebar tr:nth-child(1){
      background-color: blue;
      color: white;
    }
    .sidebar tr td a{
      color: white;
      text-decoration: none;
    }
    .gen{
      width:90%;
      display: inline-table;
      height: 30px;
      background-color: grey;
      text-align: center;
      font-weight: bold;
      color: white;

    }

    #product{
      padding: 15px;

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
      <a class="navbar-brand" href="index.php"><img src="images/bookstorelogo.jpg" alt="" href="80" width="100" /></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav ml-auto">
          <?php
          if (isset($_SESSION['loggedin'])) {
            echo '<a class="nav-link" href="cart.php"><b>Cart<i class="fas fa-shopping-cart"></i><span class="badge badge-warning" style="border-radius:50%;height:20px;" id="countcart"></span></a></b>
            <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          My Account
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="profile.php"><i class="fas fa-user"></i> My Profile</a>
          <a class="dropdown-item" href="change_password.php"><i class="fas fa-key"></i> Change Password</a>
          <a class="dropdown-item" href="order_history.php"><i class="fas fa-cube"></i> Orders</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a>
        </div>
      </li>

            ';
          }else {
            echo '<li class="nav-item">
              <a class="nav-link" href="login.php">Login</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="signup.php">Create New Account</a>
            </li>';
          }


           ?>

        </ul>
      </div>
    </nav>
    <hr>
  </div>
