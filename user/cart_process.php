<?php
  session_start();
  include_once '../config.php';

  $var = $_POST['action'];

  switch ($var) {
    case 'add_to_cart':
      $book_id = $_POST['book_id'];
      $book_name = $_POST['book_name'];
      $image = $_POST['image'];
      $price = $_POST['price'];
      $user_id = $_SESSION['id'];
      $quantity = $_POST['quantity'];

      $sql = " SELECT * FROM cart WHERE user_id = $user_id AND book_id = $book_id ";
      $result = mysqli_query($link,$sql);

      if (mysqli_num_rows($result)==1) {
        $status = '<div class="alert alert-danger" role="alert" data-auto-dismiss="2000">
        Item is already present in cart!
        </div>';
      }else {
        $sql = " INSERT INTO cart(order_id, book_id, book_name, book_image, price, total_price, quantity, user_id) VALUES
        (123,$book_id,'$book_name','$image',$price,$price,$quantity,$user_id) ";
        $res = mysqli_query($link,$sql);
        if ($res) {
          $status = '<div class="alert alert-success" role="alert" data-auto-dismiss="2000">
          Item is added in cart!
          </div>';
        }else {
          $status = '<div class="alert alert-danger" role="alert" data-auto-dismiss="2000">
          Item cannot be added!
          </div>';
        }
      }

      echo $status;
      break;

    default:

      break;
  }
 ?>
