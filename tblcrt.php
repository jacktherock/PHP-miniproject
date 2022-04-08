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

    <div class="container">
        <?php
        /* Connecting to database */
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "register_php";

        /* Create a connection */
        $conn = mysqli_connect($servername, $username, $password, $database);

        /* Die if connection was not successful */
        if (!$conn) {
            die("Sorry we failed to connect: " . mysqli_connect_error());
        } else {

            /* Create 'user_info' table in 'register_php' db */
            $sql = "CREATE TABLE `register_php`.`user_info` ( `id` VARCHAR(51) NOT NULL , `phone_no` VARCHAR(14) NOT NULL , `first_name` VARCHAR(23) NOT NULL , `last_name` VARCHAR(23) NOT NULL , `age` INT(3) NOT NULL , `note` TEXT NULL , `email` VARCHAR(151) NOT NULL , `created_by` VARCHAR(51) NOT NULL , `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP )";
            $result = mysqli_query($conn, $sql);

            /* Check for the table creation success */
            if ($result) {
                echo '<div class="my-5 alert alert-tag shadow text-center" role="alert"> <strong>Success!</strong> user_info table created successfully! </div>';
            } else {
                echo '<div class="my-5 alert alert-error shadow text-center" role="alert"> <strong>Error!</strong> Unable to create table! </div>' . mysqli_error($conn);
            }

            /* Create 'users' table in 'register_php' db */
            $sql2 = "CREATE TABLE `register_php`.`users` ( `id` VARCHAR(51) NOT NULL , `username` VARCHAR(23) NOT NULL ,  `password` VARCHAR(23) NOT NULL ,  `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP, PRIMARY KEY (`id`), UNIQUE `username` (`username`))";
            $result2 = mysqli_query($conn, $sql2);

            /* Check for the table creation success */
            if ($result2) {
                echo '<div class="my-5 alert alert-tag shadow text-center" role="alert"> <strong>Success!</strong> users table created successfully! </div>';
            } else {
                echo '<div class="my-5 alert alert-error shadow text-center" role="alert"> <strong>Error!</strong> Unable to create table! </div>' . mysqli_error($conn);
            }
        }
        ?>

        <div>
            <a href="/php-projects/PHP-miniProject/contact.php" class="btn btn-fill mx-5">Fill Contact Form</a>
            <a href="/php-projects/PHP-miniProject/index.php" class="btn btn-back mx-5">Back</a>
        </div>
    </div>

    <!-- Bootstrap js -->
    <script src="js/bootstrap.bundle.min.js"></script>

    <!-- jquery -->
    <script src="js/jquery.js"></script>
    <script src="js/index.js"></script>

</body>

</html>