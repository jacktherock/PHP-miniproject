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

        <?php
        echo '<div class="alert alert-error my-5" role="alert"> <strong>Error!</strong> There are no database exists. Please create new database on clicking "Create Database" button. </div>';
        echo '<a href="/php-projects/PHP-miniProject/dbcrt.php" class="btn btn-create mx-5">Create Database</a>';
        ?>
    </div>

    <!-- Bootstrap js -->
    <script src="js/bootstrap.bundle.min.js"></script>

    <!-- jquery -->
    <script src="js/jquery.js"></script>
    <script src="js/index.js"></script>

</body>

</html>