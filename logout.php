<?php

session_start(); // start user session
session_unset(); // unset user session
session_destroy(); // destroy user session
header("location: login.php");
exit;

?>
