
<?php
if (!isset($_SESSION['aloggedin'])) {
  session_start();
  header('location: login.php');
}
 ?>
