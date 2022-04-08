<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
    header("location: login.php");
    exit;
}
?>

<?php
/* Connecting to database */
include 'partials/_dbconnect.php';

$showAlert = false;
$showError = false;

/*------------------------ Delete Contact Form ------------------------*/
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];

    // sql query for DELETE 
    $sql = "DELETE FROM `user_info` WHERE `user_info`.`id` = '$id'";

    $result = mysqli_query($conn, $sql);

    /* Check for the contact deletion success */
    if ($result) {
        $showAlert = "Contact deleted successfully! ";
    } else {
        $showError = " Unable to delete contact! ";
    }
}
/*------------------------------------------------------------------------*/

/************* if request is POST *************************************/

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    /**************** if id is given only then Edit Contact Form **********************************/
    if (isset($_COOKIE['user_id'], $_POST['idEdit'])) {
        $idc = $_COOKIE['user_id'];
        $id = $_POST['idEdit'];
        // echo $id;
        $phone_no = $_POST['phone_noEdit'];
        $first_name = $_POST['first_nameEdit'];
        $last_name = $_POST['last_nameEdit'];
        $age = $_POST['ageEdit'];
        $note = $_POST['noteEdit'];
        $email = $_POST['emailEdit'];

        // sql query for UPDATE 
        $sql = "UPDATE `user_info` SET `phone_no` = '$phone_no' , `first_name` = '$first_name' ,  `last_name` = '$last_name' , `age` = '$age' , `note` = '$note' , `email` = '$email' WHERE `id` = '$id'";

        $result = mysqli_query($conn, $sql);

        /* Check for the form updation success */
        if ($result) {
            $showAlert = "Contact updated successfully! ";
        } else {
            $showError = "Unable to update contact!";
        }
    }
    /***********************************************************************************************/

    /**************** if id is not given **********************************/
    else {
        /**************** passing the values of inputs **********************************/
        $phone_no = $_POST['phone_no'];
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $age = $_POST['age'];
        $note = $_POST['note'];
        $email = $_POST['email'];
        $created_by = $_COOKIE['user_id'];

        /* if fields are not filled */
        if ($first_name == "" || $last_name == "" || $age == "" || $email == "") {
            $showError =  "Please fill require fields!";
        }
        /* if fields are filled */ else {
            /* Die if connection was not successful */
            if (!$conn) {
                die("Sorry we failed to connect: " . mysqli_connect_error());
            } else {
                /***************** Insert Data in 'user_info' table ********************/

                // sql query for INSERT
                $UUID = vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex(random_bytes(16)), 4));
                // $sql = "INSERT INTO `user_info` (`id`, `first_name`, `last_name`, `email`, `age`) VALUES ('$UUID', '$first_name', '$last_name', '$email', '$age')";
                $sql = "INSERT INTO `user_info` (`id`, `phone_no`, `first_name`, `last_name`, `age`, `note`, `email`, `created_by`, `created_at`) VALUES ('$UUID', '$phone_no', '$first_name', '$last_name', '$age', '$note', '$email', '$created_by', current_timestamp())";


                $result = mysqli_query($conn, $sql);

                /* Check for the table creation success */
                if ($result) {
                    $showAlert = "New Contact submitted successfully!";
                } else {
                    $showError = "We are facing some technical issue and your contact was not submitted successfully!";
                }
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
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" type="text/css" href="css/datatables.min.css" />
    <title>Contact Form Project - <?php echo $_SESSION['username'] ?></title>
</head>

<body>

    <?php require 'partials/_navbar.php' ?>

    <!-- -------------------------------- Update Contact Form Modal ------------------------------------ -->
    <?php require 'partials/_updateForm.php' ?>
    <!-- ----------------------------------------------------------------------------------------------- -->

    <div class="container">
        <div class="my-4">
            <h2 class="text-center">Contact Form - <small class="text-warning"><?php echo $_SESSION['username'] ?></small> </h2>
        </div>

        <div class="">
            <div class="row">
                <!-- -------------------------------- Contact Form  ------------------------------------------------ -->
                <div class="col-6">
                    <?php require 'partials/_insertForm.php' ?>
                </div>
                <!-- ----------------------------------------------------------------------------------------------- -->
                <div class="col-6">
                    <?php
                    if ($showAlert) {
                        echo '<div class="alert alert-tag ms" role="alert"> <strong>Success!</strong> ' . $showAlert . ' </div>';
                    }
                    if ($showError) {
                        echo '<div class="alert alert-error ms" role="alert"> <strong>Error!</strong> ' . $showError . ' </div>';
                    }
                    ?>
                </div>
            </div>

            <!-- Display all contacts in database table 'user_info' -->
            <div class="my-5">

                <!------------ Contact Table ------------>
                <div class='table-responsive bg-light px-3 py-3 rounded-3 shadow'>
                    <table class='table table-hover rounded-3 align-middle table-sm text-center' id='myTable'>
                        <thead>
                            <tr>
                                <th scope='col'>ID</th>
                                <th scope='col'>Mobile No</th>
                                <th scope='col'>First Name</th>
                                <th scope='col'>Last Name</th>
                                <th scope='col'>Age</th>
                                <th scope='col'>Note</th>
                                <th scope='col'>Email</th>
                                <th scope='col'>Created At</th>
                                <th scope='col'>Actions</th>
                            </tr>
                        </thead>
                        <tbody>

                            <!------------ Display all contacts in table format ------------>
                            <?php
                            $sql = "SELECT * FROM `user_info`";
                            $result = mysqli_query($conn, $sql);
                            // $num = mysqli_num_rows($result);

                            // if ($num>0) {
                            /************* Output data of each row using while loop ***************/
                            $id = 0;
                            while ($row = mysqli_fetch_assoc($result)) {
                                // echo var_dump($row);
                                $id = $id + 1;

                                echo "<tr>
                                                <th scope='row'>" . $id . "</th>
                                                <td>" . $row["phone_no"] . "</td>
                                                <td>" . $row["first_name"] . "</td>
                                                <td>" . $row["last_name"] . "</td>
                                                <td>" . $row["age"] . "</td>
                                                <td>" . $row["note"] . "</td>
                                                <td>" . $row["email"] . "</td>
                                                <td>" . $row["created_at"] . "</td>
                                                <td>
                                                    <span class='edit text-success' id=" . $row["id"] . "> <i class='bx bxs-edit bx-sm'></i> </span>
                                                    <span class='delete text-danger' id=d" . $row["id"] . "> <i class='bx bxs-trash bx-sm'></i> </span>
                                                </td>
                                            </tr>";
                            }
                            // }
                            // else{
                            //     echo '<div class="alert alert-error fw-bold text-center" role="alert"> Table content is empty! </div>';
                            // }
                            ?>
                            <!------------------------------------------------------------>

                        </tbody>
                    </table>
                </div>
                <!---------------------------------------------------------->

            </div>
        </div>
    </div>

    <!-- Bootstrap js -->
    <script src="js/bootstrap.bundle.min.js"></script>

    <!-- jquery -->
    <script src="js/jquery.js"></script>
    <script src="js/index.js"></script>

    <!-- datatables js -->
    <script src="js/jquery.dataTables.min.js"></script>
    <script src="js/dataTables.min.js"></script>


</body>

</html>