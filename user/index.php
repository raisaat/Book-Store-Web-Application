<?php
  session_start();
  require_once 'header.php';
  require_once '../config.php';
  $output = "";
  ?>

<div class="container">
  <div class="row">
    <div class="col-sm-3">
      <table class="sidebar">
        <tr><td>GENRES</td></tr>
        <tr><td><a href="children.php">Children</a></td></tr> <!-- mp -->
        <tr><td><a href="general.php">General</a></td></tr> <!-- d -->
        <tr><td><a href="computerscience.php">Computer Science</a></td></tr> <!-- sh -->
        <tr><td><a href="fiction.php">Fiction</a></td></tr> <!-- f -->
        <tr><td><a href="science.php">Science</a></td></tr> <!-- nf -->
        <tr><td><a href="others.php">Others</a></td></tr> <!-- a -->
      </table>
      <br>
      <br>
      <table class="sidebar">
        <tr><td>Pricing Category</td></tr>
        <tr><td><a href="fivetoten.php">$5 - $10</a></td></tr> <!-- mp -->
        <tr><td><a href="tentofifteen.php">$10 - $15</a></td></tr> <!-- d -->
        <tr><td><a href="fifteentotwenty.php">$15 - $20</a></td></tr> <!-- sh -->
        <tr><td><a href="twentytotwentyfive.php">$20 - $25</a></td></tr> <!-- f -->
        <tr><td><a href="twentyfiveplus.php">$25+</a></td></tr> <!-- nf -->
      </table>
    </div>
    <div class="col-sm-9">
      <span id="status"></span>
    <div class="gen">Children</div>
    <div class="row">
      <?php

        $sql = " SELECT * FROM books WHERE category = 'CHILDREN' ORDER BY book_id ASC LIMIT 3";

        $result = mysqli_query($link, $sql);

        while ($row = mysqli_fetch_array($result)) {
          $output .= '<div class = "col-sm-4" id="product"><img src="'.$row['book_img'].'" width="80%" height="200">
          <h5 style="font-size:medium">'.$row['book_name'].'</h5>
          <h5 style="font-size:x-small">'.$row['author'].'</h5>
          <h5 style="font-size:larger;color:red">&#36 '.$row['price'].'</h5>
          <form name="form" method="post">
            <input type="hidden" name="book_id" id="book_id'.$row['book_id'].'" value="'.$row['book_id'].'">
            <input type="hidden" name="book_name" id="book_name'.$row['book_id'].'" value="'.$row['book_name'].'">
            <input type="hidden" name="image" id="image'.$row['book_id'].'" value="'.$row['book_img'].'">
            <input type="hidden" name="price" id="price'.$row['book_id'].'" value="'.$row['price'].'">';

          if (!isset($_SESSION['loggedin'])) {
              $output .= '<input type="submit" name="submit" value="ADD TO CART" class="btn btn-primary login">';
            }
          else {
            $output .= '<button type="button" id="'.$row['book_id'].'"
            class="btn btn-primary">ADD TO CART </button>';
            }

            $output .= '</form></div>';

        }

        echo $output;

       ?>
       <div class="more"> <a href="children.php"> Click to see more children books </a> </div>
     </div>
       <br>

       <div class="gen">General</div>
       <span id="status"></span>
       <div class="row">
         <?php

           $output = '';
           $sql = " SELECT * FROM books WHERE category = 'GENERAL' ORDER BY book_id ASC LIMIT 3";

           $result = mysqli_query($link, $sql);

           while ($row = mysqli_fetch_array($result)) {
             $output .= '<div class = "col-sm-4" id="product"><img src="'.$row['book_img'].'" width="80%" height="200">
             <h5 style="font-size:medium">'.$row['book_name'].'</h5>
             <h5 style="font-size:x-small">'.$row['author'].'</h5>
             <h5 style="font-size:larger;color:red">&#36 '.$row['price'].'</h5>
             <form name="form" method="post">
               <input type="hidden" name="book_id" id="book_id'.$row['book_id'].'" value="'.$row['book_id'].'">
               <input type="hidden" name="book_name" id="book_name'.$row['book_id'].'" value="'.$row['book_name'].'">
               <input type="hidden" name="image" id="image'.$row['book_id'].'" value="'.$row['book_img'].'">
               <input type="hidden" name="price" id="price'.$row['book_id'].'" value="'.$row['price'].'">';

             if (!isset($_SESSION['loggedin'])) {
                 $output .= '<input type="submit" name="submit" value="ADD TO CART" class="btn btn-primary login">';
               }
             else {
               $output .= '<button type="button" id="'.$row['book_id'].'"
               class="btn btn-primary">ADD TO CART </button>';
              }

               $output .= '</form></div>';

           }

           echo $output;

          ?>
          <div class="more"> <a href="general.php"> Click to see more general books </a> </div>
          </div>
          <br>

    <div class="gen">Computer Science</div>
    <span id="status"></span>
    <div class="row">
      <?php

        $output = '';
        $sql = " SELECT * FROM books WHERE category = 'COMPUTER SCIENCE' ORDER BY book_id ASC LIMIT 3";

        $result = mysqli_query($link, $sql);

        while ($row = mysqli_fetch_array($result)) {
          $output .= '<div class = "col-sm-4" id="product"><img src="'.$row['book_img'].'" width="80%" height="200">
          <h5 style="font-size:medium">'.$row['book_name'].'</h5>
          <h5 style="font-size:x-small">'.$row['author'].'</h5>
          <h5 style="font-size:larger;color:red">&#36 '.$row['price'].'</h5>
          <form name="form" method="post">
            <input type="hidden" name="book_id" id="book_id'.$row['book_id'].'" value="'.$row['book_id'].'">
            <input type="hidden" name="book_name" id="book_name'.$row['book_id'].'" value="'.$row['book_name'].'">
            <input type="hidden" name="image" id="image'.$row['book_id'].'" value="'.$row['book_img'].'">
            <input type="hidden" name="price" id="price'.$row['book_id'].'" value="'.$row['price'].'">';

          if (!isset($_SESSION['loggedin'])) {
              $output .= '<input type="submit" name="submit" value="ADD TO CART" class="btn btn-primary login">';
            }
          else {
            $output .= '<button type="button" id="'.$row['book_id'].'"
            class="btn btn-primary">ADD TO CART </button>';
          }

            $output .= '</form></div>';

        }

        echo $output;

       ?>
       <div class="more"> <a href="computerscience.php"> Click to see more CS books </a> </div>
       </div>
       <br>

       <div class="gen">Fiction</div>
       <span id="status"></span>
       <div class="row">
         <?php

           $output = '';
           $sql = " SELECT * FROM books WHERE category = 'FICTION' ORDER BY book_id ASC LIMIT 3";

           $result = mysqli_query($link, $sql);

           while ($row = mysqli_fetch_array($result)) {
             $output .= '<div class = "col-sm-4" id="product"><img src="'.$row['book_img'].'" width="80%" height="200">
             <h5 style="font-size:medium">'.$row['book_name'].'</h5>
             <h5 style="font-size:x-small">'.$row['author'].'</h5>
             <h5 style="font-size:larger;color:red">&#36 '.$row['price'].'</h5>
             <form name="form" method="post">
               <input type="hidden" name="book_id" id="book_id'.$row['book_id'].'" value="'.$row['book_id'].'">
               <input type="hidden" name="book_name" id="book_name'.$row['book_id'].'" value="'.$row['book_name'].'">
               <input type="hidden" name="image" id="image'.$row['book_id'].'" value="'.$row['book_img'].'">
               <input type="hidden" name="price" id="price'.$row['book_id'].'" value="'.$row['price'].'">';

             if (!isset($_SESSION['loggedin'])) {
                 $output .= '<input type="submit" name="submit" value="ADD TO CART" class="btn btn-primary login">';
               }
             else {
               $output .= '<button type="button" id="'.$row['book_id'].'"
               class="btn btn-primary">ADD TO CART </button>';
                }

               $output .= '</form></div>';

           }

           echo $output;

          ?>
          <div class="more"> <a href="fiction.php"> Click to see more fiction books </a> </div>
          </div>
          <br>

          <div class="gen">Science</div>
          <span id="status"></span>
          <div class="row">
            <?php

              $output = '';
              $sql = " SELECT * FROM books WHERE category = 'SCIENCE' ORDER BY book_id ASC LIMIT 3";

              $result = mysqli_query($link, $sql);

              while ($row = mysqli_fetch_array($result)) {
                $output .= '<div class = "col-sm-4" id="product"><img src="'.$row['book_img'].'" width="80%" height="200">
                <h5 style="font-size:medium">'.$row['book_name'].'</h5>
                <h5 style="font-size:x-small">'.$row['author'].'</h5>
                <h5 style="font-size:larger;color:red">&#36 '.$row['price'].'</h5>
                <form name="form" method="post">
                  <input type="hidden" name="book_id" id="book_id'.$row['book_id'].'" value="'.$row['book_id'].'">
                  <input type="hidden" name="book_name" id="book_name'.$row['book_id'].'" value="'.$row['book_name'].'">
                  <input type="hidden" name="image" id="image'.$row['book_id'].'" value="'.$row['book_img'].'">
                  <input type="hidden" name="price" id="price'.$row['book_id'].'" value="'.$row['price'].'">';

                if (!isset($_SESSION['loggedin'])) {
                    $output .= '<input type="submit" name="submit" value="ADD TO CART" class="btn btn-primary login">';
                  }
                else {
                  $output .= '<button type="button" id="'.$row['book_id'].'"
                  class="btn btn-primary">ADD TO CART </button>';
                }

                  $output .= '</form></div>';

              }

              echo $output;

             ?>
             <div class="more"> <a href="science.php"> Click to see more science books </a> </div>
             </div>
             <br>


             <div class="gen">Others</div>
             <span id="status"></span>
             <div class="row">
               <?php

                 $output = '';
                 $sql = " SELECT * FROM books WHERE category = 'OTHERS' ORDER BY book_id ASC LIMIT 3";

                 $result = mysqli_query($link, $sql);

                 while ($row = mysqli_fetch_array($result)) {
                   $output .= '<div class = "col-sm-4" id="product"><img src="'.$row['book_img'].'" width="80%" height="200">
                   <h5 style="font-size:medium">'.$row['book_name'].'</h5>
                   <h5 style="font-size:x-small">'.$row['author'].'</h5>
                   <h5 style="font-size:larger;color:red">&#36 '.$row['price'].'</h5>
                   <form name="form" method="post">
                     <input type="hidden" name="book_id" id="book_id'.$row['book_id'].'" value="'.$row['book_id'].'">
                     <input type="hidden" name="book_name" id="book_name'.$row['book_id'].'" value="'.$row['book_name'].'">
                     <input type="hidden" name="image" id="image'.$row['book_id'].'" value="'.$row['book_img'].'">
                     <input type="hidden" name="price" id="price'.$row['book_id'].'" value="'.$row['price'].'">';

                   if (!isset($_SESSION['loggedin'])) {
                       $output .= '<input type="submit" name="submit" value="ADD TO CART" class="btn btn-primary login">';
                     }
                   else {
                     $output .= '<button type="button" id="'.$row['book_id'].'"
                     class="btn btn-primary">ADD TO CART </button>';
                    }

                     $output .= '</form></div>';

                 }

                 echo $output;

                ?>
                <div class="more"> <a href="others.php"> Click to see more books</a> </div>
                </div>


 </div>

      </div>

  </div>


<!-- Login Modal -->
<div class="modal" id="LoginModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title text-info">Login to Bookstore</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <span id="help" class="text-danger"></span>
        <form action="" class="" method="post">
            <!-- To submit email. -->

            <div class="form-group">
                <i class="fas fa-envelope-open"> </i><label for="">&nbsp;Email</label>
                <input type="text" id="email" name="email" value="" class="form-control" placeholder="Enter your Email Address" required>

            </div>

            <div class="form-group">
                <i class="fas fa-lock"></i><label for="">&nbsp;Password</label>
                <input type="password" id="password" name="password" value="" class="form-control" placeholder="Enter Password" required>

            </div>

            <!-- <div class="form-group">
                <i class="fas fa-lock"></i><label for="">&nbsp;Confirm Password</label>
                <input type="password" id="confirmpassword" name="confirmpassword" value="" class="form-control" placeholder="Confirm Password" required>
                <span id="uConfirmPassword"></span>
            </div> -->



            <br>

            <div class="form-group">
            <button type="button" id="login" name="submit" value="Login" class="btn btn-success" style="width:100%">Login!</button>
            </div>

        </form>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <h6>New to bookstore? <a href="signup.php">JOIN!</a> </h6>
      </div>

    </div>
  </div>
</div>

  <?php require_once 'footer.php'; ?>
