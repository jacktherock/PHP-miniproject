<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {

  include 'partials/_connect.php';
  $conn = mysqli_connect($servername, $username, $password);
  $dbname = 'register_php';
  $sql = "SHOW DATABASES LIKE '$dbname'";
  $result = mysqli_query($conn, $sql);
  $fetch = mysqli_fetch_array($result);

  if (!$conn) {
    die("Sorry we failed to connect: " . mysqli_connect_error());
  } else {
    if (empty($fetch)) {
      header("location: dbcrt2.php");
    } else {
      // SQL query
      $sql2 = "SHOW TABLES IN `$dbname`";

      // perform the query and store the result
      $result2 = mysqli_query($conn, $sql2);

      // if the $result not False, and contains at least one row
      // if at least one table in result
      $num = mysqli_num_rows($result2);

      if ($num > 0) {
        // traverse the $result and output the name of the table(s)
        while ($row = mysqli_fetch_assoc($result2)) {
          header("location: login.php");
        }
      } else {
        header("location: tblcrt2.php");
      }
      exit;
    }
  }
} else {
  header("location: contact.php");
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
  <title>Contact Form Project</title>
</head>

<body>

  <?php require 'partials/_navbar.php' ?>

  <div class="container my-5 text-center">
    <a href="/php-projects/PHP-miniProject/contact.php" class="btn btn-fill mx-5">Fill Contact Form</a>
  </div>

  <!-- Bootstrap js -->
  <script src="js/bootstrap.bundle.min.js"></script>

  <!-- jquery -->
  <script src="js/jquery.js"></script>
  <script src="js/index.js"></script>

</body>

</html>