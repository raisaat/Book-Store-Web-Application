<?php
  session_start();
  require_once 'header.php';
  require_once 'logincheck.php';
  require_once '../config.php';

  $bookname_error = "";
  $author_error = "";
  $price_error = "";
  $category_error = "";
  $image_error = "";
  $bookname = "";
  $author = "";
  $price = "";
  $category = "";
  $image = "";
  $status = "";

  if (isset($_POST['submit'])) {

    // validate book name
    if (empty($_POST['book_name'])) {
      $bookname_error = "Please enter book name";
    }else {
      $bookname = test_input($_POST['book_name']);
      $name_pattern = '/^[a-zA-Z ]+$/';
      if (!preg_match($name_pattern,$bookname)) {
        $bookname_error = "Please enter valid book name";
      }
    }

    // validate author
    if (empty($_POST['author'])) {
      $author_error = "Please enter author name";
    }else {
      $author = test_input($_POST['author']);
      $author_pattern = '/^[a-zA-Z ]+$/';
      if (!preg_match($author_pattern,$author)) {
        $author_error = "Please enter valid author name";
      }
    }

    // validate price
    if (empty($_POST['price'])) {
      $price_error = "Please enter price";
    }else {
      $price = test_input($_POST['price']);
      $price_pattern = '/^[0-9]+$/';
      if (!preg_match($price_pattern,$price)) {
        $price_error = "Please enter valid price";
      }
    }

    // validate category
    if (empty($_POST['category'])) {
      $category_error = "Please enter category";
    }else {
      $category = test_input($_POST['category']);
      $category_pattern = '/^[a-zA-Z ]+$/';
      if (!preg_match($category_pattern,$category)) {
        $category_error = "Please enter valid category";
      }
    }

    // validate book image
    if (!isset($_FILES['book_img'])) {
      $image_error = "Please select image";
    }
    else
    {
      $target = "images/";
      $file_name = $_FILES['book_img']['name'];
      $file_type = $_FILES['book_img']['type'];
      $file_size = $_FILES['book_img']['size'];
      $temp_name = $_FILES['book_img']['temp_name'];
      $allowed = array('jpg' => 'image/jpg', 'jpeg' => 'image/jpeg');

      if (!in_array($file_type,$allowed)) {
        $image_error = "Please select any jpeg/jpg file";
      }

      $max_size = 2*1024*1024;
      if ($file_size > $max_size) {
        $image_error = "File size is greater than 2 MB";
      }

      if (in_array($file_type,$allowed) && $file_size < $max_size && $_FILES['book_img']['error']===0) {
        $new_name = rand().$file_name;
        $target = $target.$new_name;
        $image = $target;
        move_uploaded_file($temp_name, $target);
      }
      //else {
        //$image_error = "An error occured!";
      //}

    }

    if (empty($bookname_error) && empty($author_error) && empty($price_error) && empty($category_error) && empty($image_error))
    {
      $sql = "INSERT INTO books (book_name, book_img, author, isbn, price, category) VALUES('$bookname','$image','$author','','$price','$category')";

      //$res = mysqli_query($link,$sql);
      if(mysqli_query($link, $sql)){
         $status = '<div class="alert alert-success">Book has been added successfully</div>';
      } else{
          $status = '<div class="alert alert-success">Error!!!</div>';
      }

    }

  }

  function test_input($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

 ?>


 <div class="container">
   <div class="row">

     <div class="col-lg-12">
       <div class="row">
         <div class="col-sm-3"></div>
         <div class="col-sm-5">
           <h4 class="text-warning">Please provide details: </h4><br>
           <span><?php echo $status; ?></span>
           <form class="form" method="post" enctype="multipart/form-data">
             <div class="form-group">
               <label for="">Book Name</label>
               <input type="text" name="book_name" value="" class="form-control">
               <span class="text-danger"><?php echo $bookname_error; ?></span>
             </div>
             <div class="form-group">
               <label for="">Author</label>
               <input type="text" name="author" value="" class="form-control">
               <span class="text-danger"><?php echo $author_error; ?></span>
             </div>
             <div class="form-group">
               <label for="">Price</label>
               <input type="text" name="price" value="" class="form-control">
               <span class="text-danger"><?php echo $price_error; ?></span>
             </div>
             <div class="form-group">
               <label for="">Category</label>
               <input type="text" name="category" value="" class="form-control">
               <span class="text-danger"><?php echo $category_error; ?></span>
             </div>
             <div class="form-group">
               <label for="">Upload Book Image</label>
               <input type="file" name="book_img" value="" class="form-control">
               <span class="text-danger"><?php echo $image_error; ?></span>
             </div>
             <div class="form-group">
               <input type="submit" name="submit" value="Add Book" class="btn btn-success">
             </div>
      </form>
          </div>
         <div class="col-sm-4"></div>
       </div>

     </div>

   </div>

 </div>


<?php require_once 'footer.php'; ?>
