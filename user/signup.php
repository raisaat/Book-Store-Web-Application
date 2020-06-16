<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Create New Account</title>
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.0/css/all.css">
<link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">
<style>
    body {
        font-family: 'Jost', sans-serif;
    }
    .info
    {
    text-align: right;
    margin-bottom: 20px;
    }

    #heading {
        font-family: 'Pacifico', cursive;
        border: 5px black solid;
        text-align: center;
    }


</style>
  </head>
  <body>
    <div class="container">
      <div class="info">
        Contact Us - Mobile: <i class="fas fa-phone"></i>&nbsp;(832)929-5746<br>
        Email: <i class="fas fa-envelope"></i> akhtarhumayun2@gmail.com
      </div>
    <nav class="navbar navbar-expand-lg navbar-light bg-white">
      <a class="navbar-brand" href="profile.php"><img src="images/bookstorelogo.jpg" alt="" href="80" width="100" /></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav ml-auto">
          <?php

            echo '<li class="nav-item">
              <a class="nav-link" href="login.php">Login</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="signup.php">Create New Account</a>
            </li>';

           ?>

        </ul>
      </div>
    </nav>
    <hr>
  </div>

  <div class="container">
    <div class="row">
        <div class="col-sm-4"></div>
        <div class="col-sm-4">
            <h2 id="heading">Create New Account.</h2>
            <br>
            <br>
            <span id="messagebox"></span>
            <br>
            <form action="" class="" method="post">
                <!-- To submit email. -->
                <div class="form-group">
                    <i class="fas fa-user"></i> <label for="">&nbsp;Name</label>
                    <input type="text" id="name" name="name" value="" class="form-control" placeholder="Enter your Name." required>
                    <span id="uName"></span>
                </div>

                <div class="form-group">
                    <i class="fas fa-envelope-open"> </i><label for="">&nbsp;Email</label>
                    <input type="text" id="email" name="email" value="" class="form-control" placeholder="Enter your Email Address." required>
                    <span id="uEmail"></span>
                </div>

                <div class="form-group">
                    <i class="fas fa-lock"></i><label for="">&nbsp;Password</label>
                    <input type="password" id="password" name="password" value="" class="form-control" placeholder="Create Password" required>
                    <span id="uPassword"></span>
                </div>

                <!-- <div class="form-group">
                    <i class="fas fa-lock"></i><label for="">&nbsp;Confirm Password</label>
                    <input type="password" id="confirmpassword" name="confirmpassword" value="" class="form-control" placeholder="Confirm Password" required>
                    <span id="uConfirmPassword"></span>
                </div> -->

                <div class="form-group">
                    <i class="fas fa-mobile"></i><label for="">&nbsp;Cellphone Number</label>
                    <input type="text" id="cellphone" name="cellphone" value="" class="form-control" placeholder="Enter your Cellphone Number" required>
                    <span id="uCellphone"></span>
                </div>

                <br>

                <div class="form-group">
                <input type="submit" id="submit" name="submit" value="Create Account" class="btn btn-success" style="width:100%">
                </div>

            </form>
        </div>
        <div class="col-sm-4"></div>
     </div>
  </div>

  <script type="text/javascript">
    $(document).ready(function() {


      var name = "";
      var check = "";
      var password = "";
      var cellphone = "";


      //creating boolean variables to check if all requirements are met.
      //they will be updated dynamically as the conditions are met to be true.

      var nameCheck = true;
      var emailCheck = true;
      var passwordCheck = true;
      var phoneCheck = true;


        $('#name').blur(function() {
          name = $(this).val();
          var regValidation = /^[a-zA-z ]+$/;
          console.log(regValidation.test(name));

          if (name != "" && name != null) {
            if (regValidation.test(name)) {
              $('#uName').html("Looks good!");
              $('#uName').css("color", "green");
              nameCheck = true;
            }
            else {
              $('#uName').html("Name can only be alpha characters.");
              $('#uName').css("color", "red");
              nameCheck = false;

            }
          }
          else {
            $('#uName').html("Please enter your name.");
            $('#uName').css("color", "red");
            nameCheck = false;
          }

        });

        //does it for input feild of email.
        $('#email').blur(function(){
            check = $(this).val();
            var regValidation = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

            //checking if the email is valid or not.
            console.log(regValidation.test(check))
            if (check != null && check != "") {
                if (!regValidation.test(check)) {
                    $('#uEmail').html("Incorrect Email. Please enter a valid email address.");
                    $('#uEmail').css("color", "red");
                    emailCheck = false;
                } else {

                  $.ajax( {
                    url: 'emailcheck.php',
                    method: 'POST',
                    data:{check:check},
                    dataType: "text",
                    success:function(data) {

                      if (data == 1) {
                        $('#uEmail').html("Looks like the email is already in use!");
                        $('#uEmail').css("color", "red")
                        emailCheck = false;
                      }else {
                        $('#uEmail').html("Looks like a valid email address.");
                        $('#uEmail').css("color", "green")
                        emailCheck = true;
                    }

                    }
                  });

                }
                }

              });


        //checking for password correction
        //password length should be at least 8 characters long and should contain at least one number.
        $('#password').blur(function(){
           password = $(this).val();
           var hasNumber = /\d/;
           var passwordHasNumber = hasNumber.test(password);
           console.log(passwordHasNumber);

          if (password != "" && password != null) {
            if (password.length < 8 || passwordHasNumber == false) {
                  $('#uPassword').html("Password should have more than 8 characters and a number.");
                  $('#uPassword').css("color", "red");
                  passwordCheck = false;
            }
            else {
                  $('#uPassword').html("You're all set for password..");
                  $('#uPassword').css("color", "green");
                  passwordCheck = true;
            }

          }
          else {
            $('#uPassword').html("Please Enter password.");
            $('#uPassword').css("color", "red");
            passwordCheck = false;
          }

        });

        //checking for phone number to be good
        $('#cellphone').blur(function(){
        cellphone = $(this).val();
        var regValidation = /^(\+|\d)[0-9]{7,16}$/;
        // console.log(cellphone);

        if (cellphone != "" && cellphone != null) {
          if (regValidation.test(cellphone)) {
            $.ajax( {
              url: 'mobilecheck.php',
              method: 'POST',
              data:{cellphone:cellphone},
              dataType: "text",
              success:function(data) {

                if (data == 1) {
                  $('#uCellphone').html("Looks like the phone number is already in use!");
                  $('#uCellphone').css("color", "red");
                  cellphoneCheck = false;
                }else {
                  $('#uCellphone').html("Looks like a valid phone number.");
                  $('#uCellphone').css("color", "green");
                  cellphoneCheck = true;
              }

              }
            });
          // else {
          //   $('#uCellphone').html("Enter a valid number!");
          //   $('#uCellphone').css("color", "red");
          //   cellphoneCheck = false;
          // }
        } else {
            $('#uCellphone').html("Enter a valid number!");
            $('#uCellphone').css("color", "red");
            cellphoneCheck = false;
        }

        }
      });


        //checking for conditions to be true. If everything is the way it should be, register the user tot the databsae.
        $("#submit").click(function() {
          if (nameCheck == true && emailCheck == true && passwordCheck == true && cellphoneCheck == true) {
            $('#messagebox').html("Let's Create your account!");
            $('#messagebox').css("color", "green");
            $('#messagebox').css("border", "2px solid green");

            //Ajax call to send data to DB.
            $.ajax({
              url:'signuphandler.php',
              method:'POST',
              data:{name:name, check:check, password:password, cellphone:cellphone},
              dataType: "text",
              success:function(data) {
                $('#messagebox').html(data);
              }
            });

          } else {

                  $('#messagebox').html("Please complete all fields correctly.");
                  $('#messagebox').css("color", "red");
                  $('#messagebox').css("border", "2px solid red");

          }

        });


    });
  </script>

  </body>
  </html>
