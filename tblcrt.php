<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="shortcut icon" href="https://cdn-icons-png.flaticon.com/512/2913/2913988.png" type="image/x-icon">
    <link rel="stylesheet" href="style.css">
    <title>Contact Form Project</title>
</head>

<body>

    <nav class="navbar navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand d-flex" href="/php-projects/PHP-miniProject/index.php">
                <img src="https://cdn-icons-png.flaticon.com/512/2913/2913988.png" alt="" width="30" height="29" class="mx-5 d-inline-block my-auto">
                <div class="fs-3">
                    <strong> Contact Form</strong>
                    <small class="fs-6">using php</small>
                </div> 
            </a>
        </div>
    </nav>

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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

    <!-- jquery -->
    <script src="jquery.js"></script>

</body>

</html>