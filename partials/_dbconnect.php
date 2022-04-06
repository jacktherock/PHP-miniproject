<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "register_php";

$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
    die("Unable to connect! --> " . mysqli_connect_error());
}

?>