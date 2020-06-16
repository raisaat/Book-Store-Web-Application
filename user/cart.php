<?php
session_start();
include_once '../config.php';
include_once 'header.php';
$user_id = $_SESSION['id'];
$status = '';


if (isset($_POST['remove'])) {
  $book_id = $_POST['book_id'];

  $sql = " DELETE FROM cart WHERE user_id = $user_id AND book_id = $book_id ";
  $result = mysqli_query($link,$sql);
  if ($result) {
    $status = '<div class="alert alert-success">ITEM DELETED FROM CART!</div>';
  }else {
    $status = '<div class="alert alert-danger">ITEM CANNOT BE DELETED FROM CART!</div>';
  }

}

if (isset($_POST['update'])) {
  $book_id = $_POST['book_id'];
  $quantity = $_POST['quantity'];
  $price = $_POST['price'];
  $total = (float)$quantity*(float)$price;

  $sql = " UPDATE cart SET quantity = $quantity, total_price = $total WHERE user_id = $user_id AND book_id = $book_id ";
  $result = mysqli_query($link,$sql);
  if ($result) {
    $status = '<div class="alert alert-success">CART UPDATED!</div>';
  }else {
    $status = '<div class="alert alert-danger">CANNOT UPDATE CART!</div>';
  }

}


 ?>

<div class="container">
  <div class="row">
    <div class="col-sm-2"></div>
    <div class="col-sm-8">
      <span><?php echo $status; ?></span>
      <?php
      $sql = " SELECT * FROM cart WHERE user_id = $user_id ";
      $result = mysqli_query($link,$sql);
      if (mysqli_num_rows($result)==0) {
        echo "<h3 class='text-success'>YOUR CART IS EMPTY</h3>";
      }else {
        ?>
        <h3 class="text-success">Your Shopping Cart</h3>
        <table class="table">
          <tr>
            <td>BOOKS</td>
            <td>PRICE</td>
            <td>QUANTITY</td>
            <td>TOTAL</td>
          </tr>

          <?php

            while ($row = mysqli_fetch_array($result)) {
              ?>

                      <tr>
                        <td><?php echo '<img src="'.$row['book_image'].'"  height="100" width="100">';
                        echo "<br>".$row['book_name'];  ?>
                        <br>
                        <form method="post">
                          <input type="hidden" name="book_id" value="<?php echo $row['book_id']; ?>">
                          <button type="submit" name="remove" class="btn btn-sm btn-danger">REMOVE</button>
                        </form>

                      </td>
                      <td><?php echo "&#36; ".$row['price']; ?></td>
                      <td>
                        <form method="post">
                          <div class="form-group">
                            <input type="hidden" name="book_id" value="<?php echo $row['book_id']; ?>">
                            <input type="hidden" name="price" value="<?php echo $row['price']; ?>">
                            <span class="badge badge-info"><?php echo $row['quantity']; ?></span>
                            <select name="quantity">
                              <option value="1">1</option>
                              <option value="2">2</option>
                              <option value="3">3</option>
                            </select>
                            <button type="submit" name="update" class="btn btn-sm btn-primary">UPDATE</button>
                          </div>

                        </form>
                      </td>
                      <td><?php echo "&#36; ".(float)$row['price']*(float)$row['quantity']; ?></td>
                      </tr>

        <?php    }

           ?>

        </table>

        <div class="total">
          <?php
          $total_price = 0;
            $sql = " SELECT * FROM cart WHERE user_id = $user_id ";
            $result = mysqli_query($link,$sql);
            while ($row = mysqli_fetch_array($result)) {
              $total_price = $total_price + $row['total_price'];
            }

           ?>

            <span class="text-primary float-right">
              <h5><?php echo "Total Price: &#36; ".$total_price; ?></h5>

            </span>
            <br><br>
            <a href="checkout.php"><button type="submit" class="btn btn-success float-right"><i class="fa fa-shopping-cart" aria-hidden="true"></i>
              &nbsp;CHECKOUT</button></a>

        </div>


        <?php
      }
       ?>


    </div>
    <div class="col-sm-2"></div>

  </div>

</div>

 <?php
include_once 'footer.php';
  ?>
