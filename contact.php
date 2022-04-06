<?php
  session_start();
  if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
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
                        $sql = "DELETE FROM `user_register` WHERE `user_register`.`UserID` = $id";

                        $result = mysqli_query($conn, $sql);

                        /* Check for the contact deletion success */
                        if ($result) {
                            $showAlert = "Contact deleted successfully! ";
                        }
                        else{
                            $showError= " Unable to delete contact! ";
                        }
                    }
                    /*------------------------------------------------------------------------*/
                
                /************* if request is POST *************************************/

                    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

                        /**************** if id is given only then Edit Contact Form **********************************/
                        if(isset($_POST['idEdit'])){
                            $id = $_POST['idEdit'];

                            $firstName = $_POST['firstNameEdit'];
                            $lastName = $_POST['lastNameEdit'];
                            $age = $_POST['ageEdit'];
                            $email = $_POST['emailEdit'];

                // sql query for UPDATE 
                            $sql = "UPDATE `user_register` SET `FirstName` = '$firstName' ,  `LastName` = '$lastName' , `Email` = '$email' , `Age` = '$age' WHERE `user_register`.`UserID` = '$id';";

                            $result = mysqli_query($conn, $sql);

                            /* Check for the form updation success */
                            if ($result) {
                                $showAlert = "Contact updated successfully! ";
                            }
                            else{
                                $showError = "Unable to update contact!";
                            }
                        }
                        /***********************************************************************************************/

                        /**************** if id is not given **********************************/
                        else{
                            /**************** passing the values of inputs **********************************/
                            $firstName = $_POST['firstName'];
                            $lastName = $_POST['lastName'];
                            $age = $_POST['age'];
                            $email = $_POST['email'];

                             /* if fields are not filled */
                             if ($firstName=="" || $lastName=="" || $age == "" || $email=="") {
                                $showError =  "Please fill require fields!";
                              }
                            /* if fields are filled */
                            else{
                                /* Die if connection was not successful */
                                if (!$conn) {
                                    die("Sorry we failed to connect: ". mysqli_connect_error());
                                }
                                else {                    
                                /***************** Insert Data in 'User_register' table ********************/

                // sql query for INSERT                 
                                    $sql = "INSERT INTO `user_register` (`UserID`, `FirstName`, `LastName`, `Email`, `Age`) VALUES (NULL, '$firstName', '$lastName', '$email', '$age')";

                                    $result = mysqli_query($conn, $sql);

                                    /* Check for the table creation success */
                                    if ($result) {
                                        $showAlert="New Contact submitted successfully!";
                                    }
                                    else{
                                        $showError="We are facing some technical issue and your contact was not submitted successfully!";
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

        <div class="row">
            <div class="col-5">
                <!-- -------------------------------- Contact Form  ------------------------------------------------ -->
                <?php require 'partials/_insertForm.php' ?>
                <!-- ----------------------------------------------------------------------------------------------- -->
                <?php 
                if($showAlert){
                    echo '<div class="alert alert-tag ms" role="alert"> <strong>Success!</strong> '.$showAlert.' </div>';
                }
                if($showError){
                    echo '<div class="alert alert-error ms" role="alert"> <strong>Error!</strong> '.$showError.' </div>';
                }
                ?>  
            </div>

            <!-- Display all contacts in database table 'user_register' -->
            <div class="col-7">

                <!------------ Contact Table ------------>
                <div class='table-responsive bg-light px-3 py-3 rounded-3 shadow'>
                    <table class='table table-hover rounded-3 align-middle table-sm text-center' id='myTable'>
                        <thead>
                            <tr>
                                <th scope='col'>ID</th>
                                <th scope='col'>First Name</th>
                                <th scope='col'>Last Name</th>
                                <th scope='col'>Email</th>
                                <th scope='col'>Age</th>
                                <th scope='col'>Actions</th>
                            </tr>
                        </thead>
                        <tbody>

                            <!------------ Display all contacts in table format ------------>
                            <?php
                                $sql = "SELECT * FROM `user_register`";
                                $result = mysqli_query($conn, $sql);
                                // $num = mysqli_num_rows($result);

                                // if ($num>0) {
                                    /************* Output data of each row using while loop ***************/
                                    $id=0;
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        // echo var_dump($row);
                                        $id= $id+1;

                                        echo "<tr>
                                                <th scope='row'>".$id."</th>
                                                <td>".$row["FirstName"]."</td>
                                                <td>".$row["LastName"]."</td>
                                                <td>".$row["Email"]."</td>
                                                <td>".$row["Age"]."</td>
                                                <td>
                                                    <span class='edit text-success' id=".$row["UserID"]."> <i class='bx bxs-edit bx-sm'></i> </span>
                                                    <span class='delete text-danger' id=d".$row["UserID"]."> <i class='bx bxs-trash bx-sm'></i> </span>
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