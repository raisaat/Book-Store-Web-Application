<?php
  session_start();
  require_once 'header.php';
  require_once '../config.php';

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
       <br><br>
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
     <div class="gen">Children</div>
     <span id="status"></span>

     <div class="row">
       <?php
        $output = '';
         $sql = " SELECT * FROM books WHERE category = 'CHILDREN' ORDER BY book_id";

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

      </div>



  </div>

       </div>

   </div>


<?php require_once 'footer.php'; ?>
