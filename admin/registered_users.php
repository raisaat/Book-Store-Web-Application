<?php
  session_start();
  require_once '../config.php';
  require_once 'header.php';
  require_once 'logincheck.php';
  $output = "";
  $users = "";

  if (isset($_POST['q'])) {
    $username = test_input($_POST['username']);
    $sql = " SELECT * FROM user WHERE username = '$username' ";

    $result = mysqli_query($link,$sql);

    if (mysqli_num_rows($result)>0) {
      while ($row = mysqli_fetch_array($result)) {
        $output = '<table class="table">
          <tr>
            <th>User_ID</th>
            <th>Email</th>
            <th>Name</th>
            <th>Phone</th>
          </tr>
          <tr>
            <td>'.$row['user_id'].'</td>
            <td>'.$row['email'].'</td>
            <td>'.$row['username'].'</td>
            <td>'.$row['cellphone'].'</td>
          </tr>
        </table>';
      }
    }else {
      $output = '<div class="alert alert-danger">No record found</div>';
    }
  }

  if (isset($_POST['all'])) {
    $sql = " SELECT * FROM user ";

    $result = mysqli_query($link,$sql);

    $users = mysqli_num_rows($result);

    if (mysqli_num_rows($result)>0) {
      $output .= '
      <h4 class="text-success"> Total Users: '.$users.'</h4>
      <table class="table">
        <tr>
          <th>User_ID</th>
          <th>Email</th>
          <th>Name</th>
          <th>Phone</th>
        </tr>';

      while ($row = mysqli_fetch_array($result)) {

        $output .= '
          <tr>
            <td>'.$row['user_id'].'</td>
            <td>'.$row['email'].'</td>
            <td>'.$row['username'].'</td>
            <td>'.$row['cellphone'].'</td>
          </tr>';
      }
      $output .= '</table>';
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
     <div class="col-lg-2">
     </div>
     <div class="col-lg-10">
       <form class="form-inline" method="POST">
    <input class="form-control mr-sm-2" type="search" name="username" placeholder="Enter username" aria-label="Search">
    <input class="btn btn-outline-success my-2 my-sm-0" name="q" type="submit" value="Search"> &nbsp; &nbsp;
    <button class="btn btn-outline-success my-2 my-sm-0" name="all" type="submit">View All</button>
  </form>
    <br><br>

      <?php echo $output; ?>

     </div>
   </div>
 </div>

<?php require_once 'footer.php'; ?>
