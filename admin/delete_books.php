<?php
  session_start();
  require_once '../config.php';
  require_once 'header.php';
  require_once 'logincheck.php';

  // declaring status so that it is not undeclared when calling it in html php
  $status = "";

  //book with exact name is deletd, letter case sensetive.
  if (isset($_POST['q'])) {
    $nameOfBook = $_POST['nameOfBook'];

    $deleteFromBooks = "DELETE FROM books WHERE book_name = '$nameOfBook'";
    // echo $idOfBook;

    if(mysqli_query($link, $deleteFromBooks)){
      $status = '<div class="alert alert-success">Book Is Deleted!</div>';
    } else {
       $status = '<div class="alert alert-success">Error!!!</div>';
   }
  }

 ?>


<!-- need to add CSS styling to this, will add further down as we go. -->
 <div class="container">
   <div class="row">
     <div class="col-lg-2">
     </div>
     <div class="col-lg-10">
       <form class="form-inline" method="post">
    <input class="form-control mr-sm-2" name="nameOfBook" type="text" placeholder="Enter book name" aria-label="Search">
    <input class="btn btn-outline-success my-2 my-sm-0" name="q" type="submit" value="Delete"> &nbsp; &nbsp;
  </form>
  <?php echo $status; ?>
     </div>

   </div>

 </div>


<?php require_once 'footer.php'; ?>
