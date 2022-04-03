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
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.11.5/datatables.min.css" />
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

    <!-- -------------------------------- Update Contact Form Modal --------------------------------------------------------------- -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit Contact</h5>
                    <span class="btn-close" data-bs-dismiss="modal" aria-label="Close"></span>
                </div>
                <div class="modal-body">
                    <form action="/php-projects/PHP-miniProject/contact.php" method="post" class="px-4 py-4">
                        <input type="hidden" name="idEdit" id="idEdit">
                        <div class="mb-3 d-flex flex-row tag form-group">
                            <label class="form-label my-auto">First Name</label>
                            <input type="text" class="form-control" name="firstNameEdit" id="firstNameEdit">
                        </div>
                        <div class="mb-3 d-flex flex-row tag form-group">
                            <label class="form-label my-auto">Last Name</label>
                            <input type="text" class="form-control" name="lastNameEdit" id="lastNameEdit">
                        </div>
                        <div class="mb-3 d-flex flex-row tag form-group">
                            <label class="form-label my-auto">Email</label>
                            <input type="email" class="form-control" name="emailEdit" id="emailEdit">
                        </div>
                        <div class="mb-3 d-flex flex-row tag form-group">
                            <label class="form-label my-auto">Age</label>
                            <input type="number" class="form-control" name="ageEdit" id="ageEdit">
                        </div>
                        <div class="text-end">
                            <button type="submit" class="btn btn-sm btn-update">Update</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
    <!-- ----------------------------------------------------------------------------------------------- -->

    <div class="container">
        <div class="my-4">
            <h2 class="text-center">Contact Form</h2>
        </div>

        <div class="row">
            <div class="col-5">
                <!-- -------------------------------- Contact Form  --------------------------------------------------------------- -->
                <form action="/php-projects/PHP-miniProject/contact.php" method="post"
                    class="bg-light shadow rounded-3 py-5 px-5">
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
                        <button type="submit" class="btn btn-submit col-5">Submit</button>
                    </div>
                </form>
                <!-- ----------------------------------------------------------------------------------------------- -->

                <!-- ----------------- UPDATE, INSERT, DELETE -------------------------------------------------- -->
                <?php
                    /* Connecting to database */
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $database = "register_php";

                    /* Create a connection */
                    $conn = mysqli_connect($servername, $username, $password, $database);
                    
                    /*************** Delete Contact Form ***********************************/
                    if (isset($_GET['delete'])) {
                        $id = $_GET['delete'];

                // sql query for DELETE 
                        $sql = "DELETE FROM `user_register` WHERE `user_register`.`UserID` = $id";

                        $result = mysqli_query($conn, $sql);

                        /* Check for the contact deletion success */
                        if ($result) {
                            echo '<div class="alert alert-tag" style="background-color: #FF6363;" role="alert"> <strong>Success!</strong> Contact deleted successfully! </div>';
                        }
                        else{
                            echo '<div class="alert alert-tag" role="alert"> <strong>Error!</strong> Unable to delete contact! </div>';
                        }
                    }
                    /**************************************************/
                
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
                                echo '<div class="alert alert-tag" role="alert"> <strong>Success!</strong> Contact updated successfully! </div>';
                            }
                            else{
                                echo '<div class="alert alert-tag" role="alert"> <strong>Error!</strong> Unable to update contact! </div>';
                            }
                        }
                        /**************************************************/

                        /**************** if id is not given **********************************/
                        else{
                            /**************** passing the values of inputs **********************************/
                            $firstName = $_POST['firstName'];
                            $lastName = $_POST['lastName'];
                            $age = $_POST['age'];
                            $email = $_POST['email'];

                             /* if email is not given */
                            if($email == ""){
                                echo '<div class="alert alert-tag" role="alert"> <strong>Error!</strong> Please Enter Email ID! </div>';
                            }
                            /* if email is given */
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
                                        echo '<div class="alert alert-tag" role="alert"> <strong>Success!</strong> New Contact submitted successfully! </div>';
                                    }
                                    else{
                                        echo '<div class="alert alert-tag" role="alert"> <strong>Error!</strong> We are facing some technical issue and your contact was not submitted successfully! </div>';
                                    }
                                }   
                            }   
                        }    
                    }
                ?>
                <!-- ----------------------------------------------------------------------------------------------- -->
                
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

    <!-- jquery -->
    <script src="jquery.js"></script>

    <!-- datatables js -->
    <script src="//cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

    <!-- datatables js for design -->
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.11.5/datatables.min.js"></script>

    <script>
        // Fade Alert script
        setTimeout(() => {
            $(".alert-tag").fadeToggle(1000);
        }, 1500);

        // Submit Button Disabled till all fields are filled
        $(function () {
            $('.btn-submit').attr('disabled', true);
            $('#age').change(function () {
                if ($('#first').val() != '' && $('#last').val() != '' && $('#email').val() != '' && $(
                        '#age').val() != '') {
                    $('.btn').attr('disabled', false);
                } else {
                    $('.btn').attr('disabled', true);
                }
            });
        });

        // use of datatables which displays table in pagination format
        $(document).ready(function () {
            $('#myTable').DataTable();
        });
    </script>

    <script>
        // Edit Contact Form
        edits = document.getElementsByClassName('edit');
        Array.from(edits).forEach((element) => {
            element.addEventListener('click', (e) => {
                // console.log("edited", e.target.parentNode.parentNode.parentNode);
                tr = e.target.parentNode.parentNode.parentNode;
                fn = tr.getElementsByTagName("td")[0].innerText;
                ln = tr.getElementsByTagName("td")[1].innerText;
                el = tr.getElementsByTagName("td")[2].innerText;
                ag = tr.getElementsByTagName("td")[3].innerText;
                // console.log(fn, ln, el, ag);
                firstNameEdit.value = fn;
                lastNameEdit.value = ln;
                emailEdit.value = el;
                ageEdit.value = ag;
                idEdit.value = e.target.parentNode.id;
                // console.log(e.target.parentNode.id);
                $('#editModal').modal('toggle');
            })
        })

        // Delete Contact Form
        deletes = document.getElementsByClassName('delete');
        Array.from(deletes).forEach((element) => {
            element.addEventListener('click', (e) => {
                // console.log("Deleted", e.target.parentNode.parentNode.parentNode);
                id = e.target.parentNode.id.substr(1, );
                if (confirm("Are you sure want to Delete contact ?")) {
                    // console.log("Yes")
                    window.location = `/php-projects/PHP-miniProject/contact.php?delete=${id}`;
                } else {
                    // console.log("No")
                }
            })
        })
    </script>

</body>

</html>