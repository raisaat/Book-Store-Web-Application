<?php
  session_start();
  require_once '../config.php';
  require_once 'header.php';

  if (isset($_POST['checkout'])) {
    $user_id = $_SESSION['id'];
    $name = $_POST['fullname'];
    $address = $_POST['address'].', '.$_POST['city'].', '.$_POST['pin'].', '.$_POST['state'];
    $cell = $_POST['phone'];

    $sql = " INSERT INTO address VALUES(?,?,?,?,?,?) ";

    if ($stmt = mysqli_prepare($link,$sql)) {
      mysqli_stmt_bind_param($stmt, 'iissss', $param_id, $param_user_id, $param_name, $param_address, $param_phone, $param_checkout_id);

      $param_id = '';
      $param_user_id = $user_id;
      $param_name = $name;
      $param_address = $address;
      $param_phone = $cell;
      $param_checkout_id = uniqid();
      $_SESSION['checkout_id'] = $param_checkout_id;

      if (mysqli_stmt_execute($stmt)) {
          echo "<script>window.location.href='order_review.php';</script>";
      }else {
        echo "Already in cart";
      }
    }

  }
?>

<div class="container">
  <div class="row">
    <div class="col-sm-4"></div>
    <div class="col-sm-4">
      <h4 class="text-success"><strong>CHECKOUT PAGE</strong></h4>
      <form method="POST" id="checkoutform" style="position:relative;">
        <div class="form-group">
          <label>FULL NAME</label>
          <input type="text" name="fullname" class="form-control" placeholder="Enter your full name" required>
          <div class="invalid-feedback">Kindly enter your name</div>
        </div>
        <div class="form-group">
          <label>ADDRESS</label>
          <input type="text" name="address" class="form-control" placeholder="Enter your address" required>
          <div class="invalid-feedback">Kindly enter your address</div>

        </div>
        <div class="form-group">
          <label>CITY</label>
          <input type="text" name="city" class="form-control" placeholder="Enter your city" required>
          <div class="invalid-feedback">Kindly enter your city</div>

        </div>
        <div class="form-group">
          <label>STATE</label>
          <input type="text" name="state" class="form-control" placeholder="Enter your state" required>
          <div class="invalid-feedback">Kindly enter your state</div>
        </div>
        <div class="form-group">
          <label>PINCODE</label>
          <input type="text" name="pin" class="form-control" placeholder="Enter your pin code" required>
          <div class="invalid-feedback">Kindly enter your pincode</div>
        </div>
        <div class="form-group">
          <label>CELL PHONE</label>
          <input type="text" name="phone" class="form-control" placeholder="Enter your cell phone no" pattern="^[2-9]\d{9}$" required>
          <div class="invalid-feedback">Kindly enter your cellphone number</div>
        </div>
        <div class="form-group">
          <button class="btn btn-success checkout" type="submit" id="checkout" name="checkout">PAY</button>
        </div>
      </form>
    </div>
    <div class="col-sm-4"></div>
  </div>


  </div>

<?php include_once 'footer.php'; ?>
