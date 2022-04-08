<?php
$showAlert = false;
$showError = false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  include 'partials/_dbconnect.php';
  $username = $_POST["username"];
  $password = $_POST["password"];
  $cpassword = $_POST["cpassword"];

  // CHeck whether username exists
  $existsql = "SELECT * FROM `users` WHERE username = '$username'";
  $result =  mysqli_query($conn, $existsql);
  $numExistRows  = mysqli_num_rows($result);
  if ($numExistRows > 0) {
    // $exists = true;
    $showError =  "Username Already Exists!";
  } else {
    $exists = false;

    if ($username == "" || $password == "" || $cpassword == "") {
      $showError =  "Please fill require fields!";
    } elseif (strlen($password) != 8) {
      $showError = "Password should be of minimum 8 characters";
    } else {
      if (($password == $cpassword)) {
        $UUID = vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex(random_bytes(16)), 4));
        $sql = "INSERT INTO `users` (`id`, `username`, `password`) VALUES ('$UUID','$username', '$password')";
        $result = mysqli_query($conn, $sql);
        if ($result) {
          $showAlert = "Your account is now created & You can login";
          // header("location: login.php");
        }
      } else {
        $showError = "Passwords do not match!";
      }
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
  <link rel="shortcut icon" href="img/logo.png" type="image/x-icon">
  <link rel="stylesheet" href="css/style.css">
  <title>Signup</title>
</head>

<body>
  <?php require 'partials/_navbar.php' ?>

  <div class="container">
    <h1 class="text-center fw-bold my-5">Signup</h1>
    <div class="d-flex justify-content-center">
      <form action="/php-projects/PHP-miniProject/signup.php" method="post" class="bg-light shadow rounded-3 py-5 px-5">
        <div class="mb-3 d-flex flex-row tag form-group">
          <label class="form-label my-auto">Username</label>
          <input type="text" class="form-control" autofocus name="username" id="username">
        </div>
        <div class="mb-3 d-flex flex-row tag form-group">
          <label class="form-label my-auto">Password</label>
          <input type="password" class="form-control" name="password" id="password">
        </div>
        <div class="mb-3 d-flex flex-row tag form-group">
          <label class="form-label my-auto">Confirm Password</label>
          <input type="password" class="form-control" name="cpassword" id="cpassword">
        </div>
        <div class="d-flex justify-content-center form-check">
          <input class="form-check-input mx-3" type="checkbox" onclick="myFunction()" id="flexCheckDefault">
          <label class="form-check-label" for="flexCheckDefault">
            Show Password
          </label>
        </div>
        <div class="text-end mt-5">
          <button type="submit" class="btn btn-submit col-5">Create Account</button>
        </div>
      </form>
    </div>
    <?php
    if ($showAlert) {
      echo '<div class="alert alert-tag ms" role="alert"> <strong>Success!</strong> ' . $showAlert . ' </div>';
    }
    if ($showError) {
      echo '<div class="alert alert-error ms" role="alert"> <strong>Error!</strong> ' . $showError . ' </div>';
    }
    ?>
  </div>



  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="js/bootstrap.bundle.min.js"></script>
  <script src="js/jquery.js"></script>
  <script src="js/index.js"></script>


</body>

</html>