<?php
session_start();
require_once '../config.php';

$email = $_POST['check'];

$output = "";

if(empty($email)){
  $output = '<div class = "alert alert-danger">Try again!</div>';
}
else {
  $sql = "SELECT * FROM user WHERE email = '$email'";

$result = mysqli_query($link, $sql);

if (mysqli_num_rows($result)>0) {
    $output = 1;
} else {
    $output = 0;
}

}

echo  $output;

?>
