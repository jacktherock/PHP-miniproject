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

            /* Create a connection */
            $conn = mysqli_connect($servername, $username, $password);

            /* Die if connection was not successful */
            if (!$conn) {
                die("Sorry we failed to connect: ". mysqli_connect_error());
            }
            else {
                
                /* Create a database */
                $sql = "CREATE DATABASE register_php";
                $result = mysqli_query($conn, $sql);

                /* Check for the database creation success */
                if ($result) {
                    echo '<div class="my-5 alert alert-tag shadow text-center" role="alert"> <strong>Success!</strong> Database created successfully! </div>';
                }
                else{
                    // echo "DB not created successfully because of this error --->". mysqli_error($conn);
                    echo '<div class="my-5 alert alert-error shadow text-center" role="alert"> <strong>Error!</strong> Unable to create Database! </div>'. mysqli_error($conn);
                }
            }
        ?>

        <div>
            <a href="/php-projects/PHP-miniProject/tblcrt.php" class="btn btn-tb mx-5">Create Table</a>
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