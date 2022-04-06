<?php
  $login = false;
  $loginErr = false;
  $showError = false;
  if($_SERVER["REQUEST_METHOD"]=="POST"){
    include 'partials/_dbconnect.php';
    $username = $_POST["username"];
    $password = $_POST["password"];

    if ($username=="" || $password=="") {
      $showError =  "Please fill require fields!";
    }
    else{
        $sql = "SELECT * FROM `users` WHERE `username`='$username' AND `password`='$password'";
        $result = mysqli_query($conn, $sql);
        $num = mysqli_num_rows($result);
        if($num==1){
          $login = "Logged In Successfully!";
          session_start();
          $_SESSION['loggedin'] = true;
          $_SESSION['username'] = $username;
          header("location: contact.php"); //redirect to page
        }
        else{
          $loginErr = "Invalid Credentials!";
        }
    }
  }
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css">

    <title>Login</title>
  </head>
  <body>
      <?php require 'partials/_navbar.php' ?>
      

      <div class="container">
      <h1 class="text-center fw-bold my-5">Login</h1>
  <div class="d-flex justify-content-center">
    <form action="/php-projects/PHP-miniProject/login.php" method="post" class="bg-light shadow rounded-3 py-5 px-5">
    <div class="mb-3 d-flex flex-row tag form-group">
        <label class="form-label my-auto">Username</label>
        <input type="text" class="form-control" autofocus name="username" id="username">
      </div>
    <div class="mb-3 d-flex flex-row tag form-group">
      <label class="form-label my-auto">Password</label>
      <input type="password" class="form-control" name="password" id="password">
    </div>
    <div class="text-end mt-5">
      <button type="submit" class="btn btn-submit col-5">Login</button>
    </div>
</form>
</div>
    <?php
        if($login){
          echo '<div class="alert alert-tag ms" role="alert"> <strong>Success!</strong> '.$login.' </div>';
        }
        if($loginErr){
          echo '<div class="alert alert-error ms" role="alert"> <strong>Error!</strong> '.$loginErr.' </div>';
        }
        if($showError){
          echo '<div class="alert alert-error ms" role="alert"> <strong>Error!</strong> '.$showError.' </div>';
        }
        ?>
  </div>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/jquery.js"></script>
    <script src="js/index.js"></script>

  </body>
</html>