<?php
  session_start();
  require_once 'header.php';
  require_once 'logincheck.php';
 ?>


<div class="container">
  <div class="row">
    <div class="col-lg-2">
    </div>
    <div class="col-lg-10">
      <div class="alert alert-success" style="background-color:green; color:white; text-align:center;">
        <h5>Welcome to your profile</h5>
      </div>

      <div class="card-deck">


    <div class="card" style="width: 18rem;">
  <img class="card-img-top" src="images/users.png" alt="Card image cap" height="200">
  <div class="card-body">
    <h3 class="card-title text-primary">Your Information!</h3>

    <a href="info.php" class="btn btn-success" style="width:100%;">View Users</a>
  </div>
</div>

<div class="card" style="width: 18rem;">
<img class="card-img-top" src="images/orders.png" alt="Card image cap" height="200">
<div class="card-body">
<h3 class="card-title text-primary">Orders History</h3>

<a href="order_history.php" class="btn btn-success" style="width:100%;">View Orders</a>
</div>
</div>

      </div>
    </div>

  </div>

</div>
