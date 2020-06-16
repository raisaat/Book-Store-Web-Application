<?php
session_start();
include_once 'header.php';
include_once '../config.php';

$output = '';
$user_id = $_SESSION['id'];
$checkout_id = $_SESSION['checkout_id'];

$sql = " SELECT * FROM address WHERE user_id = $user_id AND checkout_id = '$checkout_id' ";

$result = mysqli_query($link,$sql);
if ($result) {
  while ($row = mysqli_fetch_array($result)) {
    $output .= '<h5>'.$row['name'].'</h5>
                <br>
                <h5>'.$row['address'].'</h5>
                <br>
                <h5>Phone: '.$row['phone'].'</h5>';
  }
}

  if (isset($_POST['pay'])) {
    $sql = " SELECT * FROM cart WHERE user_id = $user_id ";
    $result = mysqli_query($link,$sql);
    if (!$result) {
      echo "Some ERROR Ocuured";
    }else {
      $q = "SELECT * FROM address WHERE checkout_id = '$checkout_id' ";
      $res = mysqli_query($link,$q);
       while ($row = mysqli_fetch_array($res)) {
         $address_id = $row['id'];
       }
       $_SESSION['address_id'] = $address_id;

       $k = 0;

       while ($row = mysqli_fetch_array($result)) {
         $q1 = " INSERT INTO orders(sno,order_id,book_id,book_name,book_image,price,quantity,total_price,user_id,date_of_purchase,status,payment_method,paid)
         VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)  ";

         $q2 = " INSERT INTO order_address(id,address_id,order_id) VALUES (?,?,?) ";

         $q3 = " DELETE FROM cart WHERE user_id = ? ";

         $stmt1 = mysqli_prepare($link,$q1);
         $stmt2 = mysqli_prepare($link,$q2);
         $stmt3 = mysqli_prepare($link,$q3);

          mysqli_stmt_bind_param($stmt1,'iiissdidissss',$param_sno,$param_order_id,$param_book_id,$param_book_name,$param_book_image
          ,$param_price,$param_quantity,$param_total_price,$param_user_id,$param_date_of_purchase,$param_status,$param_payment_method
          ,$param_paid);

          mysqli_stmt_bind_param($stmt2,'iii',$param_id,$param_address_id,$param_order_id);

          mysqli_stmt_bind_param($stmt3,'i',$param_user_id);


          $param_sno = '';
          $param_order_id = rand().$user_id;
          $_SESSION['order_id'][$i] = $param_order_id;
          $param_book_name = $row['book_name'];
          $param_book_id = $row['book_id'];
          $param_book_image = $row['book_image'];
          $param_price = $row['price'];
          $param_quantity = $row['quantity'];
          $param_total_price = $row['total_price'];
          $param_user_id = $user_id;
          $param_date_of_purchase = date('Y-m-d h:i:s');
          $param_status = "ORDER PLACED";
          $param_payment_method = "COD";
          $param_paid = "NO";
          $param_id = '';
          $param_address_id = $address_id;

          if (mysqli_stmt_execute($stmt1) && mysqli_stmt_execute($stmt2) && mysqli_stmt_execute($stmt3)) {
            unset($_SESSION['checkout_id']);
            echo "<script>
              window.location.href = 'order_success.php';
            </script>";
          }
            $k++;

       }

    }
  }

 ?>

<div class="container">
  <div class="row">
    <div class="col-sm-5 p-4 mr-5" style="height: 300px; box-shadow: 5px 5px 10px;">
      <h4 class="text-success">Delivery Address</h4>
      <hr>
      <?php echo $output; ?>
    </div>
    <div class="col-sm-6" style="height: 300px; box-shadow: 5px 5px 10px; overflow-y: scroll;">
      <?php
      $sql = " SELECT * FROM cart WHERE user_id = $user_id ";
      $result = mysqli_query($link,$sql);
      if (mysqli_num_rows($result)==0) {
        echo "<h3 class='text-success'>YOUR CART IS EMPTY</h3>";
      }else {
        ?>
        <h3 class="text-success">Books in Shopping Cart</h3>
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


                      </td>
                      <td><?php echo "&#36; ".$row['price']; ?></td>
                      <td>
                      <?php echo $row['quantity']; ?>

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


        </div>


        <?php
      }
       ?>
    </div>

  </div>

    <div class="row mt-5">
      <div class="col-sm-5 p-3" style="height: 200px; box-shadow: 5px 5px 10px;">

        <h4 class="text-success">Payment Method</h4>
        <hr>
        <h5>Cash on Delivery</h5>
        <form method="post">
          <button type="submit" name="pay" class="btn btn-success">Pay</button>
        </form>

      </div>

    </div>

</div>

<?php
include_once 'footer.php';
 ?>
