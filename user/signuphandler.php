<?php
session_start();
require_once '../config.php';
$uName = $_POST['name'];
$uEmail = $_POST['check'];
$uPassword = $_POST['password'];
$uCellphone = $_POST['cellphone'];

$output = "";

$sql = "INSERT INTO user(username, email, password, cellphone) VALUES ('$uName', '$uEmail', '$uPassword', '$uCellphone')";

if (mysqli_query($link,$sql)) {
    $output = '<div class="alert alert-success">Signup done!</div>';
} else {
    $output = '<div class="alert alert-danger">Signup did not go through.</div>';
}

echo $output;

?>
