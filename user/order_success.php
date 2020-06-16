<?php
  session_start();
  include_once 'header.php';
  include_once 'logincheck.php';
  include_once '../config.php';


 ?>

 <div class="container">
   <div class="row">
     <div class="col-sm-12">
       <div class="alert">
         <div class="alert-header">
           Thank you, <?php echo $_SESSION['name'];?> for shopping with us!
         </div>

       </div>

     </div>
   </div>
 </div>


<?php
  include_once 'footer.php';
 ?>
