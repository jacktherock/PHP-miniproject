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

    <?php  require 'partials/_navbar.php' ?>

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
                die("Sorry we failed to connect: ". mysqli_connect_error());
            }
            else {
                
                /* Create table in 'register_php' db */
                $sql = "CREATE TABLE User_register ( UserID INT NOT NULL AUTO_INCREMENT, FirstName VARCHAR(255) NOT NULL, LastName VARCHAR(255) NOT NULL, Email VARCHAR(255) NOT NULL, Age INT NOT NULL, PRIMARY KEY(UserID))";
                $result = mysqli_query($conn, $sql);

                /* Check for the table creation success */
                if ($result) {
                    echo '<div class="my-5 alert alert-tag shadow text-center" role="alert"> <strong>Success!</strong> Table created successfully! </div>';
                }
                else{
                    echo '<div class="my-5 alert alert-tag shadow text-center" role="alert"> <strong>Error!</strong> Unable to create table! </div>'. mysqli_error($conn);
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