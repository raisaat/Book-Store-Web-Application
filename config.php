<?php

$link = mysqli_connect("localhost","root","root","bookstore");
// Check connection
if (!$link) {
    die("Connection failed: " . mysqli_connect_error());
}
 ?>
