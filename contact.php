<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Contact Form Project</title>
</head>

<body>
    <div class="container mt-5">
        <div class="mb-5">
            <h1 class="text-center">Contact Form</h1>
        </div>

        <div class="row">
            <div class="col-6">
                <form action="/php-projects/PHP-miniProject/contact.php" method="post" class="bg-light shadow rounded-3 py-5 px-5">
                    <div class="mb-3 d-flex flex-row tag form-group">
                        <label class="form-label my-auto">First Name</label>
                        <input type="text" class="form-control" name="firstName" id="first">
                    </div>
                    <div class="mb-3 d-flex flex-row tag form-group">
                        <label class="form-label my-auto">Last Name</label>
                        <input type="text" class="form-control" name="lastName" id="last">
                    </div>
                    <div class="mb-3 d-flex flex-row tag form-group">
                        <label class="form-label my-auto">Email</label>
                        <input type="email" class="form-control" name="email" id="email">
                    </div>
                    <div class="mb-3 d-flex flex-row tag form-group">
                        <label class="form-label my-auto">Age</label>
                        <input type="number" class="form-control" name="age" id="age">
                    </div>
                    <div class="text-end mt-5">
                        <button type="submit" class="btn col-5">Submit</button>
                    </div>
                </form>

                <?php
                    /* Connecting to database */
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $database = "register_php";

                    /* Create a connection */
                    $conn = mysqli_connect($servername, $username, $password, $database);
                
                    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                        $firstName = $_POST['firstName'];
                        $lastName = $_POST['lastName'];
                        $age = $_POST['age'];
                        $email = $_POST['email'];
                        if($email == ""){
                            echo '<div class="alert alert-tag" role="alert"> <strong>Error!</strong> Please Enter Email ID! </div>';
                        }
                        else{
                            /* Die if connection was not successful */
                            if (!$conn) {
                                die("Sorry we failed to connect: ". mysqli_connect_error());
                            }
                            else {                    
                                /* Insert Data in 'User_register' table */
                                $sql = "INSERT INTO `user_register` (`UserID`, `FirstName`, `LastName`, `Email`, `Age`) VALUES (NULL, '$firstName', '$lastName', '$email', '$age')";
                                $result = mysqli_query($conn, $sql);

                                /* Check for the table creation success */
                                if ($result) {
                                    echo '<div class="alert alert-tag" role="alert"> <strong>Success!</strong> Contact form submitted successfully! </div>';
                                }
                                else{
                                    // echo "Data Not Inserted successfully because of this error --->". mysqli_error($conn);
                                    echo '<div class="alert alert-tag" role="alert"> <strong>Error!</strong> We are facing some technical issue and your contact form was not submitted successfully! </div>';
                                }
                            }   
                        }
                        
                            
                             
                    }
                ?>
            </div>

            <div class="col-6">
                <?php
                    /* Connecting to database */
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $database = "register_php";

                    /* Create a connection */
                    $conn = mysqli_connect($servername, $username, $password, $database);

                    $sql_show = "SELECT * FROM `user_register`";
                    $result_show = mysqli_query($conn, $sql_show);
                    $num = mysqli_num_rows($result_show);
                    if ($num>0) {
                        echo "<table class='table table-hover rounded-3' style='background-color: #C490E4; border-bottom: 0px transparent;'>
                                <thead class='text-center'>
                                    <tr>
                                        <th scope='col'>First Name</th>
                                        <th scope='col'>Last Name</th>
                                        <th scope='col'>Email</th>
                                        <th scope='col'>Age</th>
                                        <th scope='col'>Action</th>
                                    </tr>
                                </thead>
                            <tbody class='text-center'>";

                        // Output data of each row
                        while ($row = mysqli_fetch_assoc($result_show)) {
                            // echo var_dump($row);
                            // echo $row["FirstName"]. $row["LastName"]. $row["Email"]. $row["Age"]. "<br>";
                            echo "<tr>
                                    <td>".$row["FirstName"]."</td>
                                    <td>".$row["LastName"]."</td>
                                    <td>".$row["Email"]."</td>
                                    <td>".$row["Age"]."</td>
                                    <td><a href='#'> Edit</a> <a href='#'> Delete</a></td>
                                </tr>";
                        }
                        echo "</tbody></table>";
                    }
                    else{
                        echo '<div class="alert alert-error fw-bold text-center" role="alert"> Table content is empty! </div>';
                    }
                ?>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <script src="jquery.js"></script>
    <script>
        setTimeout(() => {
            $(".alert-tag").fadeToggle(1000);
        }, 1500);

        $(function () {
            $('.btn').attr('disabled', true);
            $('#age').change(function () {
                if ($('#first').val() != '' && $('#last').val() != '' && $('#email').val() != '' && $('#age').val() != '') {
                    $('.btn').attr('disabled', false);
                } else {
                    $('.btn').attr('disabled', true);
                }
            });
        });
    </script>

</body>

</html>