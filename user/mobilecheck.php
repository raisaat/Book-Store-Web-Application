<?php
session_start();
require_once '../config.php';

$phone = $_POST['cellphone'];

$output = "";

if(empty($phone)){
  $output = '<div class = "alert alert-danger">Try again!</div>';
}
else {
  $sql = "SELECT * FROM user WHERE cellphone = '$phone'";

$result = mysqli_query($link, $sql);

if (mysqli_num_rows($result)>0) {
    $output = 1;
} else {
    $output = 0;
}

}

echo  $output;

?>
