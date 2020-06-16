<?php

  require_once '../config.php';
  require_once 'header.php';
  $email = "";
  $password = "";
  $email_error = "";
  $password_error = "";
  $error = "";
  if (isset($_POST['submit'])) {

    if (empty($_POST['email'])) {
      $email_error = "Kindly enter email";
    }

    else {
      $email = mysqli_real_escape_string($link, $_POST['email']);
    }

    if (empty($_POST['password'])) {
      $password_error = "Kindly enter password";
    }

    else {
      $password = mysqli_real_escape_string($link, $_POST['password']);
    }

    if (empty($email_error) && empty($password_error)) {
      $sql = " SELECT * FROM user WHERE email = '$email' ";

      $result = mysqli_query($link,$sql);

      if (mysqli_num_rows($result)>0) {

        while ($row = mysqli_fetch_array($result)) {

          if (password_verify($password, password_hash($row['password'], PASSWORD_DEFAULT))) {
            session_start();

            $_SESSION['loggedin'] = true;
            $_SESSION['id'] = $row['user_id'];
            $_SESSION['name'] = $row['username'];
            header('location: index.php');

          }
          else {
            $error = "Invalid email or password!";
          }

        }

      }else {
        $error = "Invalid email or password";
      }

    }

  }

 ?>

 <div class="container">
   <div class="row">
       <div class="col-sm-4"></div>
       <div class="col-sm-4">
           <h2 id="heading">Login</h2>
           <br>
           <span class="text-danger"><?php echo $error; ?></span>

           <br>
           <br>
           <form action="" class="" method="post">
               <!-- To submit email. -->

               <div class="form-group">
                   <i class="fas fa-envelope-open"> </i><label for="">&nbsp;Email</label>
                   <input type="text" id="email" name="email" value="" class="form-control" placeholder="Enter your Email Address" required>
                   <span class="text-danger"> <?php echo $email_error; ?> </span>
               </div>

               <div class="form-group">
                   <i class="fas fa-lock"></i><label for="">&nbsp;Password</label>
                   <input type="password" id="password" name="password" value="" class="form-control" placeholder="Enter Password" required>
                   <span class="text-danger"> <?php echo $password_error; ?> </span>
               </div>

               <!-- <div class="form-group">
                   <i class="fas fa-lock"></i><label for="">&nbsp;Confirm Password</label>
                   <input type="password" id="confirmpassword" name="confirmpassword" value="" class="form-control" placeholder="Confirm Password" required>
                   <span id="uConfirmPassword"></span>
               </div> -->



               <br>

               <div class="form-group">
               <input type="submit" id="submit" name="submit" value="Login" class="btn btn-success" style="width:100%">
               </div>

           </form>
       </div>
       <div class="col-sm-4"></div>
    </div>
 </div>
